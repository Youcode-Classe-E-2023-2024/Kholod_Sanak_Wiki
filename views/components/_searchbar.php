<?php
?>

<div class="h-screen overflow-hidden flex items-center justify-center" >

    <div class="min-h-screen flex justify-center items-center">
        <form>

            <div class="sm:flex items-center bg-white rounded-lg overflow-hidden px-2 py-1 justify-between">
                <select id="select" class="text-base text-gray-800 outline-none border-2 px-4 py-2 rounded-lg">
                    <option value="com" selected>com</option>
                    <option value="net">net</option>
                    <option value="org">org</option>

                </select>
                <div class="ms:flex items-center px-2 rounded-lg  mx-auto ">
                    <input class="text-base text-gray-400 flex-grow outline-none px-4  focus-within:shadow-lg" type="text" placeholder="Search ..." />

                    <button >
                        <div class="grid place-items-center h-full w-12 text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
