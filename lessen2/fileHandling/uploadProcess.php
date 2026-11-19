<?php
session_start();

/**
 * Store an error message in session and redirect back to the upload form.
 */
function redirectWithError(string $message): never
{
    $_SESSION['upload_error'] = $message;
    header('Location: uploadForm.php');
    exit;
}

/**
 * Convert PHP file upload error codes into human-readable messages.
 */
function getUploadErrorMessage(int $errorCode): string
{
    return match ($errorCode) {
        UPLOAD_ERR_INI_SIZE   => 'File exceeds the upload_max_filesize limit in php.ini.',
        UPLOAD_ERR_FORM_SIZE  => 'File exceeds the MAX_FILE_SIZE limit specified in the form.',
        UPLOAD_ERR_PARTIAL    => 'The file was only partially uploaded.',
        UPLOAD_ERR_NO_FILE    => 'Please select a photo before submitting.',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder on the server.',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
        UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the file upload.',
        default               => 'Unknown upload error occurred.',
    };
}

// 1. Ensure the request came from a POST form submission
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: uploadForm.php');
    exit;
}

// 2. Check that the file field exists in $_FILES
if (!isset($_FILES['photo'])) {
    redirectWithError('No file received. Ensure enctype="multipart/form-data" is set and file size is within server limits.');
}

$file  = $_FILES['photo'];
$title = trim($_POST['title'] ?? '');

// 3. Check for PHP upload errors
if ($file['error'] !== UPLOAD_ERR_OK) {
    redirectWithError(getUploadErrorMessage($file['error']));
}

// 4. Verify the file was genuinely uploaded via HTTP POST
if (!is_uploaded_file($file['tmp_name'])) {
    redirectWithError('Invalid file upload attempt.');
}

// 5. Validate file size (max 2MB)
$maxSize = 2 * 1024 * 1024;
if ($file['size'] > $maxSize) {
    redirectWithError('Photo is too large. Maximum allowed size is 2MB.');
}

// 6. Validate file extension
$originalName      = basename($file['name']);
$extension         = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

if (!in_array($extension, $allowedExtensions, true)) {
    redirectWithError('Invalid file extension. Only JPG, JPEG, PNG, GIF, and WEBP are allowed.');
}

// 7. Validate real MIME type using finfo class (OOP method: $finfo->file())
$finfo             = new finfo(FILEINFO_MIME_TYPE);
$mimeType          = $finfo->file($file['tmp_name']);
$allowedMimeTypes  = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

if (!in_array($mimeType, $allowedMimeTypes, true)) {
    redirectWithError('File content does not match a valid image type.');
}

// 8. Verify image structure and get image dimensions (width & height)
$imageInfo = @getimagesize($file['tmp_name']);
if ($imageInfo === false) {
    redirectWithError('The uploaded file is not a valid image.');
}

// 9. Create the "uploads" folder if it does not exist yet
$uploadDir = __DIR__ . '/uploads';
if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
    redirectWithError('Could not create uploads directory.');
}

// 10. Generate a unique filename so existing files are never overwritten
$newFileName  = uniqid('photo_', true) . '.' . $extension;
$destination  = $uploadDir . '/' . $newFileName;
$relativePath = 'uploads/' . $newFileName;

// 11. Move the file from PHP temporary folder to our uploads/ folder
if (!move_uploaded_file($file['tmp_name'], $destination)) {
    redirectWithError('Failed to move uploaded photo to the destination folder.');
}

// 12. Save photo details in session so showPhoto.php can display it
$_SESSION['uploaded_photo'] = [
    'title'         => $title !== '' ? $title : 'Untitled Photo',
    'original_name' => $originalName,
    'saved_name'    => $newFileName,
    'path'          => $relativePath,
    'size_bytes'    => $file['size'],
    'mime_type'     => $mimeType,
    'width'         => $imageInfo[0],
    'height'        => $imageInfo[1],
    'uploaded_at'   => date('Y-m-d H:i:s'),
];

// 13. Redirect to showPhoto.php to display the uploaded photo
header('Location: showPhoto.php');
exit;

