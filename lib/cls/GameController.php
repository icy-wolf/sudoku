<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 2/20/15
 * Time: 4:08 PM
 */

class GameController {

    /**
     * Constructor
     * @param Game $game The Game object
     * @param $request The $_REQUEST array
     */
    public function __construct(Game $game, $request) {
        $this->game = $game;
        if(isset($request['value'])) {
            //update cell with new val
            if($this->game->inputValue($request['value'], $request['r'] - 1, $request['c'] - 1)) {
                $numMoves = $this->game->getNumberOfInputs();
                $this->page = 'win.php?num=' . $numMoves . '&name=' . $request['name'];
            }
            else{
                $this->page = 'game.php?name=' . $request['name'];
            }
        } else if(isset($request['guess'])) {
            //update cell with new key
            if ($request['guess'] >= 1 && $request['guess'] <= 9){
                $this->game->inputClue($request['guess'], $request['r'] - 1, $request['c'] - 1);
            }
            $this->page = 'game.php?name=' . $request['name'];
        }
        else if(isset($request['delete'])) {
            //update cell with new key
            $this->game->deleteClue($request['delete'], $request['r'] - 1, $request['c'] - 1);
            $this->page = 'game.php?name=' . $request['name'];
        } else if(isset($request['giveup'])){
            $this->page = 'lose.php?name=' . $request['name'];
            unset($request['giveup']);
        } else if(isset($request['new'])){
            $this->page = 'game.php?name=' . $request['name'];
            $this->reset = true;
        } else if(isset($request['name'])){
            $this->page = 'game.php?name=' . $request['name'];
            $this->reset = true;
        } else if(isset($request['cheat'])){
            $this->cheatMode = true;
            $this->page = 'game.php';
        }
    }

    public function isReset(){
        return $this->reset;
    }

    public function getPage(){
        return $this->page;
    }

    public function isCheatMode(){
        return $this->cheatMode;
    }

    private $game;                // The game object we are controlling
    private $page = 'game.php';     // The next page we will go to
    private $reset = false;         // True if we need to reset the game
    private $cheatMode = false;    //True is cheat mode is activated
}