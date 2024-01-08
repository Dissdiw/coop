<?php
    session_start();
    require_once 'config/db.php';

    if (!isset($_SESSION['admin_login'])) {
        header('location: index.php');
    }

    if (isset($_POST['submit'])) {
        $personnelid = $_POST['personnelid'];
        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $phoneno = $_POST['phoneno'];
        $email  = $_POST['email'];
        $password = $_POST['password'];
        $urole = $_POST['urole'];
        $image = $_POST['image'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: admin_personnel.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = "รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร";
            header("location: admin_personnel.php");
        } else {
            try { 

                $check_staffid = $conn->prepare("SELECT studentid FROM users WHERE studentid = :studentid");
                $check_staffid->bindParam(":studentid", $studentid);
                $check_staffid->execute();
                $row = $check_staffid->fetch(PDO::FETCH_ASSOC);

                if ($studentid == $personnelid) {
                    $_SESSION['warning'] = "รหัสบุคลากรนี้เคยลงทะเบียนแล้ว";
                    header("location: admin_personnel.php");
                } else if (!isset($_SESSION['error'])) {
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, studentid, email, password, phoneno, urole)
                                            VALUES(:firstname, :lastname, :studentid, :email, :password, :phoneno, :urole)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":studentid", $personnelid);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $password);
                    $stmt->bindParam(":phoneno", $phoneno);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "เพิ่มข้อมูลเสร็จสิ้น";
                    header("location: admin_personnel.php");
                } else {
                    $_SESSION['error'] = 'มีบางอย่างผิดพลาด';
                    header("location: admin_personnel.php");
                }

            } catch(PDOException $e) {
                echo $e->getmessage();
            }

        }
    }

    if(isset($_REQUEST['saveChanges'])) {

        try {
            $update_stmt = $conn->prepare('UPDATE users SET studentid = :personnelid, firstname = :firstname, lastname = :lastname, email = :email,
                                                            password = :password, phoneno = :phoneno, urole = :urole, image = :image  WHERE studentid = :personid ');
            $update_stmt->bindParam(':firstname', $_REQUEST['firstname']);
            $update_stmt->bindParam(':lastname', $_REQUEST['lastname']);
            $update_stmt->bindParam(':email', $_REQUEST['email']);
            $update_stmt->bindParam(':password', $_REQUEST['password']);
            $update_stmt->bindParam(':phoneno', $_REQUEST['phoneno']);
            $update_stmt->bindParam(':urole', $_REQUEST['urole']);
            $update_stmt->bindParam(':personid', $_REQUEST['personid']);
            $update_stmt->bindParam(':personnelid', $_REQUEST['personnelid']);
            $update_stmt->bindParam(':image', $_REQUEST['image']);
            
            $update_stmt->execute();
            header("location: admin_personnel.php");

        } catch (PDOException $e) {
            echo $e->getmessage();
        }
    }
    
    if(isset($_REQUEST['delete'])) {

        try{
            $staffidDL = $_REQUEST['staffidDL'];
            $delele_stmt = $conn->prepare('DELETE FROM users WHERE id = :staffidDL');
            $delele_stmt->bindParam(':staffidDL', $staffidDL);

            $delele_stmt->execute();
            header("location: admin_personnel.php");

        } catch (PDOException $e) {
            echo $e->getmessage();
        }
    }

?>