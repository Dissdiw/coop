<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['admin_login'])) {
    header('location: index.php');
}

if (isset($_POST['submit'])) {
    $estra = $_POST['estra'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $pay = $_POST['pay'];
    $embedUrl = $_POST['embed-url'];


    try {

        $check_estra = $conn->prepare("SELECT estra FROM establishment WHERE estra = :estra");
        $check_estra->bindParam(":estra", $estra);
        $check_estra->execute();
        $row = $check_estra->fetch(PDO::FETCH_ASSOC);

        if ($row['estra'] == $estra) {
            $_SESSION['warning'] = "สถานประกอบการนี้มีอยู่ในระบบเเล้ว";
            header("location: admin_com.php");
        } else if (!isset($_SESSION['error'])) {
            $stmt = $conn->prepare("INSERT INTO establishment(estra, location, phone, pay, embed_url)
                                            VALUES(:estra, :location, :phone, :pay, :embedUrl)");
            $stmt->bindParam(":estra", $estra);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":pay", $pay);
            $stmt->bindParam(":embedUrl", $embedUrl);
            $stmt->execute();
            $_SESSION['success'] = "เพิ่มข้อมูลเสร็จสิ้น";
            header("location: admin_com.php");
        } else {
            $_SESSION['error'] = 'มีบางอย่างผิดพลาด';
            header("location: admin_com.php");
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

if (isset($_REQUEST['saveChanges'])) {

    try {
        $update_stmt = $conn->prepare('UPDATE establishment SET location = :location, pay = :pay,
                                                        phone = :phone, embed_url = :embedUrl, estra = :esta WHERE estra = :establish ');
        $update_stmt->bindParam(':location', $_REQUEST['location']);
        $update_stmt->bindParam(':pay', $_REQUEST['pay']);
        $update_stmt->bindParam(':phone', $_REQUEST['phone']);
        $update_stmt->bindParam(':esta', $_REQUEST['esta']);
        $update_stmt->bindParam(':establish', $_REQUEST['establish']);
        $update_stmt->bindParam(':embedUrl', $_REQUEST['embed-url']);

        $update_stmt->execute();
        header("location: admin_com.php");

    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

if (isset($_REQUEST['delete'])) {

    try {
        $idDL = $_REQUEST['idDL'];
        $delele_stmt = $conn->prepare('DELETE FROM establishment WHERE id = :idDL');
        $delele_stmt->bindParam(':idDL', $idDL);

        $delele_stmt->execute();
        header("location: admin_com.php");

    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

?>
