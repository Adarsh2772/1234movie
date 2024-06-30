<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class FaceSwap extends Component
{
    use WithFileUploads;

    public $photo;
    public $resultUrl;
    public $error = '';
    public $disabled = '';
    public $images = [];
    public $smallImages = [];
    public $credits = 3000; // Assume 3000 credits initially for simplicity
    public $selectedImage = null; 
    public $isshow = 'none';
    public $isOpen = false;
    public $uploadedImage1;
    public $uploadedImage2; 
    public $swappedImage;
    public $combineimage = ''; 
    public $selectedswapimage = 'Image-1.jpeg';

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Load user's credits from database
            $this->credits = $user->credits;
        }
    }

    public function updatedUploadedImage1()
    {
        $this->validate([
            'uploadedImage1' => 'image|max:1024', // 1MB Max
        ]);

        $this->uploadedImage1 = $this->uploadedImage1->store('uploads', 'public');
    }

    public function updatedUploadedImage2()
    {
        $this->validate([
            'uploadedImage2' => 'image|max:1024', // 1MB Max
        ]);

        $this->uploadedImage2 = $this->uploadedImage2->store('uploads', 'public');
    }
    
    public function selectimage($image)
    {
        $this->selectedImage = $image;
        if($this->selectedImage == 1){
            $this->selectedswapimage == "Image-1.jpeg";
        }else{
            $this->selectedswapimage == "Image-2.jpg";
        }
    }
    public function submitImages()
    {



        if ($this->credits < 2) {
            session()->flash('error', 'Not enough credits.');
            return;
        }

        // Logic to handle image submission and face swapping using Remaker AI API

        $this->credits -= 2; // Deduct credits

        // Save updated credits to the user
        if (Auth::check()) {
            $user = Auth::user();
            $user->credits = $this->credits;
            $user->save();
        }

        // Assume images are processed and replaced here
        session()->flash('success', 'Images processed successfully.');
    }

    public function render()
    {
        return view('livewire.face-swap')->layout('layouts.app');;
    }
    
    
    
    

    public function createJob($swapimage, $imagepath) {
        $url = 'https://developer.remaker.ai/api/remaker/v1/face-swap/create-job';
        $headers = [
            'accept' => 'application/json',
            'Authorization' => env('REMAKE_API_KEY'),
        ];

        try {
            // Make the API request
            $response = Http::withHeaders($headers)->attach(
                'target_image', file_get_contents(storage_path('app/public/'.$swapimage)), basename(storage_path('app/public/'.$swapimage))
            )->attach(
                'swap_image', file_get_contents(storage_path('app/public/' . $imagepath)), basename(storage_path('app/public/' . $imagepath))
            )->post($url);

            if ($response->successful()) {
                
                 $data = $response->json();
                 Log::info('API Response: ', $data);
                 sleep(4);
                $details = $this->fetchjob($data['result']['job_id']);
                $imageData = file_get_contents($details['result']['output_image_url'][0]);
                $tempImagePath = storage_path('app/public/'.basename($details['result']['output_image_url'][0]));
                file_put_contents($tempImagePath, $imageData);
                Log::info($details);
                return $details['result']['output_image_url'][0];
            } else {
                Log::error('API Error: ' . $response->body());
                return response()->json(['error' => 'Face swap failed.'], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
        }
    }


    public function splitAndJoinImage()
    {
  
        if($this->uploadedImage1 == ""){
            $this->error = "Please upload Male Image";
            return false;
        }
        if($this->uploadedImage2 == ""){
            $this->error = "Please upload Female Image";
            return false;
        }
        $this->error = "";
        $this->disabled = "disabled";
      // Load the image
      $imagePath = public_path('image/'.$this->selectedswapimage);
      $image = imagecreatefromjpeg($imagePath);

      // Get the dimensions
      $width = imagesx($image);
      $height = imagesy($image);

      // Calculate the split point (middle)
      $splitPoint = $width / 2;

      // Create blank images for the left and right halves
      $leftHalf = imagecreatetruecolor($splitPoint, $height);
      $rightHalf = imagecreatetruecolor($splitPoint, $height);

      // Copy the left half
      imagecopy($leftHalf, $image, 0, 0, 0, 0, $splitPoint, $height);

      // Copy the right half
      imagecopy($rightHalf, $image, 0, 0, $splitPoint, 0, $splitPoint, $height);

      // Save the halves (optional)
      imagejpeg($leftHalf, storage_path('app/public/left_half.jpg'));
      imagejpeg($rightHalf, storage_path('app/public/right_half.jpg'));
      // Free memory
      imagedestroy($image);
      imagedestroy($leftHalf);
      imagedestroy($rightHalf);


      $imageUrl1 = $this->createJob('left_half.jpg', $this->uploadedImage1);
      $imageUrl2 = $this->createJob('right_half.jpg', $this->uploadedImage2);


        // Download the images from the URLs
        $imageData1 = file_get_contents($imageUrl1);
        $imageData2 = file_get_contents($imageUrl2);

        // Create temporary files for the images
        $tempImagePath1 = tempnam(sys_get_temp_dir(), 'image1_');
        $tempImagePath2 = tempnam(sys_get_temp_dir(), 'image2_');

        file_put_contents($tempImagePath1, $imageData1);
        file_put_contents($tempImagePath2, $imageData2);

        // Load the images
        $image1 = imagecreatefromstring(file_get_contents($tempImagePath1));
        $image2 = imagecreatefromstring(file_get_contents($tempImagePath2));

        // Get the dimensions of the images
        $width1 = imagesx($image1);
        $height1 = imagesy($image1);
        $width2 = imagesx($image2);
        $height2 = imagesy($image2);

        // Create a new canvas for the combined image
        $combinedWidth = $width1 + $width2;
        $combinedHeight = max($height1, $height2);
        $combinedImage = imagecreatetruecolor($combinedWidth, $combinedHeight);

        // Fill the background with white color
        $white = imagecolorallocate($combinedImage, 255, 255, 255);
        imagefill($combinedImage, 0, 0, $white);

        // Copy the first image to the left side of the canvas
        imagecopy($combinedImage, $image1, 0, 0, 0, 0, $width1, $height1);

        // Copy the second image to the right side of the canvas
        imagecopy($combinedImage, $image2, $width1, 0, 0, 0, $width2, $height2);

        // Save the combined image
        $outputImagePath = public_path('image/combined_image.jpg');
        $this->combineimage = asset('image/combined_image.jpg');
        imagejpeg($combinedImage, $outputImagePath);

        // Clean up
        imagedestroy($image1);
        imagedestroy($image2);
        imagedestroy($combinedImage);
        $this->disabled = "";
      return "Image processed and saved successfully.";

    }

    public function generateImage(){
        dd("image");
        // dd(basename("https://image.remaker.ai/datarm/api/face-detect/2024-06-28/output/tmp93rq3_wo.png"));

//  $details = $this->fetchjob('449ef502-e133-4d2c-8a16-149e645875f4');
//                  Log::info($details);

        // $url = 'https://developer.remaker.ai/api/remaker/v1/face-swap/create-job';
        // $headers = [
        //     'accept' => 'application/json',
        //     'Authorization' => env('REMAKE_API_KEY'),
        // ];

        // try {
        //     // Make the API request
        //     $response = Http::withHeaders($headers)->attach(
        //         'target_image', file_get_contents(public_path('image/'.$this->selectedswapimage)), basename(public_path('image/'.$this->selectedswapimage))
        //     )->attach(
        //         'swap_image', file_get_contents(storage_path('app/public/' . $this->uploadedImage2)), basename(storage_path('app/public/' . $this->uploadedImage2))
        //     )->post($url);

        //     if ($response->successful()) {
                
        //          $data = $response->json();
        //          Log::info('API Response: ', $data);
        //         $details = $this->fetchjob($data['result']['job_id']);
        //          Log::info($details);
        //         return response()->json($data);
        //     } else {
        //         Log::error('API Error: ' . $response->body());
        //         return response()->json(['error' => 'Face swap failed.'], $response->status());
        //     }
        // } catch (\Exception $e) {
        //     Log::error('Exception: ' . $e->getMessage());
        //     return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
        // }
        
        // Tested for Multiple Swap

        //  $details = $this->fetchjob('84d38644-c7af-41ef-8c66-8e92c226a888');
        //  Log::info($details);

        // $detectResponse = $this->detectFaces(public_path('image/'.$this->selectedswapimage));

        
        // Log::info($detectResponse);

        // if ($detectResponse['code'] == 100000 && $detectResponse['code'] == 100000) {
        //     $swapResponse = $this->createSwapJob($this->uploadedImage1, $this->uploadedImage2, $detectResponse);
        //      Log::info($swapResponse);

        //     if ($swapResponse['code'] == 100000) {
        //  $details = $this->fetchjob($swapResponse['result']['job_id']);
        //  Log::info($details);
        //         $this->swappedImage = $details['result']['output_image_url'][0];
        //     } else {
        //          Log::info('Face swap failed.');
        //     }
        // } else {
        //     Log::info('Face detection failed.');
        // }

    }


    private function detectFaces($imagePath)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => env('REMAKE_API_KEY'),
        ])->attach(
            'target_image', file_get_contents($imagePath), basename($imagePath)
        )->post('https://developer.remaker.ai/api/remaker/v1/face-detect/create-detect');

        return $response->json();
    }
    
    //   private function fetchjob($jobid)
    // {
    //      $response = Http::withHeaders([
    //         'accept' => 'application/json',
    //         'Authorization' => env('REMAKE_API_KEY'),
    //     ])->get("https://developer.remaker.ai/api/remaker/v1/face-detect/face-detect/{$jobid}");


    //     return $response->json();
    // }
    
        private function fetchjob($jobid)
    {
         $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => env('REMAKE_API_KEY'),
        ])->get("https://developer.remaker.ai/api/remaker/v1/face-swap/{$jobid}");


        return $response->json();
    }
    
    
    
    private function detectfetchjob($jobid)
    {
         $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => env('REMAKE_API_KEY'),
        ])->get("https://developer.remaker.ai/api/remaker/v1/face-detect/face-detect/{$jobid}");


        return $response->json();
    }

    private function createSwapJob($image1Path, $image2Path, $detectface)
    {
        // Create a zip file containing the images
        $zip = new \ZipArchive();
        $zipPath = storage_path('app/public/'.date('Y-m-d-h-i-s').'images.zip');
        if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
            $zip->addFile(storage_path('app/public/' . $image1Path), basename($image1Path));
            $zip->addFile(storage_path('app/public/' . $image2Path), basename($image2Path));
            $zip->close();
        }

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => env('REMAKE_API_KEY'),
        ])->attach(
            'target_image', file_get_contents(public_path('image/'.$this->selectedswapimage)), basename(public_path('image/'.$this->selectedswapimage))
        )->attach(
            'model_face', file_get_contents($zipPath), 'images.zip'
        )->post('https://developer.remaker.ai/api/remaker/v1/face-detect/create-swap');

        return $response->json();
    }

    public function redirectToGoogle()
    {
      
        return Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
    }

    public function swapFaces()
    {
        $this->validate([
            'photo' => 'required|image|max:10240', // Max 10MB
        ]);

        $path = $this->photo->getRealPath();
        
        // Assuming Remake API requires multipart/form-data
        $response = Http::attach(
            'image', file_get_contents($path), $this->photo->getClientOriginalName()
        )->post('https://api.remake.com/faceswap', [
            'male_face_url' => 'https://example.com/male_face.jpg', // Replace with actual URL or base64 encoded image
            'female_face_url' => 'https://example.com/female_face.jpg', // Replace with actual URL or base64 encoded image
        ]);

        if ($response->successful()) {
            $this->resultUrl = $response->json()['result_url'];
        } else {
            // Handle error
            session()->flash('error', 'Face swap failed. Please try again.');
        }
    }

    public function togglePopup()
    {
        $this->isOpen = !$this->isOpen;
    }
}
