<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 4/18/2015
 * Time: 11:51 AM
 */

class Games extends Table {

    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "game");
    }

    /**
     * add a new sudoku game record to Game table function
     * @param $site The Site object
     */
    public function add_game($userid, $puzzleNum, $playerPuzzle){
        //insert a new row and delete the old one for that user if it exists
        $sql =<<<SQL
REPLACE INTO $this->tableName
VALUES (?, ?, ?);
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid, $puzzleNum, $playerPuzzle));

    }



    public function save_game($userid, $puzzleNum, $playerPuzzle){
        $sql =<<<SQL
UPDATE  $this->tableName
SET playerPuzzle = ?
where Userid = ? AND puzzleNum = ?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($playerPuzzle, $userid, $puzzleNum));

        //if there is no row with matching userid/puzzleNum, then call add_game()
        if($statement->rowCount() === 0) {
            $this->add_game($userid, $puzzleNum, $playerPuzzle);
        }
    }


    public function load_game($userid){
        $sql =<<<SQL
SELECT * FROM  $this->tableName
WHERE Userid = ?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));
        if($statement->rowCount() === 0) {
            return null;
        }

        $result = array();  // Empty initial array


        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $result['Userid'] = $row['Userid'];
        $result['puzzleNum'] = $row['puzzleNum'];
        $result['playerPuzzle'] = $row['playerPuzzle'];

        return $result;
    }

}