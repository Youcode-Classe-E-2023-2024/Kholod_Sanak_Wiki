

<div class="flex h-screen w-full bg-gray-800 " >

    <?php include_once 'views/components/_sidebar.php'; ?>

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

                <div class="flex justify-center  mt-2 mr-4">

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
                        <button  id="addtag-btn" class=" mb-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Tag
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
                                                        <span class="mr-2">TAG NAME</span>
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
                                            <tbody id ="tag-table" class="bg-white divide-y divide-gray-200">
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
        <?php include "views/tagform_view.php";?>

    </div>
</div>
</div>
</main>
</div>
</div>
<script src="<?= PATH ?>assets/js/tag.js"></script>
<script>

    function getTags() {
        $.ajax({
            type: "POST",
            url: "index.php?page=tags",
            data: {   action: 'getTags'},
            success: function (data) {
                let tags = JSON.parse(data);


                $('#tag-table').empty();

                tags.forEach(tag => {
                    let updated_at_display = tag.updated_at !== null ? tag.updated_at : 'Not updated yet';

                    let row = `
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                <p>${tag.tag}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                <p>${tag.created_at}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                    <p>${updated_at_display}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                <div class="flex space-x-4">
                                    <button  id="edit-tag" class="text-blue-500 hover:text-blue-600 "
                                            data-tag-id="${tag.tag_id}"
                                            data-tag="${tag.tag}"
                                            >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <p>Edit</p>
                                    </button>
                                    <button  class=" delete_tag text-red-500 hover:text-red-600"
                                                data-tag-id="${tag.tag_id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <p>Delete</p>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    $('#tag-table').append(row);
                });
            }
        });
    }
    getTags();

</script>