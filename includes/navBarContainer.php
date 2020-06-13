<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
include_once("includes/includedFiles.php");
// include("includes/handlers/addsong.php");





?>

<div id="navBarContainer">
	<nav class="navBar">

		<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
			<img src="assests\images\icons\play.png">
		</span>


		<div class="group">

			<div class="navItem">
				<span role='link' tabindex='0' onclick='openPage("search.php")' class="navItemLink">
					Search
					<img src="assets/images/icons/search.png" class="icon" alt="Search">
				</span>
			</div>

		</div>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music</span>
			</div>



			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName() ?></span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="logout()" class="navItemLink">Logout</span>
			</div>
			<!-- <div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('admin.php')" class="navItemLink">Add Song</span>
			</div> -->

			<?php if($userLoggedIn->isAdmin()) : ?>
				<div class="navItem">
					<span role="link" tabindex="0" onclick="openPage('admin.php')" class="navItemLink">Add Song</span>
				</div>
			<?php endif; ?>
			
			
		</div>




	</nav>
</div>