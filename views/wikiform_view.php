<?php
?>

    <section id="addWikiForm" class="col-span-12 mt-5">
        <div class="min-h-screen p-6  flex items-center justify-center">
            <div class="container max-w-screen-lg mx-auto">
                <div>
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Wiki Form</p>
                            </div>
                            <div class="lg:col-span-2">

                                <form>
                                    <!-- Wiki title -->
                                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                        <div class="md:col-span-3">
                                            <label for="title">Wiki title</label>
                                            <input type="text" id="title" placeholder="Enter your Wiki Title"
                                                   class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
                                        </div>
                                    </div>
                                    <!-- Select Wiki Category -->
                                    <div class=" mt-3 grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                        <div class="md:col-span-3">
                                            <label for="category">Wiki Category</label>
                                            <select id="category" name="category" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                                                <?php
                                                $categoryModel = new Category();
                                                $categories = $categoryModel->getCategories();
                                                foreach ($categories as $category):
                                                    ?>
                                                    <option value="<?php echo $category["category_id"]; ?>">
                                                        <?php echo $category["category"]; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Wiki Tag -->
                                    <div class=" mt-3  grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                        <div class="md:col-span-3">
                                            <label for="tags">Wiki Tags</label>
                                            <select id="tags" name="tags[]" class="h-10 border mt-1 rounded px-4 py-6 w-full bg-gray-50" multiple>
                                                <?php
                                                $tagModel = new Tag();
                                                $tags = $tagModel->getTags();
                                                foreach ($tags as $tag):
                                                    ?>
                                                    <option value="<?php echo $tag["tag_id"]; ?>">
                                                        <?php echo $tag["tag"]; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Wiki Description -->
                                    <div class=" mt-3  grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                        <div class="md:col-span-3">
                                            <label for="description">Wiki Description</label>
                                            <textarea id="description" name="description" placeholder="Enter your Wiki Content" class=" border mt-1 rounded py-8 px-4 w-full bg-gray-50"></textarea>
                                        </div>
                                    </div>
                                </form>


                                <!-- Submit button-->
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button id="save" data-action="add"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Submit
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php
