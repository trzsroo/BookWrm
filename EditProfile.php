<html>
<?php 

include('session.php');

$db_table = "user";

$sql = "SELECT * FROM ". $db_table. " WHERE user_name='".$_SESSION["username"]."';";
$result = mysqli_query($connection,$sql);

$error = mysqli_connect_error();

$error;

$row = $result->fetch_assoc();

?>
<head>
    <meta charset="utf-8">
    <title>BookWrm | Edit Profile</title>
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
<br />
<br />

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


    <div id="ProfileDiv">
        <form id="EditProfile" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table id="ProfileTable" class="center">
    <th id="ProfileHeader" colspan="2">Edit Information</th>
        <tr>
        <td style="text-align: right;font-weight: bold;">
           <label>Name: </label> 
        </td>
        <td >
            <input type="text" name="name" value="<?php echo $row['name'];  ?>"  id="NamePro">
        </td>
        </tr>   
            
            <tr>
        <td style="text-align: right;font-weight: bold;">
           <label> Email: </label>
        </td>
        <td >
            <input type="text" name="email" value="<?php echo $row['user_email'];  ?>" id="EmailePro">
        </td>
        </tr>  
            
        <tr>
        <td style="text-align: right;font-weight: bold;">
           <label> Date of Birth: </label>
        </td>
        <td>
            <input type="date"  name="dob" value="<?php echo $row['dob'];  ?>" id="BODPro">
        </td>
        </tr>  
            
        <tr>
        <td  style="text-align: right;font-weight: bold;">
           <label> Favorite Genre: </label>
        </td>
        <td >
            <select id="FavoriteGenre" name="Genre">
                <option value="Action">Action</option>
                <option value="Non-Fiction">Non-Fiction</option>
                <option value="Mystery">Mystery</option>
                <option value="<?php echo $row['genre'];  ?>" selected="selected"><?php echo $row['genre'];  ?></option>
            </select> 
        </td>
        </tr>  
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="submit" value="Change profile">
            </td>
        </tr> 
        </table>

        <script>
        window.onload = function() {
            var boxName = document.getElementById('NamePro');
            boxName.focus();
        }
    </script>     

</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_table = "user";

$name = $_POST['name'];
$email = $_POST['email'];
$DOB = $_POST['dob'];
$Genre = $_POST['Genre'];


$sql = "UPDATE " .$db_table. " SET name = '$name', user_email = '$email',dob = '$DOB',genre = '$Genre' WHERE user_name='".$_SESSION["username"]."';";

mysqli_query($connection,$sql);

header("Location:Profile.php");

mysqli_close($connection);
}
?>
    </div>   
   
    
    
<footer>
    <p id="footer">
        <a href="mailto:abc@example.com">
            <b>Contact Us</b>
        </a>
    </p>
</footer>
<!-- <script>

const EditProfile = document.getElementById("EditProfile");

EditProfile.addEventListener("submit", (e) => {

const name = document.getElementById("NamePro");
const email = document.getElementById("EmailePro");
const dateofbirth = document.getElementById("BODPro");
const genre = document.getElementById("FavoriteGenre");


e.preventDefault();

});


</script> -->
</html>