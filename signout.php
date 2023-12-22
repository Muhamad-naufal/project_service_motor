<?php
session_start();

function logout()
{
    // Destroy all session data
    session_destroy();

    // Redirect to the login page
    header("Location: index.php");
    exit;
}

logout();
