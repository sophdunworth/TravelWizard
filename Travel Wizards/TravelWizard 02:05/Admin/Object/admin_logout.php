<?php
session_start();
session_unset();  // Unset all session variables
session_destroy(); // Destroy the session

header("Location: ../BeforeLogin/index1.php");
exit();
