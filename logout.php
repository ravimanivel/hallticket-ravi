<?php
session_start();
session_destroy();
header("Location: index.php"); // Redirect to the login page or another page after logout
exit();
?>
