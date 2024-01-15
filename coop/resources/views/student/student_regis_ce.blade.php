<?php
    session_start();
    require_once 'config/db.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- end: CSS -->
    <!-- thai font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@200&display=swap" rel="stylesheet">
    <!-- thai font -->
    <title>Student</title>
</head>

<body>
    
    <?php include('student_navbar.php'); ?>

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">สมัครโครงการสหกิจ</h5>
                <?php include('student_profile.php')?>
            </nav>
            <!-- end: Navbar -->
            
            <!-- start: sv card-body -->
            <a href="student_regis_sv.php" class="fw-bold btn btn-primary mt-4">สร้างแบบสำรวจ</a>
            <div class="card border-0 shadow-sm mt-2">
                    <div class="card-body">
                        <h5 class="fw-bold">แบบสำรวจสหกิจ</h5>
                        <table class="table table-bordered" id="svTable">
                            <thead>
                                <th>ลำดับ</th>
                                <th>สถานประกอบการ</th>
                                <th>สถานะ</th>
                            </thead>
                            <tbody>
                            <tr>
                            <?php
                                 $stmt = $conn->query("SELECT * FROM survey_request WHERE studentid = $studentid");
                                               
                                 $i = 1;
                                 while($row = $stmt->fetch()) { 
                                     $sv_esta = $row['estra'];
                                     $sv_status = $row['status'];
                            ?>
                                
                                    <td>
                                        <?php echo $i; $i++; ?>
                                    </td>
                                    <td><?php echo($sv_esta); ?></td>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                        <?php echo($sv_status); ?>"
                                    </td>

                            <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- end: sv card-body -->

            <!-- start: regis card-body -->
            <a href="student_regis.php" class="fw-bold btn btn-primary mt-4">สร้างใบสมัคร</a>
            <div class="card border-0 shadow-sm mt-2">
                    <div class="card-body">
                        <h5 class="fw-bold">แบบสมัครสหกิจ</h5>
                        <table class="table table-bordered">
                            <thead>
                                <th>ลำดับ</th>
                                <th>สถานประกอบการ</th>
                                <th>สถานะ</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- end: regis card-body -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <!-- end: JS -->
</body>

</html>