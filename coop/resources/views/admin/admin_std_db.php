<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['admin_login'])) {
    header('location: index.php');
}

if (isset($_REQUEST['saveChanges'])) {
    $studentid = $_POST['studentid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneno = $_POST['phoneno'];
    $image = $_POST['image'];

    try {
        $update_stmt = $conn->prepare('UPDATE users SET studentid = :studentid, firstname = :firstname, lastname = :lastname, email = :email,
                                                        password = :password, phoneno = :phoneno, image = :image WHERE studentid = :studentno ');
        $update_stmt->bindParam(':studentid', $_REQUEST['studentid']);
        $update_stmt->bindParam(':studentno', $_REQUEST['studentno']);
        $update_stmt->bindParam(':firstname', $_REQUEST['firstname']);
        $update_stmt->bindParam(':lastname', $_REQUEST['lastname']);
        $update_stmt->bindParam(':email', $_REQUEST['email']);
        $update_stmt->bindParam(':password', $_REQUEST['password']);
        $update_stmt->bindParam(':phoneno', $_REQUEST['phoneno']);
        $update_stmt->bindParam(':image', $_REQUEST['image']);

        $update_stmt->execute();
        header("location: admin_std.php");

    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

if (isset($_REQUEST['delete'])) {

    try {
        $idDL = $_REQUEST['idDL'];
        $delele_stmt = $conn->prepare('DELETE FROM users WHERE id = :idDL');
        $delele_stmt->bindParam(':idDL', $idDL);

        $delele_stmt->execute();
        header("location: admin_std.php");

    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

?>
