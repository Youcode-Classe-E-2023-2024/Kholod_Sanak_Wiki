<?php
?>

<section id="addUserForm" class="col-span-12 mt-5">
    <div class="min-h-screen p-6  flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">User Form</p>
                        </div>
                        <div class="lg:col-span-2">

                            <form >
                                <!-- Username -->
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-3">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" placeholder="Enter a Username"
                                               class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-3">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" placeholder="Enter an Email"
                                               class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-3">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" placeholder="Enter a Password"
                                               class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
                                    </div>

                                </div>
                                <!-- Role-->
                                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                        <div class="md:col-span-3">
                                            <label for="role">Role</label>
                                            <input type="text" id="role" placeholder="Enter a Role"
                                                   class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
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

