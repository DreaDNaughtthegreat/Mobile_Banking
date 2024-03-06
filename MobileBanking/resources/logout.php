<?php
// Initialize the session
session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['logged_in']);
    session_destroy();
 // take the user back to the index
header('location: ../');
exit;
?>