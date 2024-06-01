<!-- Sidebar Menu Left -->
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open left sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0"
       aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-700">
        <a href="{{ route('home') }}" class="flex items-center ps-2.5 mb-5">
            <img src="{{ asset('assets/img/LogoEduZone.png') }}" class="h-14 me-sm:h-12 " alt="FPT EduZone Logo"/>
        </a>

        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center p-2  text-white rounded-lg hover:bg-orange-500">
                    <svg class="w-5 h-5 text-white transition duration-75group-hover:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <button type="button"
                        class="flex items-center w-full p-2 text-base text-white rounded-lg hover:bg-orange-500"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none"
                         stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Managing</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    @if (Auth::user()->role_id == 1)
                        <li>
                            <a href="{{ route('admin.semester.index') }}"
                               class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">Semester</a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('admin.class.index') }}"
                           class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">Class</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.course.index') }}"
                           class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">Course</a>
                    </li>

                        @if (Auth::user()->role_id == 1)
                            <li>
                                <a href="{{ route('admin.user.index') }}"
                                   class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">User</a>
                            </li>
                        @endif
                </ul>
            </li>


            <li>
                <button type="button"
                        class="flex items-center w-full p-2 text-base text-white rounded-lg hover:bg-orange-500"
                        aria-controls="dropdown-test" data-collapse-toggle="dropdown-test">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none"
                         stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                        <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Test</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-test" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.test.index') }}"
                           class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">Quiz test</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.collection.index') }}"
                           class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">
                            Collection
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.question.index') }}"
                           class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">
                            Question bank
                        </a>
                    </li>
                </ul>
            </li>

{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-orange-500">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none"--}}
{{--                         stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                        <circle cx="12" cy="12" r="4"></circle>--}}
{{--                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>--}}
{{--                    </svg>--}}
{{--                    <span class="flex-1 ms-3 whitespace-nowrap">Blog</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="flex items-center p-2 text-white rounded-lg hover:bg-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none"
                         stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>

<!-- Menu Sidebar Right -->
<aside id="notification-sidebar"
       class="fixed top-0 right-0 z-40 w-72 h-screen transition-transform translate-x-full sm:translate-x-0 bg-gray-700 "
       aria-label="notification-sidebar">
    <div class="h-full px-3 py-4 overflow-hidden">
        <button type="button" class="flex items-center w-full p-2 text-base text-white rounded-lg hover:bg-orange-500"
                aria-controls="dropdown-avatar-right"
                data-collapse-toggle="dropdown-avatar-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none"
                 stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/>
                <circle cx="12" cy="10" r="3"/>
                <circle cx="12" cy="12" r="10"/>
            </svg>
            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
                {{ Auth::user()->name }}
            </span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4"/>
            </svg>
        </button>

        <ul id="dropdown-avatar-right" class="hidden py-2 space-y-2">
            <li>
                <a href="#" class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">Profile</a>
            </li>
            <li>
                <a href="#" class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500">Settings</a>
            </li>
        </ul>

        <hr class="border-t border-white my-4">

        <div class="relative max-w-sm my-5">
            <div class="wrapper">
                <header>
                    <p class="current-date"></p>
                    <div class="icons">
                        <span id="prev" class="material-symbols-rounded">&lt;</span>
                        <span id="next" class="material-symbols-rounded">&gt;</span>
                    </div>
                </header>
                <div class="calendar">
                    <ul class="weeks">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>
                    <ul class="days"></ul>
                </div>
            </div>
        </div>

        <a href="#">
            <div class="flex items-center gap-3 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>
                </svg>
                <h2 class="text-white">Notifications</h2>
            </div>
        </a>

        <div class="bg-gray-500 shadow-lg rounded-lg p-4 mb-2">
            <!-- Notification Title -->
            <h3 class="text-white text-base font-semibold mb-2">Notification Title</h3>
            <!-- Notification Content -->
            <p class="text-xs text-gray-300">Lorem ipsum dolor sit amet, consectetur ....</p>
        </div>

        <div class="bg-gray-500 shadow-lg rounded-lg p-4 mb-2">
            <!-- Notification Title -->
            <h3 class="text-white text-base font-semibold mb-2">Notification Title</h3>
            <!-- Notification Content -->
            <p class="text-xs text-gray-300">Lorem ipsum dolor sit amet, consectetur ....</p>
        </div>

        <div class="bg-gray-500 shadow-lg rounded-lg p-4 mb-2">
            <!-- Notification Title -->
            <h3 class="text-white text-base font-semibold mb-2">Notification Title</h3>
            <!-- Notification Content -->
            <p class="text-xs text-gray-300">Lorem ipsum dolor sit amet, consectetur ....</p>
        </div>
    </div>
</aside>
