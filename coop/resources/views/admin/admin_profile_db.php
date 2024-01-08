
<?php
session_start();
if(!isset($_REQUEST['role'])){
    header('location: index.php');
}

include_once 'config/db.php';

$statusMsg = "";

$targetDir = "uploads/";

if (isset($_POST['submit'])) {
    try{
        $query_stmt = $conn->prepare('SELECT * FROM users');
        $query_stmt->execute();
        while($row = $query_stmt->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $nfile = $row['image'];
        }


        $file = $_FILES['file']['name'];
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'];
        $temp = $_FILES['file']['tmp_name'];

        $path = "uploads/" . $file; // set upload folder path
        $directory = "uploads/";

        if($file){
            // $errorMsg = "Please Select File";
            if($type == 'image/jpg' || $type == 'image/png' || $type == 'image/jpeg'){
                if($size < 5000000) { //check file size 5mb
                    unlink($directory.$nfile);
                    move_uploaded_file($temp, $path); // move upload file temporary directory to your upload folder
                } else {
                    $errorMsg = "Your file too large please upload 5mb size"; //error message if size is larger than 5 mb
                }
            
        } else {
            $errorMsg = "Upload only JPG, JPEG or PNG format!";
        }
        
    } else {
        $file = $nfile;
    }

        if (!isset($errorMsg)){

                $insert_stmt = $conn->prepare('UPDATE users SET image = :ffile WHERE id = :fid');
                $insert_stmt -> bindParam(':ffile', $file);
                $insert_stmt -> bindParam(':fid', $id);

                if($insert_stmt->execute()) {
                    $insertMsg = "File Uploaded successfully...";
                    header("location: admin.php");
                }
            
            
        }


    }catch(PDOException $e) {
        $e -> getMessage();
    }
}
?>
