<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 2/14/15
 * Time: 2:29 PM
 */
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new GameView($site, $user, $_REQUEST, $game);
?>
<!Doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Sudoku Solution</title>
</head>
<body>
    <div class="container">
        <?php echo displayHeader(); ?>
        <h2>Here is the solution</h2>
        <?php echo $view->presentSolution(); ?>
        <div class="newSubmit">
            <form method="post" action="game-post.php?name=<?php echo $_REQUEST['name']; ?>">
                <p><input type="submit" value="New Game" id="new" name="new"></p>
            </form>
        </div>
    </div>
</body>
</html>