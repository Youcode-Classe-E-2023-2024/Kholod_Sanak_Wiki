<?php
?>
<header>
    <?php include_once 'views/components/_header.php'; ?>
</header>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap ">
            <div class="p-4 lg:w-2/3 w-full lg:w-2/3 px-3" id="wikiContainer">

                <!-- wiki section-->

            </div>

            <!-- right sidebar -->
            <div class="p-4 lg:w-1/3 w-full lg:w-1/3 px-3">
                <!-- topics -->
                <div class="mb-4">
                    <h5 class="font-bold text-lg uppercase text-gray-700 px-1 mb-2"> Popular Categories </h5>
                    <ul>
                        <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                            <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                                <span class="inline-block h-4 w-4 bg-green-300 mr-3"></span>
                                Nutrition
                                <span class="text-gray-500 ml-auto">23 articles</span>
                                <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                            </a>
                        </li>
                        <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                            <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                                <span class="inline-block h-4 w-4 bg-indigo-300 mr-3"></span>
                                Food & Diet
                                <span class="text-gray-500 ml-auto">18 articles</span>
                                <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                            </a>
                        </li>
                        <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                            <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                                <span class="inline-block h-4 w-4 bg-yellow-300 mr-3"></span>
                                Workouts
                                <span class="text-gray-500 ml-auto">34 articles</span>
                                <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                            </a>
                        </li>
                        <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                            <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                                <span class="inline-block h-4 w-4 bg-blue-300 mr-3"></span>
                                Immunity
                                <span class="text-gray-500 ml-auto">9 articles</span>
                                <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</section>
<footer>
    <?php include_once 'views/components/_footer.php'; ?>
</footer>


<script src="<?= PATH ?>assets/js/homepage.js"></script>

