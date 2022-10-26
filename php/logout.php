<?php

session_start();

function logout(){
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
    if (isset($_SESSION["username"])) {
        session_destroy();
        header("Location: ../forms/login.html");
    }
}
logout();
//echo "HANDLE THIS PAGE";
