<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 2/20/15
 * Time: 4:08 PM
 */

class GameView {
    /**
     * Constructor
     * @param $site The site we are a member of
     * @param $request The $_REQUEST array
     */
    public function __construct(Site $site, User $user=null, $request, Game $game) {
        $users = new Users($site);

        if(!isset($request['i'])){
            $this->user = $user;
        }
        else{
            $this->user = $users->get($request['i']);
            if($this->user === null){
                $this->user = $user;
            }
        }

        $this->game = $game;
    }

    public function getName(){
        return $this->game->getName();
    }

    public function presentBoard(){
        //var_dump($this->game->getSudokuBoard()->getCluesBoard());
        $html = '<div class="puzzle">';
            $html .= '<div class="wrapper">';
                $html .= '<table class="outerTable">';
                    $html .= '<tr>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(1, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(1, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(1, 3).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(2, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(2, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(2, 3).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(3, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(3, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(3, 3).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(1, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(1, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(1, 6).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(2, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(2, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(2, 6).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(3, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(3, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(3, 6).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(1, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(1, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(1, 9).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(2, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(2, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(2, 9).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(3, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(3, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(3, 9).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                   $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(4, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(4, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(4, 3).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(5, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(5, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(5, 3).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(6, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(6, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(6, 3).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(4, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(4, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(4, 6).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(5, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(5, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(5, 6).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(6, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(6, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(6, 6).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(4, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(4, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(4, 9).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(5, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(5, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(5, 9).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(6, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(6, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(6, 9).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                   $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(7, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(7, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(7, 3).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(8, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(8, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(8, 3).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(9, 1).'</td>';
                                    $html .= '<td>'.$this->displayCell(9, 2).'</td>';
                                    $html .= '<td>'.$this->displayCell(9, 3).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(7, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(7, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(7, 6).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(8, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(8, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(8, 6).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(9, 4).'</td>';
                                    $html .= '<td>'.$this->displayCell(9, 5).'</td>';
                                    $html .= '<td>'.$this->displayCell(9, 6).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                          $html .=  '<table class="innerTable">';
                              $html.= '<tr>';

                                    $html .= '<td>'.$this->displayCell(7, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(7, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(7, 9).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(8, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(8, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(8, 9).'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td>'.$this->displayCell(9, 7).'</td>';
                                    $html .= '<td>'.$this->displayCell(9, 8).'</td>';
                                    $html .= '<td>'.$this->displayCell(9, 9).'</td>';

                               $html.= '</tr>';
                           $html .= '</table>';
                        $html .= '</td>';
                   $html .= '</tr>';
               $html .= '</table>';
            $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    public function displayCell($row, $col){
        if($this->game->isClueMode($row-1, $col-1)){
            return '<a class="correct" href="cell.php?r='.$row.'&amp;c='.$col.'&amp;name='.$this->user->getName().'">'.$this->showClues($this->game->getCellClues($row - 1, $col - 1)).'</a>';
        }
        else {
            if ($this->game->getCellValue($row-1, $col-1) == 0){
                return '<a href="cell.php?r='.$row.'&amp;c='.$col.'&amp;name='.$this->user->getName().'">&nbsp;</a>';
            }
            else {
                if($this->game->clueCheck($row-1, $col-1)){
                    return "<p>".$this->game->getCellValue($row-1, $col-1)."</p>";
                }
                else{
                    $val = $this->game->getCellValue($row-1, $col-1);
                    if($this->game->isValueCorrect($val, $row-1, $col-1)){
                        return '<a class="correct" href="cell.php?r='.$row.'&amp;c='.$col.'&amp;name='.$this->user->getName().'">'.$val.'</a>';
                    }
                    else{
                        return '<a class="incorrect" href="cell.php?r='.$row.'&amp;c='.$col.'&amp;name='.$this->user->getName().'">'.$val.'</a>';
                    }
                }
            }
        }
    }

    public function displayNumClues(){
       return '<p id="clues">You entered '.$this->game->getNumberOfInputs().' clues to solve this puzzle!</p>';
    }

    public function showClues($clues){

        $html = '<table class="clues">';
            $html .= '<tr>';
                $html .= '<td>';
                    if(isset($clues[0])){
                        $html .= $clues[0];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';

                $html .= '<td>';
                    if(isset($clues[1])){
                        $html .= $clues[1];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';

                $html .= '<td>';
                    if(isset($clues[2])){
                        $html .= $clues[2];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
                $html .= '<td>';
                    if(isset($clues[3])){
                        $html .= $clues[3];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';

                $html .= '<td>';
                    if(isset($clues[4])){
                        $html .= $clues[4];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';

                $html .= '<td>';
                    if(isset($clues[5])){
                        $html .= $clues[5];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
                $html .= '<td>';
                    if(isset($clues[6])){
                        $html .= $clues[6];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';

                $html .= '<td>';
                    if(isset($clues[7])){
                        $html .= $clues[7];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';

                $html .= '<td>';
                    if(isset($clues[8])){
                        $html .= $clues[8];
                    }
                    else{
                        $html .= '&nbsp';
                    }
                $html .= '</td>';
            $html .= '</tr>';


        $html .= '</table>';


        return $html;
    }

    public function displayCellButtons(){
        $row = $_REQUEST['r'];
        $col = $_REQUEST['c'];
        $url = "game-post.php?r=$row&amp;c=$col" . '&amp;name=' . $_REQUEST['name'];

        $html = '<div class="valueInput">';
            $html .= '<form method="post" action="' . $url .'">';
                    $html .= '<p><input type="text" name="value" id="value" placeholder="Value">';
                        $html .= '<input type="submit" value="Submit"></p>';
            $html .= '</form>';

            $html .= '<form method="post" action="' . $url . '">';
                    $html .= '<p><input type="text" name="guess" id="guess" placeholder="Input Guess">';
                        $html .= '<input type="submit" value="Submit"></p>';
            $html .= '</form>';

            $html .= '<form method="post" action="' . $url . '">';
                    $html .= '<p><input type="text" name="delete" id="delete" placeholder="Delete Guess">';
                        $html .= '<input type="submit" value="Submit"></p>';
            $html .= '</form>';
        $html .= '</div>';

        return $html;
    }

    public function presentSolution(){
        $html = '<div class="puzzle">';
            $html .= '<div class="wrapper">';
                $html .= '<table class="outerTable">';
                    $html .= '<tr>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(1, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(1, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(1, 3).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(2, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(2, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(2, 3).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(3, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(3, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(3, 3).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(1, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(1, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(1, 6).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(2, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(2, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(2, 6).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(3, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(3, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(3, 6).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(1, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(1, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(1, 9).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(2, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(2, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(2, 9).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(3, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(3, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(3, 9).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(4, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(4, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(4, 3).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(5, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(5, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(5, 3).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(6, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(6, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(6, 3).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(4, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(4, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(4, 6).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(5, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(5, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(5, 6).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(6, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(6, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(6, 6).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(4, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(4, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(4, 9).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(5, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(5, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(5, 9).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(6, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(6, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(6, 9).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(7, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(7, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(7, 3).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(8, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(8, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(8, 3).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(9, 1).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(9, 2).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(9, 3).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(7, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(7, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(7, 6).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(8, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(8, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(8, 6).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(9, 4).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(9, 5).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(9, 6).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                        $html .= '<td>';
                            $html .=  '<table class="innerTable">';
                                $html.= '<tr>';

                                    $html .= '<td><p>'.$this->displayValue(7, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(7, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(7, 9).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(8, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(8, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(8, 9).'</p></td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td><p>'.$this->displayValue(9, 7).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(9, 8).'</p></td>';
                                    $html .= '<td><p>'.$this->displayValue(9, 9).'</p></td>';

                                $html.= '</tr>';
                            $html .= '</table>';
                        $html .= '</td>';
                    $html .= '</tr>';
                $html .= '</table>';
            $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    public function displayValue($row, $column){
        return $this->game->getSolutionValue($row-1, $column-1);
    }

    public function getUserName(){
        return $this->user->getName();
    }



    private $game;
    private $user;
}
?>