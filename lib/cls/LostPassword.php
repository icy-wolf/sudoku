<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/29/15
 * Time: 9:31 PM
 */

class LostPassword extends Table{

    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "lostpw");
    }

    /**
     * Create a new user.
     * @param $userid New user ID
     * @param $name New user name
     * @param $email User email address
     * @param $password1 The new password
     * @param $password2 The new password second copy
     * @param Email $mailer An Email object we will use to send email
     * @returns Error message or null if no error
     */
    public function newPass($email, $password1, $password2, Email $mailer) {
        // Ensure the passwords are valid and equal
        if(strlen($password1) < 8) {
            return "Passwords must be at least 8 characters long";
        }

        if($password1 !== $password2) {
            return "Passwords are not equal";
        }

        // Ensure the email address exists
        $users = new Users($this->site);
        if(!($users->exists($email))) {
            return "Email address does not exist";
        }

        // Create a validator key
        $validator = $this->createValidator();

        // Create salt and encrypted password
        $salt = self::random_salt();
        $hash = hash("sha256", $password1 . $salt);

        //Find the id of the user with this email address
        $query = <<<SQL
SELECT id FROM $users->tableName
WHERE email=?
SQL;
        $statement = $this->pdo()->prepare($query);
        $statement->execute(array($email));

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $user = $users->get($row['id']);
        $userid = $user->getId();
        $name = $user->getName();

        // Add a record to the lostpw table
        $sql = <<<SQL
REPLACE INTO $this->tableName(userid, password, salt, validator)
values(?, ?, ?, ?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userid, $hash, $salt, $validator));

        // Send email with the validator in it
        $link = "sub.icywolf.me"  . $this->site->getRoot() . '/lostpw-validate.php?v=' . $validator;

        $from = $this->site->getEmail();

        $subject = "Lost Password";
        $message = <<<MSG
<html>
<p>Greetings from Sudoku, $name,</p>

<p>We see you have submitted a new password request. If you did not do this, please ignore
this email. To confirm this request please click on the link below:</p>

<p><a href="$link">$link</a></p>
</html>
MSG;
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso=8859-1\r\nFrom: $from\r\n";
        $mailer->mail($email, $subject, $message, $headers);

    }

    /**
     * @brief Generate a random validator string of characters
     * @param $len Length to generate, default is 32
     * @returns Validator string
     */
    private function createValidator($len = 32) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }

    /**
     * @brief Generate a random salt string of characters for password salting
     * @param $len Length to generate, default is 16
     * @returns Salt string
     */
    public static function random_salt($len = 16) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789`~!@#$%^&*()-=_+';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }

    /**
     * Get a new password record, removing it when we are done.
     * @param $validator The validator string
     * @returns Array with key for each column or null if the validator does not exist.
     */
    public function removeNewPass($validator){
        $sql=<<<SQL
SELECT *
FROM $this->tableName
WHERE validator=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($validator));
        if($statement->rowCount() === 0) {
            return null;
        }

        $newpass = $statement->fetch(PDO::FETCH_ASSOC);

        $sql=<<<SQL
DELETE FROM $this->tableName
WHERE validator=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($validator));

        return $newpass;
    }
}