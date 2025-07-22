<?php
header('Content-Type: application/json'); // Changed to JSON for better handling

// Create uploads directory if it doesn't exist
$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Process the uploaded file
if (isset($_FILES['photo'])) {
    $tempFile = $_FILES['photo']['tmp_name'];
    $fileName = 'beauty_'.time().'.jpg'; // Unique filename
    $targetFile = $uploadDir.$fileName;
    
    if (move_uploaded_file($tempFile, $targetFile)) {
        echo json_encode([
            'success' => true,
            'message' => 'Image saved successfully',
            'filepath' => $targetFile
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Failed to save image'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'No image received'
    ]);
}
?>