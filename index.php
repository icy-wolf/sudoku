<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 2/14/15
 * Time: 2:29 PM
 */
require 'format.inc.php';
require 'lib/game.inc.php';
header("location: game.php");
$view = new GameView($site, $user, $_REQUEST, $game);
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

        <div class="nameInput">
            <form method="post" action="game-post.php">
                <p><input class="name" type="text" name="name" id="name" placeholder="Name">
                        <input type="submit" value="Start Game"></p>
            </form>
        </div>

        <div class="Submit">
            <form method="post" action="game-post.php">
            <p><input type="submit" value="Cheat Mode" id="cheat" name="cheat"></p>
            </form>
        </div>

    </div>
</body>
</html>