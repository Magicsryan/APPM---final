<?php
session_start();
session_unset();
session_destroy();

// Hapus cookie
setcookie('username', '', time() - 3600, "/");
setcookie('password', '', time() - 3600, "/");

header("Location: ../index2.php");
exit();
