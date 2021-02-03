<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Market</title>
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <?php
    echo $_SERVER['PHP_SELF'];
    if ($_SERVER['PHP_SELF'] == '/market/register-user.php' || $_SERVER['PHP_SELF'] == '/market/login-user.php') {
        ?>
        <link rel="stylesheet" href="css/register.css">
    <?php
    }
    ?>
</head>
<body>
    <header class="wrapper-full">
        <div class="wrapper header-menu-container">
            <nav class="header-menu">
                <a class="logo" href="#">
                    <img src="img/logo.png" class="img" alt="logo">
                </a>
                <form action="#" class="search-form">
                    <input type="text" placeholder="Search ">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <ul class="menu-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="register-user.php">Register</a></li>
                    <li><a href="#">Theme</a></li>
                    <li>
                        <?php
                        if ($_SESSION['login']) {
                            echo '<a href="index.php?logout=yes">Logout</a>';
                        } else {
                            echo '<a href="login-user.php">Login</a>';
                        }
                        ?>
                        
                    </li>
                    <li>
                        <span class="user-logo">
                            <img class="img" src="img/user-logo.jpg" alt="logo">
                            <div class="user-info">
                                
                            </div>
                        </span>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="clr"></div>
    </header>
<!-- header end -->