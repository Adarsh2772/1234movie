<div>
    <link rel="icon" href="favicon.ico">
    <link href="style.css" rel="stylesheet">
    <script nonce="eed8c876-de57-417a-81e9-3429cf944b29">
        try {
            (function(w, d) {
                ! function(U, V, W, X) {
                    U[W] = U[W] || {};
                    U[W].executed = [];
                    U.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    U.zaraz._v = "5705";
                    U.zaraz.q = [];
                    U.zaraz._f = function(Y) {
                        return async function() {
                            var Z = Array.prototype.slice.call(arguments);
                            U.zaraz.q.push({
                                m: Y,
                                a: Z
                            })
                        }
                    };
                    for (const $ of ["track", "set", "debug"]) U.zaraz[$] = U.zaraz._f($);
                    U.zaraz.init = () => {
                        var ba = V.getElementsByTagName(X)[0],
                            bb = V.createElement(X),
                            bc = V.getElementsByTagName("title")[0];
                        bc && (U[W].t = V.getElementsByTagName("title")[0].text);
                        U[W].x = Math.random();
                        U[W].w = U.screen.width;
                        U[W].h = U.screen.height;
                        U[W].j = U.innerHeight;
                        U[W].e = U.innerWidth;
                        U[W].l = U.location.href;
                        U[W].r = V.referrer;
                        U[W].k = U.screen.colorDepth;
                        U[W].n = V.characterSet;
                        U[W].o = (new Date).getTimezoneOffset();
                        if (U.dataLayer)
                            for (const bg of Object.entries(Object.entries(dataLayer).reduce(((bh, bi) => ({
                                    ...bh[1],
                                    ...bi[1]
                                })), {}))) zaraz.set(bg[0], bg[1], {
                                scope: "page"
                            });
                        U[W].q = [];
                        for (; U.zaraz.q.length;) {
                            const bj = U.zaraz.q.shift();
                            U[W].q.push(bj)
                        }
                        bb.defer = !0;
                        for (const bk of [localStorage, sessionStorage]) Object.keys(bk || {}).filter((bm => bm
                            .startsWith("_zaraz_"))).forEach((bl => {
                            try {
                                U[W]["z_" + bl.slice(7)] = JSON.parse(bk.getItem(bl))
                            } catch {
                                U[W]["z_" + bl.slice(7)] = bk.getItem(bl)
                            }
                        }));
                        bb.referrerPolicy = "origin";
                        bb.src = "cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(U[W])));
                        ba.parentNode.insertBefore(bb, ba)
                    };
                    ["complete", "interactive"].includes(V.readyState) ? zaraz.init() : U.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
    </head>

    <body x-data="{ page: 'crm', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
        <!-- ===== Preloader Start ===== -->
        <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
            class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
            <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent">
            </div>
        </div>

        <!-- ===== Preloader End ===== -->

        <!-- ===== Page Wrapper Start ===== -->
        <div class="flex h-screen overflow-hidden">
            <!-- ===== Sidebar Start ===== -->
            <aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
                class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
                @click.outside="sidebarToggle = false">
                <!-- SIDEBAR HEADER -->
                <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
                    <a href="index.html">
                        <img src="src/images/logo/logo.svg" alt="Logo" />
                    </a>

                    <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
                        <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                                fill="" />
                        </svg>
                    </button>
                </div>
                <!-- SIDEBAR HEADER -->

                <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
                    <!-- Sidebar Menu -->
                    <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{ selected: $persist('Dashboard') }">
                        <!-- Menu Group -->
                        <div>
                            <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3>

                            <ul class="mb-6 flex flex-col gap-1.5">
                                <!-- Menu Item Dashboard -->
                                <li>
                                    <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                        href="/visitors"
                                        @click.prevent="selected = (selected === 'Dashboard' ? '':'Dashboard')"
                                        :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Dashboard') || (
                                                page === 'ecommerce' || page === 'analytics' || page === 'stocks') }">
                                        <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.10322 0.956299H2.53135C1.5751 0.956299 0.787598 1.7438 0.787598 2.70005V6.27192C0.787598 7.22817 1.5751 8.01567 2.53135 8.01567H6.10322C7.05947 8.01567 7.84697 7.22817 7.84697 6.27192V2.72817C7.8751 1.7438 7.0876 0.956299 6.10322 0.956299ZM6.60947 6.30005C6.60947 6.5813 6.38447 6.8063 6.10322 6.8063H2.53135C2.2501 6.8063 2.0251 6.5813 2.0251 6.30005V2.72817C2.0251 2.44692 2.2501 2.22192 2.53135 2.22192H6.10322C6.38447 2.22192 6.60947 2.44692 6.60947 2.72817V6.30005Z"
                                                fill="" />
                                            <path
                                                d="M15.4689 0.956299H11.8971C10.9408 0.956299 10.1533 1.7438 10.1533 2.70005V6.27192C10.1533 7.22817 10.9408 8.01567 11.8971 8.01567H15.4689C16.4252 8.01567 17.2127 7.22817 17.2127 6.27192V2.72817C17.2127 1.7438 16.4252 0.956299 15.4689 0.956299ZM15.9752 6.30005C15.9752 6.5813 15.7502 6.8063 15.4689 6.8063H11.8971C11.6158 6.8063 11.3908 6.5813 11.3908 6.30005V2.72817C11.3908 2.44692 11.6158 2.22192 11.8971 2.22192H15.4689C15.7502 2.22192 15.9752 2.44692 15.9752 2.72817V6.30005Z"
                                                fill="" />
                                            <path
                                                d="M6.10322 9.92822H2.53135C1.5751 9.92822 0.787598 10.7157 0.787598 11.672V15.2438C0.787598 16.2001 1.5751 16.9876 2.53135 16.9876H6.10322C7.05947 16.9876 7.84697 16.2001 7.84697 15.2438V11.7001C7.8751 10.7157 7.0876 9.92822 6.10322 9.92822ZM6.60947 15.272C6.60947 15.5532 6.38447 15.7782 6.10322 15.7782H2.53135C2.2501 15.7782 2.0251 15.5532 2.0251 15.272V11.7001C2.0251 11.4188 2.2501 11.1938 2.53135 11.1938H6.10322C6.38447 11.1938 6.60947 11.4188 6.60947 11.7001V15.272Z"
                                                fill="" />
                                            <path
                                                d="M15.4689 9.92822H11.8971C10.9408 9.92822 10.1533 10.7157 10.1533 11.672V15.2438C10.1533 16.2001 10.9408 16.9876 11.8971 16.9876H15.4689C16.4252 16.9876 17.2127 16.2001 17.2127 15.2438V11.7001C17.2127 10.7157 16.4252 9.92822 15.4689 9.92822ZM15.9752 15.272C15.9752 15.5532 15.7502 15.7782 15.4689 15.7782H11.8971C11.6158 15.7782 11.3908 15.5532 11.3908 15.272V11.7001C11.3908 11.4188 11.6158 11.1938 11.8971 11.1938H15.4689C15.7502 11.1938 15.9752 11.4188 15.9752 11.7001V15.272Z"
                                                fill="" />
                                        </svg>

                                        Dashboard
                                    </a>
                                </li>
                                <!-- Menu Item Dashboard -->
                            </ul>
                        </div>
                    </nav>
                </div>
            </aside>

            <!-- ===== Sidebar End ===== -->

            <!-- ===== Content Area Start ===== -->
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                <!-- ===== Header Start ===== -->
                <header
                    class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none">
                    <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
                        <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
                            <!-- Hamburger Toggle BTN -->
                            <button
                                class="z-99999 block rounded-sm border border-stroke bg-white p-1.5 shadow-sm dark:border-strokedark dark:bg-boxdark lg:hidden"
                                @click.stop="sidebarToggle = !sidebarToggle">
                                <span class="relative block h-5.5 w-5.5 cursor-pointer">
                                    <span class="du-block absolute right-0 h-full w-full">
                                        <span
                                            class="relative left-0 top-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-[0] duration-200 ease-in-out dark:bg-white"
                                            :class="{ '!w-full delay-300': !sidebarToggle }"></span>
                                        <span
                                            class="relative left-0 top-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-150 duration-200 ease-in-out dark:bg-white"
                                            :class="{ '!w-full delay-400': !sidebarToggle }"></span>
                                        <span
                                            class="relative left-0 top-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-200 duration-200 ease-in-out dark:bg-white"
                                            :class="{ '!w-full delay-500': !sidebarToggle }"></span>
                                    </span>
                                    <span class="du-block absolute right-0 h-full w-full rotate-45">
                                        <span
                                            class="absolute left-2.5 top-0 block h-full w-0.5 rounded-sm bg-black delay-300 duration-200 ease-in-out dark:bg-white"
                                            :class="{ '!h-0 delay-[0]': !sidebarToggle }"></span>
                                        <span
                                            class="delay-400 absolute left-0 top-2.5 block h-0.5 w-full rounded-sm bg-black duration-200 ease-in-out dark:bg-white"
                                            :class="{ '!h-0 dealy-200': !sidebarToggle }"></span>
                                    </span>
                                </span>
                            </button>
                            <!-- Hamburger Toggle BTN -->
                            <a class="block flex-shrink-0 lg:hidden" href="index.html">
                                <img src="src/images/logo/logo-icon.svg" alt="Logo" />
                            </a>
                        </div>
                        <div class="hidden sm:block">
                        </div>

                        <div class="flex items-center gap-3 2xsm:gap-7">
                            <ul class="flex items-center gap-2 2xsm:gap-4">

                                <!-- Notification Menu Area -->
                                {{-- <li class="relative" x-data="{ dropdownOpen: false, notifying: true }" @click.outside="dropdownOpen = false">
                                    <a class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-primary dark:border-strokedark dark:bg-meta-4 dark:text-white"
                                        href="#"
                                        @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false">
                                        <span :class="!notifying && 'hidden'"
                                            class="absolute -top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-meta-1">
                                            <span
                                                class="absolute -z-1 inline-flex h-full w-full animate-ping rounded-full bg-meta-1 opacity-75"></span>
                                        </span>

                                        <svg class="fill-current duration-300 ease-in-out" width="18"
                                            height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.1999 14.9343L15.6374 14.0624C15.5249 13.8937 15.4687 13.7249 15.4687 13.528V7.67803C15.4687 6.01865 14.7655 4.47178 13.4718 3.31865C12.4312 2.39053 11.0812 1.7999 9.64678 1.6874V1.1249C9.64678 0.787402 9.36553 0.478027 8.9999 0.478027C8.6624 0.478027 8.35303 0.759277 8.35303 1.1249V1.65928C8.29678 1.65928 8.24053 1.65928 8.18428 1.6874C4.92178 2.05303 2.4749 4.66865 2.4749 7.79053V13.528C2.44678 13.8093 2.39053 13.9499 2.33428 14.0343L1.7999 14.9343C1.63115 15.2155 1.63115 15.553 1.7999 15.8343C1.96865 16.0874 2.2499 16.2562 2.55928 16.2562H8.38115V16.8749C8.38115 17.2124 8.6624 17.5218 9.02803 17.5218C9.36553 17.5218 9.6749 17.2405 9.6749 16.8749V16.2562H15.4687C15.778 16.2562 16.0593 16.0874 16.228 15.8343C16.3968 15.553 16.3968 15.2155 16.1999 14.9343ZM3.23428 14.9905L3.43115 14.653C3.5999 14.3718 3.68428 14.0343 3.74053 13.6405V7.79053C3.74053 5.31553 5.70928 3.23428 8.3249 2.95303C9.92803 2.78428 11.503 3.2624 12.6562 4.2749C13.6687 5.1749 14.2312 6.38428 14.2312 7.67803V13.528C14.2312 13.9499 14.3437 14.3437 14.5968 14.7374L14.7655 14.9905H3.23428Z"
                                                fill="" />
                                        </svg>
                                    </a>

                                    <!-- Dropdown Start -->
                                    <div x-show="dropdownOpen"
                                        class="absolute -right-27 mt-2.5 flex h-90 w-75 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark sm:right-0 sm:w-80">
                                        <div class="px-4.5 py-3">
                                            <h5 class="text-sm font-medium text-bodydark2">Notification</h5>
                                        </div>

                                        <ul class="flex h-auto flex-col overflow-y-auto">
                                            <li>
                                                <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4"
                                                    href="#">
                                                    <p class="text-sm">
                                                        <span class="text-black dark:text-white">Edit your information
                                                            in a swipe</span>
                                                        Sint occaecat cupidatat non proident, sunt in culpa qui
                                                        officia deserunt mollit anim.
                                                    </p>

                                                    <p class="text-xs">12 May, 2025</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4"
                                                    href="#">
                                                    <p class="text-sm">
                                                        <span class="text-black dark:text-white">It is a long
                                                            established fact</span>
                                                        that a reader will be distracted by the readable.
                                                    </p>

                                                    <p class="text-xs">24 Feb, 2025</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4"
                                                    href="#">
                                                    <p class="text-sm">
                                                        <span class="text-black dark:text-white">There are many
                                                            variations</span>
                                                        of passages of Lorem Ipsum available, but the majority have
                                                        suffered
                                                    </p>

                                                    <p class="text-xs">04 Jan, 2025</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4"
                                                    href="#">
                                                    <p class="text-sm">
                                                        <span class="text-black dark:text-white">There are many
                                                            variations</span>
                                                        of passages of Lorem Ipsum available, but the majority have
                                                        suffered
                                                    </p>

                                                    <p class="text-xs">01 Dec, 2024</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown End -->
                                </li> --}}
                                <!-- Notification Menu Area -->

                            </ul>

                            <!-- User Area -->
                            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                                <a class="flex items-center gap-4" href="#"
                                    @click.prevent="dropdownOpen = ! dropdownOpen">
                                    <span class="hidden text-right lg:block">
                                        <span class="block text-sm font-medium text-black dark:text-white">Krishna Jannu</span>
                                        <span class="block text-xs font-medium">Admin</span>
                                    </span>

                                    {{-- <span class="h-12 w-12 rounded-full">
                                        <img src="src/images/user/user-01.png" alt="User" />
                                    </span> --}}

                                    <svg :class="dropdownOpen && 'rotate-180'" class="hidden fill-current sm:block"
                                        width="12" height="8" viewBox="0 0 12 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                                            fill="" />
                                    </svg>
                                </a>

                                <!-- Dropdown Start -->
                                <div x-show="dropdownOpen"
                                    class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                                  
                                    <button
                                        class="flex items-center gap-3.5 px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.5375 0.618744H11.6531C10.7594 0.618744 10.0031 1.37499 10.0031 2.26874V4.64062C10.0031 5.05312 10.3469 5.39687 10.7594 5.39687C11.1719 5.39687 11.55 5.05312 11.55 4.64062V2.23437C11.55 2.16562 11.5844 2.13124 11.6531 2.13124H15.5375C16.3625 2.13124 17.0156 2.78437 17.0156 3.60937V18.3562C17.0156 19.1812 16.3625 19.8344 15.5375 19.8344H11.6531C11.5844 19.8344 11.55 19.8 11.55 19.7312V17.3594C11.55 16.9469 11.2062 16.6031 10.7594 16.6031C10.3125 16.6031 10.0031 16.9469 10.0031 17.3594V19.7312C10.0031 20.625 10.7594 21.3812 11.6531 21.3812H15.5375C17.2219 21.3812 18.5625 20.0062 18.5625 18.3562V3.64374C18.5625 1.95937 17.1875 0.618744 15.5375 0.618744Z"
                                                fill="" />
                                            <path
                                                d="M6.05001 11.7563H12.2031C12.6156 11.7563 12.9594 11.4125 12.9594 11C12.9594 10.5875 12.6156 10.2438 12.2031 10.2438H6.08439L8.21564 8.07813C8.52501 7.76875 8.52501 7.2875 8.21564 6.97812C7.90626 6.66875 7.42501 6.66875 7.11564 6.97812L3.67814 10.4844C3.36876 10.7938 3.36876 11.275 3.67814 11.5844L7.11564 15.0906C7.25314 15.2281 7.45939 15.3312 7.66564 15.3312C7.87189 15.3312 8.04376 15.2625 8.21564 15.125C8.52501 14.8156 8.52501 14.3344 8.21564 14.025L6.05001 11.7563Z"
                                                fill="" />
                                        </svg>
                                        Log Out
                                    </button>
                                </div>
                                <!-- Dropdown End -->
                            </div>
                            <!-- User Area -->
                        </div>
                    </div>
                </header>

                <!-- ===== Header End ===== -->

                <!-- ===== Main Content Start ===== -->
                <main>
                    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                        <!-- ===== Data Stats Start ===== -->
                        <div class="mb-8 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-title-sm2 font-bold text-black dark:text-white">
                                    Dashboard Overview
                                </h2>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-3 2xl:gap-7.5">
                            <div
                                class="rounded-sm border border-stroke bg-white p-4 shadow-default dark:border-strokedark dark:bg-boxdark md:p-6 xl:p-7.5">
                                <div class="flex items-end justify-between">
                                    <div>
                                        <h3 class="mb-4 text-title-lg font-bold text-black dark:text-white">
                                            197
                                        </h3>
                                        <p class="font-medium">Total Visitors</p>
                                        <span class="mt-2 flex items-center gap-2">
                                            <span
                                                class="flex items-center gap-1 rounded-md bg-meta-3 p-1 text-xs font-medium text-white">
                                                <svg width="14" height="15" viewBox="0 0 14 15"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.0155 5.24683H9.49366C9.23116 5.24683 9.01241 5.46558 9.01241 5.72808C9.01241 5.99058 9.23116 6.20933 9.49366 6.20933H11.6593L8.85928 8.09058C8.74991 8.17808 8.59678 8.17808 8.46553 8.09058L5.57803 6.18745C5.11866 5.8812 4.54991 5.8812 4.09053 6.18745L0.721783 8.44058C0.503033 8.5937 0.437408 8.89995 0.590533 9.1187C0.678033 9.24995 0.831157 9.33745 1.00616 9.33745C1.09366 9.33745 1.20303 9.31558 1.26866 9.24995L4.65928 6.99683C4.76866 6.90933 4.92178 6.90933 5.05303 6.99683L7.94053 8.92183C8.39991 9.22808 8.96866 9.22808 9.42803 8.92183L12.5124 6.8437V9.27183C12.5124 9.53433 12.7312 9.75308 12.9937 9.75308C13.2562 9.75308 13.4749 9.53433 13.4749 9.27183V5.72808C13.5187 5.46558 13.278 5.24683 13.0155 5.24683Z"
                                                        fill="white" />
                                                </svg>
                                                <span>+2.5%</span>
                                            </span>

                                            <span class="text-sm font-medium">Since last week</span>
                                        </span>
                                    </div>

                                    
                                </div>
                            </div>

                            <div
                                class="rounded-sm border border-stroke bg-white p-4 shadow-default dark:border-strokedark dark:bg-boxdark md:p-6 xl:p-7.5">
                                <div class="flex items-end justify-between">
                                    <div>
                                        <h3 class="mb-4 text-title-lg font-bold text-black dark:text-white">
                                            745
                                        </h3>
                                        <p class="font-medium">Used Credits</p>
                                        <span class="mt-2 flex items-center gap-2">
                                            <span
                                                class="flex items-center gap-1 rounded-md bg-red p-1 text-xs font-medium text-white">
                                                <svg width="14" height="15" viewBox="0 0 14 15"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.0157 5.24683C12.7532 5.24683 12.5344 5.46558 12.5344 5.72808V8.1562L9.40631 6.07808C8.94693 5.77183 8.37818 5.77183 7.91881 6.07808L5.0313 8.00308C4.92193 8.09058 4.7688 8.09058 4.63755 8.00308L1.24693 5.74995C1.02818 5.59683 0.721929 5.66245 0.568804 5.8812C0.415679 6.09995 0.481304 6.4062 0.700054 6.55933L4.09068 8.81245C4.55005 9.1187 5.1188 9.1187 5.57818 8.81245L8.46568 6.88745C8.57506 6.79995 8.72818 6.79995 8.85943 6.88745L11.6594 8.7687H9.4938C9.23131 8.7687 9.01256 8.98745 9.01256 9.24995C9.01256 9.51245 9.23131 9.7312 9.4938 9.7312H13.0157C13.2782 9.7312 13.4969 9.51245 13.4969 9.24995V5.72808C13.5188 5.46558 13.2782 5.24683 13.0157 5.24683Z"
                                                        fill="white" />
                                                </svg>
                                                <span>+1.5%</span>
                                            </span>

                                            <span class="text-sm font-medium">Since last week</span>
                                        </span>
                                    </div>

                                </div>
                            </div>

                            <div
                                class="rounded-sm border border-stroke bg-white p-4 shadow-default dark:border-strokedark dark:bg-boxdark md:p-6 xl:p-7.5">
                                <div class="flex items-end justify-between">
                                    <div>
                                        <h3 class="mb-4 text-title-lg font-bold text-black dark:text-white">
                                            512
                                        </h3>
                                        <p class="font-medium">Remaining Credits</p>
                                        <span class="mt-2 flex items-center gap-2">
                                            <span
                                                class="flex items-center gap-1 rounded-md bg-meta-3 p-1 text-xs font-medium text-white">
                                                <svg width="14" height="15" viewBox="0 0 14 15"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.0155 5.24683H9.49366C9.23116 5.24683 9.01241 5.46558 9.01241 5.72808C9.01241 5.99058 9.23116 6.20933 9.49366 6.20933H11.6593L8.85928 8.09058C8.74991 8.17808 8.59678 8.17808 8.46553 8.09058L5.57803 6.18745C5.11866 5.8812 4.54991 5.8812 4.09053 6.18745L0.721783 8.44058C0.503033 8.5937 0.437408 8.89995 0.590533 9.1187C0.678033 9.24995 0.831157 9.33745 1.00616 9.33745C1.09366 9.33745 1.20303 9.31558 1.26866 9.24995L4.65928 6.99683C4.76866 6.90933 4.92178 6.90933 5.05303 6.99683L7.94053 8.92183C8.39991 9.22808 8.96866 9.22808 9.42803 8.92183L12.5124 6.8437V9.27183C12.5124 9.53433 12.7312 9.75308 12.9937 9.75308C13.2562 9.75308 13.4749 9.53433 13.4749 9.27183V5.72808C13.5187 5.46558 13.278 5.24683 13.0155 5.24683Z"
                                                        fill="white" />
                                                </svg>
                                                <span>+0.5%</span>
                                            </span>

                                            <span class="text-sm font-medium">Since last week</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ===== Data Stats End ===== -->

                        <div class="mt-7.5 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
                           
                            <!-- ===== Leads Report Start ===== -->
                            <div class="col-span-12">
                                <div
                                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                                    <div class="p-4 md:p-6 xl:p-7.5">
                                        <div class="flex items-start justify-between">
                                            <div>
                                                <h2 class="text-title-sm2 font-bold text-black dark:text-white">
                                                    Visitors
                                                </h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="border-b border-stroke px-4 pb-5 dark:border-strokedark md:px-6 xl:px-7.5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-2/12 xl:w-3/12">
                                                <span class="font-medium">Name</span>
                                            </div>
                                            <div class="w-6/12 2xsm:w-5/12 md:w-3/12">
                                                <span class="font-medium">Email</span>
                                            </div>
                                            <div class="w-4/12 2xsm:w-3/12 md:w-2/12 xl:w-1/12">
                                                <span class="font-medium">IP Address</span>
                                            </div>
                                            <div class="hidden w-2/12 text-center 2xsm:block md:w-3/12">
                                                <span class="font-medium">Updated Date</span>
                                            </div>
                                            <div class="hidden w-2/12 text-center 2xsm:block md:w-1/12">
                                                <span class="font-medium">Used </span>
                                            </div>
                                            <div class="hidden w-2/12 text-center 2xsm:block md:w-1/12">
                                                <span class="font-medium">Remaining </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 md:p-6 xl:p-7.5">
                                        <div class="flex flex-col gap-7">
                                            @foreach($users as $user)
                                            <div class="flex items-center gap-3">
                                                <!-- User Image and Name -->
                                                <div class="w-2/12 xl:w-3/12">
                                                    <div class="flex items-center gap-4">
                                                        <span class="hidden font-medium xl:block">{{ $user->name }}</span>
                                                    </div>
                                                </div>
                                                <!-- User Email -->
                                                <div class="w-6/12 2xsm:w-5/12 md:w-3/12">
                                                    <span class="font-medium">{{ $user->email }} </span>
                                                </div>
                                                <!-- Other User Details -->
                                                <div class="w-4/12 2xsm:w-3/12  md:w-2/12 xl:w-1/12">
                                                    <span class="inline-block rounded bg-red/[0.08] px-2.5 py-0.5 text-sm font-medium text-red">1223.21.32.32</span>
                                                </div>
                                                <div class="hidden w-2/12 text-center 2xsm:block md:w-3/12">
                                                    {{ date('d M Y', strtotime($user->updated_at)) }}
                                                </div>
                                                <div class="hidden w-2/12 text-center 2xsm:block md:w-1/12">
                                                    0
                                                </div>
                                                <div class="hidden w-2/12 text-center 2xsm:block md:w-1/12">
                                                    0
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- ===== Leads Report End ===== -->
                        </div>
                    </div>
                </main>
                <!-- ===== Main Content End ===== -->
            </div>
            <!-- ===== Content Area End ===== -->
        </div>
        <!-- ===== Page Wrapper End ===== -->
        <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script defer src="bundle.js"></script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
            integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
            data-cf-beacon='{"rayId":"89afbe543f9ad65a","version":"2024.4.1","r":1,"token":"67f7a278e3374824ae6dd92295d38f77","b":1}'
            crossorigin="anonymous"></script>
    </body>
</div>
