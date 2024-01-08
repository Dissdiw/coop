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
                <h5 class="fw-bold mb-0 me-auto">แบบสำรวจ</h5>
                <?php include('admin_profile.php')?>
            </nav>
            <!-- end: Navbar -->
            
            <!-- start: form-sv -->
            <div class="d-flex justify-content-center">
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="fw-bold">ส่วนที่ 1: ข้อมูลพื้นฐาน</h5>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card border-0 shadow-sm mt-3 col-10">  
                    <div class="card-body">
                        <div class="duo">
                            <div class="col-6 me-2">
                                <label for="name" class="col-form-label">ชื่อ-นามสกุล:</label>
                                <input type="text" class="form-control" id="name" value="#" disabled>
                            </div>
                            <div class="col-6">
                                <label for="" class="col-form-label">รหัสประจำตัว:</label>
                                <input type="text" class="form-control" id="esta" value="#" disabled>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="" class="col-form-label">ที่พักขณะปฏิบัติงาน:</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="3" disabled></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="" class="col-form-label">สถานประกอบการ:</label>
                            <input type="text" class="form-control" id="esta" value="#" disabled>
                        </div>
                        <div class="mt-2">
                            <label for="" class="col-form-label">ที่อยู่:</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="3" disabled></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="" class="col-form-label">ประเภทกิจการ / ธุรกิจ / ผลิตภัณฑ์:</label>
                            <input type="text" class="form-control" id="esta" value="#" disabled>
                        </div>
                        <div class="duo mt-2">
                            <div class="col-6 me-2">
                                <label for="" class="col-form-label">จำนวนพนักงานรวม:</label>
                                <input type="text" class="form-control" id="" value="#" disabled>
                            </div>
                            <div class="col-6">
                                <label for="" class="col-form-label">จำนวนวันในการทำงานต่อสัปดาห์:</label>
                                <input type="text" class="form-control" id="" value="#" disabled>
                            </div>
                        </div>
                        <div class="duo mt-2">
                            <div class="col-4 me-2">
                                <label for="" class="col-form-label">จำนวนชั่วโมงการทำงาน:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="#" disabled>
                                    <span class="input-group-text" id="basic-addon2">ชั่วโมง/สัปดาห์</span>
                                </div>
                            </div>
                            <div class="col-4 me-2">
                                <label for="" class="col-form-label">วัน:</label>
                                <input type="date" class="form-control" id="" value="#" disabled>
                            </div>
                            <div class="col-4 me-2">
                                <label for="" class="col-form-label">ถึง:</label>
                                <input type="date" class="form-control" id="" value="#" disabled>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="" class="col-form-label">ตำแหน่งงานที่นักศึกษาปฏิบัติ:</label>
                            <input type="text" class="form-control" id="" value="#" disabled>
                        </div>
                        <div class="mt-2">
                            <label for="" class="col-form-label">ลักษณะงานที่นักศึกษาปฏิบัติ:</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="3" disabled></textarea>
                        </div>
                        <div class="duo mt-2">
                            <div class="col-6 me-2">
                                <label for="" class="col-form-label">ชื่อพี่เลี้ยงที่สถานประกอบการจัดให้ดูแลนักศึกษา:</label>
                                <input type="text" class="form-control" id="" value="#" disabled>
                            </div>
                            <div class="col-6">
                                <label for="" class="col-form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" class="form-control" id="" value="#" disabled>
                            </div>
                        </div>
                        <div class="duo mt-2">
                            <div class="col-6 me-2">
                                <label for="" class="col-form-label">ตำแหน่งพี่เลี้ยง:</label>
                                <input type="text" class="form-control" id="" value="#" disabled>
                            </div>
                            <div class="col-6">
                                <label for="" class="col-form-label">จำนวนนักศึกษาที่พี่เลี้ยงรับผิดชอบ:</label>
                                <input type="text" class="form-control" id="" value="#" disabled >
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <a href="admin_regis_ce.php" class="fw-bold btn btn-danger me-2">Close</a>
                            <a href="admin_regis_sv2.php" class="fw-bold btn btn-primary">Next</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end: form-sv -->

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