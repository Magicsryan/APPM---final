<?php
session_start();

include 'koneksi.php';

// Get the user's NIK from the session
if (isset($_SESSION['nik'])) {
    $nik = $_SESSION['nik'];

    // Clear the session_id in the database
    $update_sql = "UPDATE masyarakat SET session_id=NULL WHERE nik='$nik'";
    mysqli_query($koneksi, $update_sql);
}

// Clear session data
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Clear cookies if they exist
if (isset($_COOKIE['nik'])) {
    setcookie('nik', '', time() - 3600, "/"); // Clear the NIK cookie
}
if (isset($_COOKIE['password'])) {
    setcookie('password', '', time() - 3600, "/"); // Clear the password cookie
}

// Redirect to the login page
header("location: index.php");
exit();
