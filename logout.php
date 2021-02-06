<?php

session_start();
session_unset();    //To unset the session variables.
session_destroy();   // Destroys current session
header("location: login.php");
?>