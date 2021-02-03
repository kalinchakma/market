<?php
declare(strict_types = 1);
require_once('functions/functions.php');
getHeader();
?>
<?php
    if(isset($_SESSION["user"])){
        echo "welcome ".$_SESSION["user"];
        if (isset($_GET['logout'])) {
            $_SESSION['user']  = null;
            $_SESSION['login'] = false;
            header('Location: index.php');
        } 
    } 
?>
<!-- body start -->
<!-- banner-section -->
<section class="wrapper-full banner-section">
<div style="height: 10vh;width: 100%"></div>
<!-- #1 -->
    <p>Content not avaiavle in this site</p>
<!-- #! -->
<div class="clr"></div>
</section>
<!-- test banner -->
<!-- body end -->
<?php
getFooter();

?>

