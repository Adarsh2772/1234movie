<div>
    <title>ONE TWO THREE FOUR</title>
    <div class="container mx-auto p-4 bg-white">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold">🎩 Swap Couple Faces 🎩</h1>
        </div>

        <div class="flex flex-col items-center justify-center mb-6">
            <h2 class="text-lg font-semibold mb-4">Try the following image</h2>
            <div class="flex flex-wrap justify-center w-full space-x-4">
                <div class="group relative w-full sm:w-2/5 md:w-1/3 lg:w-1/4">
                    <img src="{{asset('image/Image-1.jpeg')}}" wire:click="selectimage(1)" alt="Popular Image 1" style="cursor: pointer" class="w-full h-full object-cover rounded-lg group-hover:opacity-75 {{ $selectedImage == 1 ? 'opacity-75' : ''}} transition duration-300">
                </div>
                <div class="group relative w-full sm:w-2/5 md:w-1/3 lg:w-1/4">
                    <img src="{{asset('image/Image-2.jpg')}}" wire:click="selectimage(2)" alt="Popular Image 1" style="cursor: pointer" class="w-full h-full object-cover rounded-lg group-hover:opacity-75 {{ $selectedImage == 2 ? 'opacity-75' : ''}} transition duration-300">
                </div>
            </div>
        </div>
        

        <div class="flex justify-center mb-6 p-4">
            <div class="border-4 border-dashed border-gray-300 w-full max-w-2xl h-55 flex items-center justify-center bg-gray-100 rounded-lg mx-2">
                <label class="cursor-pointer flex flex-col items-center">
                    <input type="file" wire:model="uploadedImage1" class="hidden">
                    @if ($uploadedImage1)
                        <img src="{{   '/public/storage/'.$uploadedImage1 }}" alt="Uploaded Image" class="w-12 h-12">
                    @else
                        <img src="{{ asset('image/male.jpg') }}" alt="Upload" class="w-12 h-12">
                    @endif
                    <span class="mt-2 text-sm text-gray-600">Upload</span>
                </label>
            </div>

            <div class="border-4 border-dashed border-gray-300 w-full max-w-2xl h-55 flex items-center justify-center bg-gray-100 rounded-lg mx-2">
                <label class="cursor-pointer flex flex-col items-center">
                    <input type="file" wire:model="uploadedImage2" class="hidden">
                    @if ($uploadedImage2)
                        <img src="{{  '/public/storage/'.$uploadedImage2 }}" alt="Uploaded Image" class="w-12 h-12">
                    @else
                        <img src="{{ asset('image/female.jpg') }}" alt="Upload" class="w-12 h-12">
                    @endif
                    <span class="mt-2 text-sm text-gray-600">Upload</span>
                </label>
            </div>
        </div>

        <div class="text-center mb-6" style="    text-align: -webkit-center;">
            <p class="text-red">{{$error}}</p>
            <button type="button" {{ $disabled }} wire:click="splitAndJoinImage()" class="bg-gray-700 text-white px-4 py-2 rounded-md flex items-center" wire:loading.attr="disabled">
               <svg style="display: {{$disabled ? 'block': 'none'; }}" class="animate-spin h-5 w-5 text-white-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-45" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-95" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647zm9.707-5.291A7.962 7.962 0 0112 20v4c4.627 0 8.627-3.686 8.938-8.291l-3-2.647A7.962 7.962 0 0116 12z"></path>
                </svg> 
                Generate Image
            </button>
            
        </div>

        <div class="flex flex-col items-center justify-center">
            @if($combineimage)
                <img src="{{ $combineimage }}" alt="Image" class="w-full h-auto max-w-md" />
        
                <a href="{{ $combineimage }}" download>
                <button type="button"
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700"
                >
                    Download Image
                </button>
                </a>
            @else
                <p>No image available.</p>
            @endif
        </div>
        <div class="text-center mb-6">
            <a href="http://127.0.0.1:8000/auth/google/">
                <button wire:click="togglePopup" class="btn btn-primary">Login with Google</button>
            </a>
        </div>

        <div class="text-center mb-6">
            <label for="consent" class="flex items-center justify-center space-x-2">
                <input type="checkbox" id="consent" name="consent" class="mr-2">
                <span>I consent to the terms and conditions</span>
            </label>
        </div>
    </div>

    <script>
        function handleGoogleLogin() {
            // JavaScript function for handling Google login if necessary
        }
    </script>
</div>
