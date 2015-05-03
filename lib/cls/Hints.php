<?php
/**
 * Created by PhpStorm.
 * User: Joseph Norwood
 * Date: 4/20/2015
 * Time: 12:56 PM
 */
class Hints extends Table {

    public function __construct(Site $site){
        parent::__construct($site, "hints");
    }

    public function addHints($userid, $row, $col, $hints){
        $sql =<<<SQL
REPLACE INTO $this->tableName
VALUES (?, ?, ?, ?);
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid, $row, $col, $hints));
    }

    public function getHints($userid){
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

        $result = array();
        $retary = array();

        foreach($statement as $row){
            $result['row'] = $row['row'];
            $result['col'] = $row['column'];
            $result['hints'] = $row['hints'];

            $retary[] = $result;
        }


        return $retary;
    }

    public function deleteHints($userid){
        $sql =<<<SQL
DELETE FROM $this->tableName
WHERE Userid = ?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));

    }
}