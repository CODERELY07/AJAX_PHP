<?php
// Check if data is received properly and not empty
if (isset($_POST['signature']) && !empty($_POST['signature'])) {
    $folderPath = "upload/";

    // Get the base64 encoded string (remove data:image/png;base64, part)
    $base64_string = $_POST['signature'];
    $base64_string = str_replace('data:image/png;base64,', '', $base64_string);

    // Base64 decoding
    $image_data = base64_decode($base64_string);

    // Generate unique file name with .png extension
    $file = $folderPath . uniqid() . '.png';

    // Check if file already exists and rename if necessary
    while (file_exists($file)) {
        $file = $folderPath . uniqid() . '.png';
    }

    // Save the image
    if (file_put_contents($file, $image_data)) {
        echo "Signature Uploaded Successfully.";
    } else {
        echo "Failed to upload signature.";
    }
} else {
    echo "No signature data received.";
}
?>
