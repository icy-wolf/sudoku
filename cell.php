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
    <title>Super Sudoku</title>
</head>
<body>
    <div class="container">

        <?php echo displayHeader(); ?>

        <?php echo $view->displayCellButtons(); ?>
    </div>
</body>
</html>