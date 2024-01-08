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
    <!-- table -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- table -->
    <title>Admin</title>
</head>

<body>
    
    <?php include('admin_navbar.php'); ?>

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">สมัครโครงการสหกิจ</h5>
                <?php include('admin_profile.php')?>
            </nav>
            <!-- end: Navbar -->
            
            <!-- start: sv card-body -->
            <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <h5 class="fw-bold">แบบสำรวจสหกิจ</h5>
                        <table class="table table-bordered" id="svTable">
                            <thead>
                                <th>ลำดับ</th>
                                <th>สถานประกอบการ</th>
                                <th>สถานะ</th>
                                <th>รายละเอียด</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>KFC</td>
                                    <td>-</td>
                                    <td>
                                        <a href="admin_regis_sv.php" class="fw-bold btn btn-primary">รายละเอียด</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- end: sv card-body -->

            <!-- start: regis card-body -->
            <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="fw-bold">แบบสมัครสหกิจ</h5>
                        <table class="table table-bordered" id="regisTable">
                            <thead>
                                <th>ลำดับ</th>
                                <th>สถานประกอบการ</th>
                                <th>สถานะ</th>
                                <th>รายละเอียด</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>KFC</td>
                                    <td>-</td>
                                    <td>
                                        <a href="#" class="fw-bold btn btn-primary">รายละเอียด</a>
                                    </td>
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
     <!-- table -->
     <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#svTable,#regisTable');</script>
    <!-- table -->
</body>

</html>