<?php
/*  Author:         Samuel Wilde
    Date :          05/09/2020
    Description:    Functions module for maintenance scripts
*/
    function checkSession($sessionName){
    //Input:        $sessionName is unique name for this app's session
    //processing:   start or continue a session
    //Output:       none
    
        session_name($sessionName);
        session_start();
        print_r($_SESSION);
            if (!isset($_SESSION['username']))
            {
                echo "<h1>You are not authorized to access this page</h1>";
                echo "<p>$message ";
                echo"<a href='maintenanceLogin.html'>Try Again</a></p>\n";
                require("htmlFoot.inc");
                die();   
        }// end !ISSET SESSION
    } //end CHECKSESSION()
    
    function addLoginInfo($username, $password)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        console.log($username);
        console.log($password);
    }
    
?>