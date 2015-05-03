<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 4/9/15
 * Time: 1:01 PM
 */
require 'format.inc.php';
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

        <h1>Login</h1>

        <div class="loginInput">
            <form method="post" action="post/login-post.php">
                <p><input class="name" type="text" name="user" id="user" placeholder="Username or Email"></p>
                <p><input class="name" type="password" name="password" id="password" placeholder="Password"></p>
                <p><input type="submit" id="login" value="Submit"></p>
            </form>
            <form method="post" action="post/loginguest-post.php">
                <p><input type="submit" id="login" value="Guest"></p>
            </form>
        </div>

        <p><a href="newuser.php">New user? Register here.</a></p><br>
        <p><a href="lostpw.php">Forgot your password?</a></p>
    </div>
</body>
</html>