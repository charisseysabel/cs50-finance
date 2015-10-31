<?php

    /**
     * config.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Configures pages.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("constants.php");
    require("functions.php");

    // enable sessions
    session_start();

    // require authentication for all pages except /login.php, /logout.php, and /register.php
    if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/logout.php", "/register.php"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    }

?>


<!--
    CONSTANTS.PHP:
    FUNCTIONS.PHP:

    
    

    QUESTIONS: 
    INI_SET: sets the value of a configuration option.
    ERROR_REPORTING: sets which php errors are reported.
    REQUIRE: identical to #include
    SESSION_START: creates a session or resumes the current based on a session identifier 
        passed via a GET or POST request, or cookie.
        To use a named session, call session_name() before session_start()
    IN_ARRAY: checks if a value exists in an array
    $_SERVER: an array containing info such as headers, paths, and script locations.
        PHP_SELF: filename of the currently executing script.
    EMPTY: determines if a variable is empty.



-->