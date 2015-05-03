<?php

/**
 * Manage users in our system.
 */
class Users extends Table {

    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "user");
    }

    /**
     * Test for a valid login.
     * @param $user User id or email
     * @param $password Password credential
     * @returns User object if successful, null otherwise.
     */
    public function login($user, $password) {
        $sql =<<<SQL
SELECT * from $this->tableName
where userid=? or email=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($user, $user));
        if($statement->rowCount() === 0) {
            return null;
        }

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        // Get the encrypted password and salt from the record
        $hash = $row['password'];
        $salt = $row['salt'];

        // Ensure it is correct
        if($hash !== hash("sha256", $password . $salt)) {
            return null;
        }

        return new User($row);
    }

    /**
     * Get a user based on the id
     * @param $id ID of the user
     * @returns User object if successful, null otherwise.
     */
    public function get($id) {
        $sql =<<<SQL
SELECT * from $this->tableName
where id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new User($statement->fetch(PDO::FETCH_ASSOC));
    }

    public function getGuest($user){
        $sql =<<<SQL
SELECT * from $this->tableName
where userid=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($user));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new User($statement->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * Determine if a user exists in the system.
     * @param $user A user ID or a email address.
     * @returns true if $user is an existing user ID or email address
     */
    public function exists($user) {
        $sql =<<<SQL
SELECT * from $this->tableName
where userid=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($user));
        if($statement->rowCount() > 0) {
            return true;
        }

        $sql =<<<SQL
SELECT * from $this->tableName
where email=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($user));
        if($statement->rowCount() > 0) {
            return true;
        }

        return false;
    }

    /**
     * Add a user to the site
     * @param $user An array of user information containing keys for:
     * userid, name, email, password, salt, and joined.
     */
    public function add($user) {
        $sql=<<<SQL
INSERT INTO $this->tableName (userid, name, email, password, salt)
VALUES (?,?,?,?,?)
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($user['userid'], $user['name'], $user['email'], $user['password'],
            $user['salt']));

    }

    /**
     * Add a new password for a user
     * @param $lostpass An array of password information containing keys for:
     * userid, password, salt, and validator.
     */
    public function updatePass($lostpass){
        $sql=<<<SQL
UPDATE $this->tableName
SET password=?, salt=?
WHERE id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($lostpass['password'], $lostpass['salt'], $lostpass['userid']));

    }

}