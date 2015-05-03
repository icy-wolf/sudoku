<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/27/15
 * Time: 10:38 PM
 */

class Email {
    public function mail($to, $subject, $message, $headers) {
        mail($to, $subject, $message, $headers);
    }
}