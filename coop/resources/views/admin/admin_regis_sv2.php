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
            
            <!-- start: form-sv2 -->
            <div class="d-flex justify-content-center">
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="fw-bold">ส่วนที่ 2: สวัสดิการที่ได้รับจากสถานประกอบการ</h5>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card border-0 shadow-sm mt-3 col-10">  
                    <div class="card-body">
                        <label for="" class="col-form-label">ค่าตอบแทน:</label>
                        <div class="input-group">
                            <input type="text" class="form-control income" aria-label="Text input with dropdown button" name="income" disabled>
                            <div class="input-group-append">
                                <select class="form-select" name="income_type" disabled required>
                                    <option selected disabled>เลือก</option>
                                    <option value="บาท/วัน">บาท/วัน</option>
                                    <option value="บาท/เดือน">บาท/เดือน</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="esta-phoneno" class="col-form-label">รถรับส่งไป-กลับระหว่างสถานประกอบการ ที่พัก หรือชุมชนใกล้เคียง:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salaryRadioOptions" id="salaryRadio1" disabled value="option1">
                                <label class="form-check-label" for="inlineRadio1">มี</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salaryRadioOptions" id="salaryRadio2" disabled value="option2">
                                <label class="form-check-label" for="inlineRadio2">ไม่มี</label>
                            </div>
                        </div>
                        <div>
                            <label for="esta-phoneno" class="col-form-label">ที่พัก:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" disabled value="option1">
                                <label class="form-check-label" for="inlineRadio1">สถานประกอบการมีให้ไม่เสียค่าใช้จ่าย</label>
                            </div><br>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" disabled value="option2">
                                <label class="form-check-label" for="inlineRadio1">สถานประกอบการมีให้เเต่ต้องเสียค่าใช้จ่าย จำนวน:</label>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled >
                                <span class="input-group-text" id="basic-addon2">บาท/เดือน</span>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled >
                                <label class="form-check-label" for="inlineRadio1">นักศึกษารับผิดชอบค่าใช้จ่ายเอง:</label>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled>
                                <span class="input-group-text" id="basic-addon2">บาท/เดือน</span>
                            </div>
                        </div>
                                
                        <div class="mt-2">
                            <label for="" class="col-form-label">สวัสดิการอื่น ๆ (ระบุ เช่น อาหาร ชุดทำงาน ประกันอุบัติเหตุ ฯลฯ):</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="3" disabled></textarea>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="admin_regis_sv.php" class="d-flex justtify-content-start fw-bold btn btn-secondary me-2">Back</a>
                            <a href="admin_regis_ce.php" class="d-flex justify-content-center fw-bold btn btn-danger me-2">Close</a>
                            <a href="admin_regis_sv3.php" class="d-flex justify-content-end fw-bold btn btn-primary">Next</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end: form-sv2 -->

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