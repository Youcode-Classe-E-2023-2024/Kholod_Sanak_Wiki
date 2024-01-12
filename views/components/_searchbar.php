<?php
?>

<div class="h-min overflow-hidden flex items-center justify-center" >

    <div class="flex justify-center items-center">
        <form>
            <div class="sm:flex sm:mt-4 items-center bg-white rounded-lg overflow-hidden px-1 py-1 justify-between">
                <div class="flex items-center mb-2 sm:mb-0">
                    <select id="search-type" class="text-sm sm:text-base text-gray-800 outline-none border-2 px-2 sm:px-4 py-1 rounded-lg">
                        <option value="title" selected>title</option>
                        <option value="category">category</option>
                        <option value="tag">tag</option>
                    </select>
                    <input id="search-input" class="text-sm sm:text-base text-gray-400 flex-grow outline-none px-2 sm:px-4 focus-within:shadow-lg py-1 rounded-lg ml-2" type="text" placeholder="Search ..." />
                    <button class="ml-2 sm:ml-4 align-middle">
                        <div class="grid place-items-center h-full w-8 sm:w-12 text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-6 w-4 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </button>
                </div>
            </div>



        </form>
    </div>
</div>
