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
    <!-- start sidebar -->
    <?php include('student_navbar.php'); ?>
    <!-- end: sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">แบบสำรวจ</h5>
                <?php include('student_profile.php')?>
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
                            <input type="text" class="form-control income" aria-label="Text input with dropdown button" name="income">
                            <div class="input-group-append">
                                <select class="form-select" name="income_type" required>
                                    <option selected disabled>เลือก</option>
                                    <option value="บาท/วัน">บาท/วัน</option>
                                    <option value="บาท/เดือน">บาท/เดือน</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="esta-phoneno" class="col-form-label">รถรับส่งไป-กลับระหว่างสถานประกอบการ ที่พัก หรือชุมชนใกล้เคียง:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salaryRadioOptions" id="salaryRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">มี</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salaryRadioOptions" id="salaryRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">ไม่มี</label>
                            </div>
                        </div>
                        <div>
                            <label for="esta-phoneno" class="col-form-label">ที่พัก:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">สถานประกอบการมีให้ไม่เสียค่าใช้จ่าย</label>
                            </div><br>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio1">สถานประกอบการมีให้เเต่ต้องเสียค่าใช้จ่าย จำนวน:</label>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">บาท/เดือน</span>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                <label class="form-check-label" for="inlineRadio1">นักศึกษารับผิดชอบค่าใช้จ่ายเอง:</label>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">บาท/เดือน</span>
                            </div>
                        </div>
                                
                        <div class="mt-2">
                            <label for="" class="col-form-label">สวัสดิการอื่น ๆ (ระบุ เช่น อาหาร ชุดทำงาน ประกันอุบัติเหตุ ฯลฯ):</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <a href="student_regis_sv.php" class="fw-bold btn btn-secondary me-2">Back</a>
                            <a href="student_regis_sv3.php" class="fw-bold btn btn-primary">Next</a>
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
</body>

</html>