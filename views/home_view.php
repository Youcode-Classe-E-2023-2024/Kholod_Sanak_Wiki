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
                    <h5 class="font-bold text-lg uppercase text-gray-700 px-1 mb-2"> Latest Categories </h5>
                    <ul>
                        <?php
                        $categoryModel = new Category();
                       // $categories = $categoryModel->getLatestCategories();
                        $categories = $categoryModel->getCategories();
                        $wikiModel = new Wiki();
                        foreach ($categories as $category):
                            $wikiNbr= $wikiModel->getWikisCountByCategory($category["category_id"])


                            ?>

                        <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                            <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                                <span class="inline-block h-4 w-4 bg-green-300 mr-3"></span>
                                <?php echo $category["category"] ?>

                                <span class="text-gray-500 ml-auto"><?php  echo $wikiNbr?> Wikis</span>
                                <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                            </a>
                        </li>

                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
</section>
<footer>
    <?php include_once 'views/components/_footer.php'; ?>
</footer>


<script src="<?= PATH ?>assets/js/homepage.js"></script>

