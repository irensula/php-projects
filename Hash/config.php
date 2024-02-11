<?php

// to make users not to steal data from the database


ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1); //to make session id more complicated

// to make cookies more secure
session_set_cookie_params([
    'lifetime' => 1800, //cookies will be destroyed after this time
    'domain' => 'localhost', // name of our website
    'path' => '/', 
    'secure' => true, // only to use https connection
    'httponly' => true 
]);

session_start();

if (!isset($_SESSION['last_regeneration'])) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
} else {
    // to regenerate session id every 30 minutes
    $interval = 60 * 30;

    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
}
