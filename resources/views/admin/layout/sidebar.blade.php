<!-- start sidebar section -->
<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar"
        class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
        <div class="h-full bg-white dark:bg-[#0e1726]">
            <div class="flex items-center justify-between px-4 py-3">
                <a href="index.html" class="main-logo flex shrink-0 items-center">
                    <img class="ml-[5px] w-8 flex-none" src="assets/images/logo.png" alt="image">
                    <span
                        class="align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">StarCode
                        Kh</span>
                </a>
                <a href="javascript:;"
                    class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                    @click="$store.app.toggleSidebar()">
                    <svg class="m-auto h-5 w-5" width="20" height="20" viewbox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
            <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                x-data="{ activeDropdown: 'dashboard' }">


                <li class="menu nav-item">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link group">
                        <div class="flex items-center">
                            <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M18.75 8C18.75 8.41421 18.4142 8.75 18 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H18C18.4142 7.25 18.75 7.58579 18.75 8Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M18.75 12C18.75 12.4142 18.4142 12.75 18 12.75H6C5.58579 12.75 5.25 12.4142 5.25 12C5.25 11.5858 5.58579 11.25 6 11.25H18C18.4142 11.25 18.75 11.5858 18.75 12Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M18.75 16C18.75 16.4142 18.4142 16.75 18 16.75H6C5.58579 16.75 5.25 16.4142 5.25 16C5.25 15.5858 5.58579 15.25 6 15.25H18C18.4142 15.25 18.75 15.5858 18.75 16Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span
                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                        </div>
                    </a>
                </li>

                <h1
                    class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                    <svg class="hidden h-5 w-4 flex-none" viewbox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Administración</span>
                </h1>               
                <li class="menu nav-item">
                    <button type="button" class="nav-link group"
                        :class="{ 'active': activeDropdown === 'authentication' }"
                        @click="activeDropdown === 'authentication' ? activeDropdown = null : activeDropdown = 'authentication'">
                        <div class="flex items-center">
                            <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M8 17C8.55228 17 9 16.5523 9 16C9 15.4477 8.55228 15 8 15C7.44772 15 7 15.4477 7 16C7 16.5523 7.44772 17 8 17Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M6.75 8C6.75 5.10051 9.10051 2.75 12 2.75C14.8995 2.75 17.25 5.10051 17.25 8V10.0036C17.8174 10.0089 18.3135 10.022 18.75 10.0546V8C18.75 4.27208 15.7279 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8V10.0546C5.68651 10.022 6.18264 10.0089 6.75 10.0036V8Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span
                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Authentication</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'authentication' }">
                            <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak="" x-show="activeDropdown === 'authentication'" x-collapse=""
                        class="sub-menu text-gray-500">
                        <li>
                            <a href="auth-boxed-signin.html" target="_blank">Login Boxed</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/update-password') }}" target="_blank">Contraseña</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- end sidebar section -->
