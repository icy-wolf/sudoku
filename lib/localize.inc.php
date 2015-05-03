<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/10/15
 * Time: 7:34 PM
 */
/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Site $site) {

    // Set the time zone
    date_default_timezone_set('America/Detroit');

    $site->setEmail('lawre272@cse.msu.edu');
    $site->setRoot('');
    //mysql:host=mysql-user.cse.msu.edu;dbname=lawre272
    //mysql:host=localhost;dbname=lawre272
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=lawre272',
        'lawre272',       // Database user
        'A42278766',     // Database password
        'p2_');            // Table prefix
};