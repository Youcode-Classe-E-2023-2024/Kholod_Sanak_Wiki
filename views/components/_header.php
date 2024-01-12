<?php
?>

<nav class="relative px-5 top-2 flex justify-between items-center bg-white">
    <ul class="mr-10 lg:mr-60">
        <a class="text-3xl font-bold leading-none" href="index.php?page=home">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
        </a>
    </ul>
    <!--search -->
    <ul class="lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <?php include "views/components/_searchbar.php";?>
    </ul>
    <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <?php if (isset($_SESSION["login"])) { ?>
        <!-- User is logged in -->
        <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" href="index.php?page=wikimanage">Manage Wikis</a>
        <form method="post" action="index.php?page=home">
            <button type="submit" name="logout" class="hidden lg:inline-block py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200">
                Logout
            </button>
        </form>
    <?php } else { ?>
        <!-- User is not logged in -->
        <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200" href="index.php?page=login">Sign In</a>
        <a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" href="index.php?page=register">Sign up</a>
    <?php } ?>
</nav>

<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-full max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="index.php?page=home">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="mt-auto">
            <?php if (isset($_SESSION["login"])) { ?>
                <!-- User is logged in -->
                <a class="block px-4 py-3 mb-3 leading-loose text-xs text-white text-center font-semibold leading-none bg-blue-500 hover:bg-blue-600 rounded-xl" href="index.php?page=wikimanage">Manage Wikis</a>
                <form method="post" action="index.php?page=home">
                    <button type="submit" name="logout" class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl">
                        Logout
                    </button>
                </form>
            <?php } else { ?>
                <!-- User is not logged in -->
                <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="index.php?page=login">Sign in</a>
                <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl" href="index.php?page=register">Sign Up</a>
            <?php } ?>

            <p class="my-4 text-xs text-center text-gray-400">
                <span>Copyright © 2024</span>
            </p>
        </div>
    </nav>
    <script src="<?= PATH ?>assets/js/burger_menu.js"></script>
</div>
