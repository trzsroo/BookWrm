<html>
<?php include('session.php'); ?>
<head>
    <meta charset="utf-8">
    <title>BookWrm | Bookshelf</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="icon.PNG">
</head>


<nav id="navbar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="genre.php">Genre</a></li>
        <?php 
        if(empty($_SESSION['username'])) {
            echo "<li><a href='login.php'>Login</a></li>";
        } else { 
            echo "<li class='dropdown'><button class='dropdownbutton' onclick=\"window.location.href='Profile.php';\">Profile</button><div class='dropdown-content' style='right: 0;'>
                        <a href='Editprofile.php'>Edit Profile</a>
                        <a href='ResetPassword.php'>Reset Password</a>
                        <a href='Bookshelf.php'>Bookshelf</a>
                        <a href='logout.php'>Logout</a>
                    </div></li>"; }?>
    </ul>
</nav>
<br>
<br>

<div id="SideNav" >
    <ul>
        <li><a href="Profile.php">Profile</a></li>
        <br>
        <li><a href="EditProfile.php">Edit information</a></li>
        <br>
        <li><a href="ResetPassword.php">Reset Password</a></li>
        <br>
        <li><a href="Bookshelf.php">Bookshelf</a></li>
        <br>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>


<h2 style="text-align: center">Bookshelf</h2>
<p style="text-align: center;">&#x26A0 This page is currently under construction! &#x26A0</p>
    
<footer>
    <p id="footer">
        <a href="mailto:abc@example.com">
            <b>Contact Us</b>
        </a>
    </p>
</footer>

</html>