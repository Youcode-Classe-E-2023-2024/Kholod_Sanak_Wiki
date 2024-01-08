<?php
?>


<div class="flex h-screen w-full bg-gray-800 " >

    <!-- Desktop sidebar -->
    <aside class="z-20 flex-shrink-0 hidden w-60 pl-2 overflow-y-auto bg-gray-800 md:block">
        <div>
            <div class="text-white">
                <div class="flex p-2  bg-gray-800">
                    <div class="flex py-3 px-2 items-center">
                        <p class="text-2xl text-green-500 font-semibold"></p <p class="ml-2 font-semibold italic">
                        </p>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="">
                        <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4 border-green-400"
                             src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="">
                        <p class="font-bold text-base  text-gray-400 pt-2 text-center w-24">Username</p>
                    </div>
                </div>
                <div>
                    <ul class="mt-6 leading-10">
                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                               href="index.php?page=dashboard">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-4">DASHBOARD</span>
                            </a>
                        </li>
                        <!-- category-->
                        <li class="relative px-2 py-1" >
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                               href="index.php?page=categories">
                                    <span
                                        class="inline-flex items-center  text-sm font-semibold text-white hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                        </svg>
                                        <!-- Items -->
                                        <span class="ml-4">CATEGORIES</span>
                                    </span>
                            </a>
                        </li>
                        <!--Tags-->
                        <li class="relative px-2 py-1" >
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                               href="index.php?page=products">
                                    <span
                                        class="inline-flex items-center  text-sm font-semibold text-white hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                        </svg>
                                        <!-- Items -->
                                        <span class="ml-4">TAGS</span>
                                    </span>
                            </a>
                        </li>
                        <!-- Wikis -->
                        <li class="relative px-2 py-1" >
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                               href="index.php?page=products">
                                    <span
                                        class="inline-flex items-center  text-sm font-semibold text-white hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                        </svg>
                                        <!-- Items -->
                                        <span class="ml-4">WIKIS</span>
                                    </span>
                            </a>
                        </li>
                        <!-- Authors -->
                        <li class="relative px-2 py-1" >
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                               href="index.php?page=users">
                                    <span
                                        class="inline-flex items-center  text-sm font-semibold text-white hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>

                                        <!-- Items -->
                                        <span class="ml-4">USERS</span>
                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>


    <div class="flex flex-col flex-1 w-full overflow-y-auto">
        <header class="z-40 py-4  bg-gray-800  ">
            <div class="flex items-center justify-between h-8 px-6 mx-auto">
                <!-- Mobile hamburger -->
                <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        aria-label="Menu">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>

                <!-- Search Input -->
                <div class="flex justify-center  mt-2 mr-4">
                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <input type="search" placeholder="Search"
                               class="form-input px-3 py-2 placeholder-gray-400 text-gray-700 relative bg-white rounded-lg text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                        <span
                            class="z-10 h-full leading-snug font-normal  text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                    </div>

                </div>
                <!--logout-->
                <form method="post" action="index.php?page=logout" >
                    <button type="submit" name="logout" class="bg-red-500 text-white px-3 py-2 rounded-md flex items-center">
                        Logout

                    </button>
                </form>
            </div>
        </header>




<!-- List start-->

        <div  id="list" class="col-span-12 mt-5">
            <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                <div class="bg-white p-4 shadow-lg rounded-lg">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-base">Table</h1>
                        <button  id="addProductForm" class=" mb-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Catgeory
                            </button>
                    </div>
                    <div class="mt-4">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto">
                                <div class="py-2 align-middle inline-block min-w-full">
                                    <div
                                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    <div class="flex cursor-pointer">
                                                        <span class="mr-2">Category NAME</span>
                                                    </div>
                                                </th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    <div class="flex cursor-pointer">
                                                        <span class="mr-2">Created at</span>
                                                    </div>
                                                </th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    <div class="flex cursor-pointer">
                                                        <span class="mr-2">Updated at</span>
                                                    </div>
                                                </th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    <div class="flex cursor-pointer">
                                                        <span class="mr-2">ACTION</span>
                                                    </div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id ="product-table" class="bg-white divide-y divide-gray-200">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>
</div>
</div>