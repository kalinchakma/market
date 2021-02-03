<?php
declare(strict_types = 1);
require_once('functions/functions.php');
getHeader();

?>
<!-- body start -->
<!-- banner-section -->
<section class="wrapper-full banner-section">
<div style="height: 10vh;width: 100%"></div>
<!-- #! -->
<?php
    $message = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['fname']) 
        && isset($_POST['lname']) 
        && isset($_POST['username']) 
        && isset($_POST['password'])) {
            $filepath = './users/user.json';
            $userFile = fopen($filepath, 'r') or die("unable to create user");
            $size = filesize($filepath);
            if ($size !== 0) {
               $filetext = json_decode(fread($userFile, filesize($filepath)), true);
               $username = $_POST['username'];
               $password = $_POST['password'];
               $filetext["$username"] = "$username.json";
               $addTxt = json_encode($filetext);
               $writeFile = fopen($filepath,"w") or die("unable to create user");
               fwrite($writeFile,$addTxt);
            //    create user
               $newuserfile = "./users/$username.json";
               $createuser = fopen($newuserfile, "w") or die("unable to create user file");
               $userResource = [];
               $userResource['password'] = $password;
               $userResource['firstname'] = $_POST['fname'];
               $userResource['lastname'] = $_POST['lname'];
               fwrite($createuser, json_encode($userResource));
               fclose($createuser);
               fclose($writeFile);
               fclose($userFile);
       
           } else if ($size === 0) {
               $userFile = fopen($filepath, 'w') or die('unable to create user');
               $addTxt = [];
               $userResource = [];
               $username = $_POST['username'];
               $pass = $_POST['password'];
               $addTxt["$username"] = "$username.json";
               $userResource['password'] = $pass;
               $userResource['firstname'] = $_POST['fname'];
               $userResource['lastname'] = $_POST['lname'];
               fwrite($userFile,json_encode($addTxt));
               $userfilename = "./users/$username.json";
               $usercreate = fopen($userfilename,'w') or die("unable to create file");
               fwrite($usercreate,json_encode($userResource));
               fclose($userFile);
           }
        }
        $message = "<p>You are register now <a href='login-user.php'>Login</a></p>";
    }
?>
<div class="login-form">
    <h1>Register</h1>
    <?php
        echo $message;
    ?>
    <div class="form-container">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="name">First Name:</label>
        <input type="text" name="fname" placeholder="Enter your first name" id="name">
        <label for="">Last Name:</label>
        <input type="text" name="lname" placeholder="Enter your last name" id="lname">
        <label for="uname">Create Username:</label>
        <input type="text" name="username" placeholder="Create username" id="uname">
        <label for="pass">Create Password:</label>
        <input type="password" name="password" placeholder="Creater password" id="pass">
        <input type="submit" name="submit" value="Register">
    </form>

    
    </div>
  

</div>
<!-- #! -->
<div class="clr"></div>
</section>
<!-- test banner -->
<!-- body end -->
<?php
getFooter();

?>

