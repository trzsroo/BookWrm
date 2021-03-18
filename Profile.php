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
    <title>BookWrm | Profile</title>
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
    <table id="ProfileTable" class="center">
        
    <th colspan="2" id="ProfileHeader">Profile Information</th>
        <tr> 
        <td style="text-align: right;font-weight: bold;">
            Name: 
        </td>
        <td id="NamePro">
        <?php echo $row['name']; ?>
        </td>
        </tr>   
            
            <tr>
        <td style="text-align: right;font-weight: bold;">
            Email: 
        </td>
        <td id="EmailePro">
        <?php echo $row['user_email'];  ?>
        </td>
        </tr>  
            
        <tr>
        <td style="text-align: right;font-weight: bold;">
            Date of Birth: 
        </td>
        <td id="BODPro">
        <?php echo $row['dob'];  ?>
        </td>
        </tr>  
            
        <tr>
        <td  style="text-align: right;font-weight: bold;">
            Favorite Genre: 
        </td>
        <td id="GenrePro">
        <?php echo $row['genre'];  ?>
        </td>
        </tr>  
    </table>
    </div>   
        
    
<footer>
    <p id="footer">
        <a href="mailto:abc@example.com">
            <b>Contact Us</b>
        </a>
    </p>
</footer>
<?php mysqli_close($connection); ?>
</html>