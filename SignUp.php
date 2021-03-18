<html>

<head>
    <meta charset="utf-8">
    <title>BookWrm | Sign Up</title>
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

<body>
    <form id="sign_up" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="center" id="ProfileTable">
            <th colspan="2">Sign Up</th>
                <tr>
                    <td  style="text-align: right;font-weight: bold;">Name: </td>
                    <td ><input id="SignName" type="textbox" placeholder="Name" name="name"/></td>
                </tr>   
                <tr>
                    <td  style="text-align: right;font-weight: bold;">Username: </td>
                    <td ><input id="username" type="textbox" placeholder="username" name="username"/></td>
                </tr> 
                <tr>
                    <td  style="text-align: right;font-weight: bold;">Email: </td>
                    <td><input id="email" type="textbox" name="email" placeholder="username@email.com" /></td>
                </tr>  
                <tr>
                    <td  style="text-align: right;font-weight: bold;">Password: </td>
                    <td><input id="password" type="password" name="password" placeholder="Password" /></td>
                </tr>  
                <tr>
                    <td  style="text-align: right;font-weight: bold;">Confirm Pasword: </td>
                    <td><input id="password2" type="password" placeholder="Password" /></td>
                </tr>  
                <tr>
                    <td  style="text-align: right;font-weight: bold;">Date of Birth: </td>
                    <td><input id="DOB" type="date" name="dob" placeholder="username@email.com" /></td>
                </tr>  
                <tr>
                    <td style="text-align: right;font-weight: bold;">Favorite Genre: </td>
                    <td>
                        <select id="FavoriteGenre" name="Genre" >
                            <option value="Action">Action</option>
                            <option value="Non-Fiction">Non-Fiction</option>
                            <option value="Mystery">Mystery</option>
                        </select> 
                    </td>
                </tr>  
                <br>
                <tr>
                    <td colspan="2" style="text-align: center">Already have an account? <a id="SignLogIn" href="login.html" >Log in</a> now!</td>
                </tr>
                <br>
                <tr>
                    <td colspan="2" style="text-align: center;"><input id="SignUpBtn" type="submit" value="Start Reading!" /></td>
                </tr>
                <br>  
            </table>
        </form>
        <?php 

        include('config.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db_table = "user";

            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $DOB = $_POST['dob'];
            $Genre = $_POST['Genre'];

            $sql = "INSERT INTO " .$db_table. " (name, user_name, user_email, dob, genre, user_password)
                VALUES ('$name','$username','$email','$DOB','$Genre','$password');";

            mysqli_query($connection, $sql);

            header("Location:login.php"); 

            mysqli_close($connection);
        }

        ?>
    </body>
    <script>
        window.onload = function() {
            var boxName = document.getElementById('SignName');
            boxName.focus();
        }
    </script>    
    
<footer>
    <p id="footer">
        <a href="mailto:abc@example.com">
            <b>Contact Us</b>
        </a>
    </p>
</footer>

</html>