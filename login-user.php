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
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $filepath = "./users/user.json";
       $userFile = fopen($filepath, "r") or die("unable to open file");
       $size = filesize($filepath);
       if ($size > 0) {
           $username = $_POST['username'];
           $password = $_POST['password'];
           $users = json_decode(fread($userFile,$size),true);
           if (array_key_exists($username, $users)) {
               $userResource = fopen("./users/$users[$username]", "r") or die("unable to open user file");
               $resource = json_decode(fread($userResource,filesize("./users/$users[$username]")), true);
               if ($resource['password'] === $password) {
                   header('Location: ./');
                   $_SESSION['user'] = $resource['firstname']." ".$resource['lastname'];
                   $_SESSION['login'] = true;
               } else {
                    $message = "<p style='color: red'>Invalid username or password</p>";
               }

           } else {
               $message = "No user left";
           }
       }
   } 
?>
<div class="login-form">
    <h1>Login</h1>
    <?php
        echo $message;
    ?>
    <div class="form-container">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="uname">Username:</label>
        <input type="text" name="username" placeholder="Enter your username" id="uname">
        <label for="pass">Password:</label>
        <input type="password" name="password" placeholder="Enter your password" id="pass">
        <input type="submit" name="submit" value="Login">
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

