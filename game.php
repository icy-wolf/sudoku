<?php
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new GameView($site, $user, $_REQUEST, $game);
$name = $view->getUserName();
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

        <h2>Welcome <?php echo $name?>!</h2>
        <p id="logout"><a href="post/logout-post.php">Log out</a></p>

        <?php echo $view->presentBoard(); ?>

        <div class="newSubmit">
            <div class="lgs">
                <?php
                    if($name != "player"){
                        echo '<form class="load" method="post" action="post/load-post.php?name='.$name.'>">';
                        echo '<p><input type="submit" value="Load Game" id="giveup"  name="load"></p>';
                        echo '</form>';
                    }
                ?>
                <form method="post" action="game-post.php?name=<?php echo $name; ?>">
                    <p><input type="submit" value="Give Up" id="giveup" name="giveup"></p>
                </form>
                <?php
                    if($name != "player"){
                        echo '<form method="post" action="post/save-post.php?name='.$name.'>">';
                        echo '<p><input type="submit" value="Save Game" id="giveup"  name="save"></p>';
                        echo '</form>';
                    }
                ?>
            </div>
            <form method="post" action="post/cheat-post.php?name=<?php echo $name; ?>">
                <p><input type="submit" value="Cheat Mode" id="giveup" name="cheat"></p>
            </form>
        </div>
    </div>
</body>
</html>