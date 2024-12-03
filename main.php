<?php
if(isset($_POST["btn"])){
    // Get the uploaded file details
    $file = $_FILES["filename"]["name"];
    $temp_name = $_FILES["filename"]["tmp_name"];
    $img = "images/";  // Directory to store the uploaded file
    $file_size = $_FILES["filename"]["size"];
    $kb = $file_size / 1024; // Convert file size to KB

    // Check if file size exceeds 500KB
    if($kb > 200){
        echo "File is too large";
    } else {
        // Move the uploaded file to the specified directory
        move_uploaded_file($temp_name, $img . $file);
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <!-- Upload form -->
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="filename"><br>
        <input type="submit" name="btn" value="Upload">
    </form>
</body>
</html>

<?php
// Display the uploaded image if file exists
if(isset($file) && $file != ""){
    echo "<img src='" . $img . $file . "' alt='' width='400'>";
}
?>
