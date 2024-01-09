<?php
?>
<div class="flex flex-col items-center justify-center w-screen h-screen bg-gray-200 text-gray-700">

    <!-- Component Start -->
    <h1 class="font-bold text-2xl mt-2">Register</h1>
    <form class="flex flex-col bg-white rounded shadow-lg py-8 px-10 mt-8" method="post" action="index.php?page=register" enctype="multipart/form-data">
        <!-- Profil picture -->
<!--        <input  class="hidden" type="file"  name="profile-picture" id="profile-picture" accept="image/*">-->
<!--        <label for="profile-picture" class="cursor-pointer bg-grey-500 hover:bg-blue-500 hover:text-white text-s text-grey py-3 mb-2 text-center rounded inline-block mt-2">Upload Picture</label>-->
        <!--username -->
        <label class="font-semibold text-xs" for="usernameField">Username</label>
        <input id="username" name="logname" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">
        <p><span class="text-red-500 font-semibold	text-xs" id="sp-name"></span></p>

        <!--email -->
        <label class="font-semibold text-xs" for="usernameField">Email</label>
        <input  id="email"  name="logemail" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="email">
        <p><span class="text-red-500 font-semibold text-xs	" id="sp-email"></span></p>

        <!-- Password-->
        <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
        <input id="passwordField" name="logpass" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2"type="password">
        <p><span class="text-red-500 font-semibold	text-xs" id="sp-password"></span></p>


        <button name="signup" id="signup-btn" class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Register</button>
        <div class="flex mt-6 justify-center text-xs">
            <a class="text-blue-400 hover:text-blue-500" href="index.php?page=login">Login</a>
        </div>
    </form>
    <!-- Component End  -->

</div>

<script src="<?= PATH ?>assets/js/form_validation.js"></script>
