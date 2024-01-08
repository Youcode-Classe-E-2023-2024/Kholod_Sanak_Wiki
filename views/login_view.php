<?php
?>
<div class="flex flex-col items-center justify-center w-screen h-screen bg-gray-200 text-gray-700">

<!-- Component Start -->
<h1 class="font-bold text-2xl">Welcome Back :)</h1>
<form class="flex flex-col bg-white rounded shadow-lg p-12 mt-12" method="post" action="index.php?page=login" enctype="multipart/form-data">
    <label class="font-semibold text-xs" for="usernameField">Email</label>
    <input  type="email" name="email" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2">
    <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
    <input  name="password" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2"type="password">
    <button  name="signin" class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Login</button>
    <div class="flex mt-6 justify-center text-xs">
        <a class="text-blue-400 hover:text-blue-500" href="index.php?page=register">Register</a>
    </div>
</form>
<!-- Component End  -->

</div>
