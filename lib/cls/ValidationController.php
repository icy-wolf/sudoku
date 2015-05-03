<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/28/15
 * Time: 8:05 PM
 */

class ValidationController {
    /**
     * Constructor
     * @param Site $site The site object
     */
    public function __construct(Site $site) {
        $this->site = $site;
    }

    /**
     * Validate a user
     * @param $validator The validator string
     * @return null or an error message
     */
    public function validate($validator) {
        $users = new Users($this->site);
        $nu = new NewUsers($this->site);

        $user = $nu->removeNewUser($validator);
        if($user === null) {
            return "Invalid validator";
        }

        $users->add($user);
        return null;
    }

    /**
     * Validate a password
     * @param $validator The validator string
     * @return null or an error message
     */
    public function validatePassword($validator) {
        $users = new Users($this->site);
        $lpw = new LostPassword(($this->site));

        $lostpass = $lpw->removeNewPass($validator);
        if($lostpass === null) {
            return "Invalid validator";
        }

        $users->updatePass($lostpass);
        return null;
    }

    private $site;
}