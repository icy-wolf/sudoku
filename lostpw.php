<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 4/9/15
 * Time: 1:01 PM
 */
require 'format.inc.php';
$login = false;
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

    <h1>New Password</h1>

    <div class="loginInput">
        <form method="post" action="post/lostpw-post.php">
            <p><input type="password" name="password1" id="password1" placeholder="New Password"></p>
            <p><input type="password" name="password2" id="password2" placeholder="Confirm Password"></p>
            <p><input type="text" name="email" id="Email" placeholder="Email"></p>
            <p><input type="submit" value="Submit"></p>
        </form>
        <?php
        if(isset($_SESSION['newuser-error'])) {
            echo "<p>" . $_SESSION['newuser-error'] . "</p>";
            unset($_SESSION['newuser-error']);
        }
        ?>
    </div>

    <div id="lostpw">
        <p><a href="login.php">Back to login</a></p>
    </div>
</div>
</body>
</html>