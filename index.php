<?php
// Check if form was submitted
if(isset($_POST['submit'])) {
    // Check if the file was uploaded 
    if(!empty($_FILES['file']['tmp_name'])) {
        // Get the file type
        $file_type = $_FILES['file']['type'];
        // Create an array of file types
        $allowed_types = array('image/jpeg', 'image/jpg','image/png');
        // Check to see if the file types uploaded are not in the arrray.
        if(!in_array($file_type, $allowed_types)) {
            echo 'the file you uploaded is not allowed';
        }
        // Restrict the uploaded file to under 1MB
        else if($_FILES['file']['size'] > 1000000){
            echo 'the file you uploaded is too large';
        }      
        // Upload the file to the uploads directory  
         else {
            $path = 'uploads/';
            $path = $path . basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
            echo 'File uploaded successfully';
        }
    } else {
        echo 'you must choose a file to upload';
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP File Upload</title>
    <style>
        label {
            display: block;
            margin: 10px 0;
        }
        input {
            margin: 10px 0;
            display: block;
        }
    </style>
</head>
<body>
    <h4>Upload a file</h4>
    <p>File types are restricted to jpeg, and png's.</p>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
    <label>
    Upload an Image
        <input type="file" name="file" id="file" />
        <input type="submit" name="submit" value="Submit" />
    </label>
    </form>
</body>
</html>