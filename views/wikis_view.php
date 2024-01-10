<?php

?>
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
                <form method="post" action="index.php?page=dashboard" >
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
<!--                        <div class="flex space-x-2">-->
<!--                            <button  id="archivewiki-btn" class=" mb-5 bg-green-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">-->
<!--                                Archive-->
<!--                            </button>-->
                            <button  id="addwiki-btn" class=" mb-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Wiki
                            </button>
<!--                        </div>-->
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
                                                        <span class="mr-2">WIKI TITLE</span>
                                                    </div>
                                                </th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    <div class="flex cursor-pointer">
                                                        <span class="mr-2">STATUS</span>
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
                                            <tbody id ="wiki-table" class="bg-white divide-y divide-gray-200">
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
        <?php include "views/wikiform_view.php";?>

    </div>


<script src="<?= PATH ?>assets/js/wiki.js"></script>
<script>
    let admin = false;
    function getWikis() {
        $.ajax({
            type: "POST",
            url: "index.php?page=wikis",
            data: {   action: 'getWikis'},
            success: function (data) {
                let wikis = JSON.parse(data);


                $('#wiki-table').empty();

                wikis.forEach(wiki => {
                    let updated_at_display = wiki.updated_at !== null ? wiki.updated_at : 'Not updated yet';
                    let archiveBtn = '';
                    console.log(admin);
                    if (admin) {
                       archiveBtn= `<button  id="archive-wiki" class="text-green-500 hover:text-green-600 "
                                 data-wiki-id="${wiki.wiki_id}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 8v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8m4 4h6m-3-8v6m0 0v-6m0 0v6m3-6v6m0-6v6M3 3h18a2 2 0 0 1-2-2V1H5v.01A2 2 0 0 1 3 3z"/>
                            </svg>

                            <p>Archive</p>
                        </button>`
                    }
                    let row = `
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                <p>${wiki.title}</p>
                            </td><td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                <p>${wiki.status}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                <p>${wiki.created_at}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                    <p>${updated_at_display}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                <div class="flex space-x-4">

                                    <button  id="update-wiki" class="text-blue-500 hover:text-blue-600 "
                                            data-wiki-id="${wiki.wiki_id}"
                                            data-wiki="${wiki.title}"
                                            data-content="${wiki.description}"
                                            >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <p>Update</p>
                                    </button>

                                     ${archiveBtn}

                                    <button  class=" delete-wiki text-red-500 hover:text-red-600"
                                                data-wiki-id="${wiki.wiki_id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <p>Delete</p>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    $('#wiki-table').append(row);
                });
            }
        });
    }
    getWikis();
</script>

<?php if (isset($_SESSION["admin"])) { ?>
    <script>
        admin = true;
    </script>
<?php } ?>