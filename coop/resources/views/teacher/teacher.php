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
    <link href="css/table.css" rel="stylesheet">
    <!-- table -->
    <title>Teacher</title>
</head>

<body>
    
    <?php include('teacher_navbar.php'); ?>

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">โครงการสหกิจศึกษา</h5>
                <?php include('teacher_profile.php')?>
            </nav>
            <!-- end: Navbar -->
            
            <!-- start: card-body -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered" id="estaTB">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>สถานประกอบการ</th>
                                    <th>ปีการศึกษา</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>KFC</td>
                                    <td>2566</td>
                                    <td>อาดิศร์ ตอเล็บ</td>
                                    <td>
                                        <div class="btn-group dropend">
                                            <button type="button" class="fw-bold btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                รายละเอียด
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="teacher_regis_sv.php" class="dropdown-item">แบบสำรวจ</a></li>
                                                <li><a href="#" class="dropdown-item">ใบสมัคร</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>สถานประกอบการ</th>
                                    <th>ปีการศึกษา</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th disabled></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            <!-- end: card-body -->
            
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
    <!-- <script>let table = new DataTable('#estaTB');</script> -->
    <script src="js/table.js"></script>
    <!-- table -->
</body>

</html>