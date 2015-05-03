<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 4/9/15
 * Time: 1:01 PM
 */
$login = false;
require 'format.inc.php';
require 'lib/game.inc.php';
?>
<!Doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Super Sudoku</title>
</head>
<body>
<div class="container">

    <?php echo displayHeader(); ?>

    <h1>New User</h1>

    <div class="loginInput">
        <form method="post" action="post/newuser-post.php">
            <p><input class="name" type="text" name="userid" id="userid" placeholder="Username"></p>
            <p><input class="name" type="text" name="name" id="Name" placeholder="Name"></p>
            <p><input class="name" type="text" name="email" id="email" placeholder="Email"></p>
            <p><input class="name" type="password" name="password1" id="password1" placeholder="Password"></p>
            <p><input class="name" type="password" name="password2" id="password2" placeholder="Confirm Password"></p>
            <p><label for="name">Secret: </label><br><input type="password" name="secret" id="secret"></p>
            <p><input type="submit" id="login" value="Submit"></p>
        </form>
        <?php
        if(isset($_SESSION['newuser-error'])) {
            echo "<p>" . $_SESSION['newuser-error'] . "</p>";
            unset($_SESSION['newuser-error']);
        }
        ?>
    </div>

    <p><a href="login.php">Back to login</a></p>
</div>
</body>
</html>