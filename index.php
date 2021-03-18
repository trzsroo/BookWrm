<html>
<?php 
include('config.php');
session_start();
?>
<head>
    <meta charset="utf-8">
    <title>BookWrm | Welcome</title>    
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Book+Basic:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style.css">
    <link rel="icon" href="icon.PNG">
</head>

<nav id="navbar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="genre.php">Genre</a></li>
        <?php 
        if(empty($_SESSION['username'])) {
            //if not on index of login page, instead echo:
            //"<li><a href='login.php'>Login</a></li>"
            echo "<li><a href='SignUp.php'>Sign Up</a></li>"; 
        } else { 
            echo "<li class='dropdown'><button class='dropdownbutton' onclick=\"window.location.href='Profile.php';\">Profile</button><div class='dropdown-content' style='right: 0;'>
                        <a href='Editprofile.php'>Edit Profile</a>
                        <a href='ResetPassword.php'>Reset Password</a>
                        <a href='Bookshelf.php'>Bookshelf</a>
                        <a href='logout.php'>Logout</a>
                    </div></li>"; }?>
    </ul>
</nav>

<body>
    <img src="book-welcome.jpg" id="welcome">
    <p>
        <b>Our Mission: </b>
        <br /><br />
        &emsp;As children, it is stressed to many of us about how important to is to read. However, as time continues, we seem
        to get busier and busier. By our 20s into our mid-30s, the amount of reading done per day is about less than one
        hour. Our mission is to create a platform to encourage a love for reading as an adult in a interactive way.
        BookWrm is created to help readers collaborate and think deeper about each book from the comfort of
        your own home.
        <br /><br />
        <b>About: </b>
        <br /><br />
        &emsp;Book clubs are divided into genres. Each genre has a book the group is currently reading. For each book, there is the current progression of the book club, a brief description of the book, links to find the book, and a place to ask questions about the book.
        <br />
        &emsp;Each book has a three week timeline. After the first week, there's a first half of the book check-in. Then a second half of the book checkin in at the end of week two. At the end of week three, there is a video conference call to discuss the book as a whole.
    </p>
    <p style="text-align: center;">
        <br />
        <b>Want to know more? Please sign up and/or login to explore!</b>
        <br /><i>Contact us with any additional questions.</i>
    </p>
    <table class="center">
        <tr>
            <td><p class="signUpTxt"><b>Want to sign up?</b></p></td>
            <td><p class="loginTxt"><b>Already a member?</b></p></td>
        </tr>
        <tr>
            <td>
                <form action="SignUp.php">
                    <input id="signUp" type="submit" value="Sign Up">
                </form>
            </td>
            <td>
                <form action="login.php">
                    <input id="login" type="submit" value="Login">
                </form>
            </td>
        </tr>
    </table>
</body>

<footer>
    <p id="footer">
        <a href="mailto:abc@example.com">
            <b>Contact Us</b>
        </a>
    </p>
</footer>

</html>