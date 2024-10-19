<?php
session_start();

include 'koneksi.php';

$nik = $_POST['nik'];
$password = $_POST['password'];
$remember = isset($_POST['remember']); // Check if "Remember Me" is checked

// Generate a unique session ID for the current login attempt
$session_id = session_id();

// Search user based on NIK
$sql = "SELECT * FROM masyarakat WHERE nik='$nik'";
$query = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);

    // Check if the user is already logged in by verifying the session_id in the database
    if (!empty($data['session_id'])) {
        echo "<script>alert('Anda sudah login di perangkat lain. Silakan logout terlebih dahulu.'); window.location.assign('index.php');</script>";
        exit();
    }

    // Verify the entered password with the hash in the database
    if (password_verify($password, $data['password'])) {
        // Store session data
        $_SESSION['nik'] = $nik;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];

        // Update the session_id in the database to lock the session
        $update_sql = "UPDATE masyarakat SET session_id='$session_id' WHERE nik='$nik'";
        mysqli_query($koneksi, $update_sql);

        // Set a cookie for "Remember Me" functionality
        if ($remember) {
            // Set a cookie for 30 days
            setcookie('nik', $nik, time() + (30 * 24 * 60 * 60), "/"); // Adjust path as necessary
            setcookie('password', $data['password'], time() + (30 * 24 * 60 * 60), "/"); // Optional: store hashed password
        } else {
            // Clear the cookies if "Remember Me" is not checked
            if (isset($_COOKIE['nik'])) {
                setcookie('nik', '', time() - 3600, "/");
            }
            if (isset($_COOKIE['password'])) {
                setcookie('password', '', time() - 3600, "/");
            }
        }

        // Redirect user to masyarakat.php
        header("location: masyarakat.php");
    } else {
        echo "<script>alert('Password salah, coba lagi.'); window.location.assign('index.php');</script>";
    }
} else {
    echo "<script>alert('NIK tidak ditemukan.'); window.location.assign('index.php');</script>";
}
