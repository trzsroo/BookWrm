<html>
<?php include('session.php'); ?>
<head>
    <meta charset="utf-8">
    <title>BookWrm | Reset Password</title>
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
<?php
function getCurrPW()
{
    $value = "";
    if (isset($_POST['oldPassword'])) {
        $value = $_POST['oldPassword'];
    }
    return $value;
}

function getNewPW()
{
    $value2 = "";
    if (isset($_POST['newPassword'])) {
        $value2 = $_POST['newPassword'];
    }
    return $value2;
}

function getConfirmPW() {
    $value3 = "";
    if (isset($_POST['confirmPassword'])) {
        $value3 = $_POST['confirmPassword'];
    }
    return $value3;
}
?>
<div id="SideNav" >

    <ul>
        <li><a href="Profile.php">Profile</a></li>
        <br>
        <li><a href="EditProfile.php">Edit information</a></li>
        <br>
        <li><a href="EditProfile.php">Reset Password</a></li>
        <br>
        <li><a href="Bookshelf.php">Bookshelf</a></li>
        <br>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

    <form id="changepasswordform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="center" id="ProfileTable">
            <th colspan="2">Change Password</th>
            <tr>
                <td style="text-align:right"><label for="OriginalPassword"><strong>Current Password:</strong></label></td>
                <td><input type="password" id="OriginalPassword"  name="oldPassword"><br></td>
            </tr>
            <tr>
                <td style="text-align:right"><label for="NewlPassword"><strong>New Password:</strong></label></td>
                <td><input type="password" id="NewPassword"  name="newPassword"><br></td>
            </tr>
            <tr>
                <td style="text-align:right"><label for="ConfirmPassword"><strong>Confrim Password:</strong></label></td>
                <td><input type="password" id="ConfirmPassword" name="confirmPassword"></td><br><br>
            </tr>
            <tr>
                <td colspan="2" Style="text-align: center"><input type="submit" value="Change Password"></td>
            </tr>
        </table>
    </form> 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currPW = getCurrPW();
    $newPW = getNewPW();
    $confirmPW = getConfirmPW();
    $db_table = 'user';
    $PW = "";
    $error = "";
    if (!empty($currPW) && !empty($newPW) && !empty($confirmPW)) {
        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p>" . $error;
            exit($output);
        } else {
            $sql = "SELECT * FROM " . $db_table . " WHERE user_name='" . $_SESSION['username'] . "'";
            if ($result = mysqli_query($connection, $sql)) {
                $row = $result->fetch_assoc();
                $PW = $row['user_password'];
                if ($PW == $currPW) {
                    if($newPW == $confirmPW) {
                        $sql = "UPDATE " .$db_table. " SET 
                            user_password = '".$newPW."' WHERE user_name='".$_SESSION["username"]."';";
                        mysqli_query($connection,$sql);
                    } else {
                        $error = "The new password does not match the confirmed password.";
                        echo "<table class='center'><tr><td colspan='2' style='color: red'>".$error."</td></tr></table>";
                    }
                } else {
                    $error = "Current password typed in does not match the current password for this user.";
                    echo "<table class='center'><tr><td colspan='2' style='color: red'>".$error."</td></tr></table>";
                }
            }
        }
    } else {
        $error = "All textboxes need to be filled in.";
        echo "<table class='center'><tr><td colspan='2' style='color: red'>".$error."</td></tr></table>";
    } 

    
    mysqli_close($connection);
}
?>
   <script>
        window.onload = function() {
            var boxName = document.getElementById('OriginalPassword');
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