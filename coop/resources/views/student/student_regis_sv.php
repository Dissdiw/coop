<?php
    session_start();
    require_once 'config/db.php';

$_SESSION['wait'] = '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>';

$_SESSION['pass'] =
    '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>';

$_SESSION['fail'] =
    '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>';


    if (isset($_SESSION['student_login'])) {
        $student_id = $_SESSION['student_login'];
        $query_stmt = $conn->prepare("SELECT * FROM users WHERE studentid = $student_id");
        $query_stmt->execute();
        $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $studentid = $row['studentid'];
    }
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
    <link rel="stylesheet" href="css/studentform.css">
    <!-- end: CSS -->
    <!-- thai font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@200&display=swap" rel="stylesheet">
    <!-- thai font -->
    <title>Student</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    
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
                <form id="regForm" action="">
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
                                <div class="tab">
                                    <div class="row g-3">
                                        <div class="col">
                                            <label for="name" class="col-form-label">ชื่อ-นามสกุล:</label>
                                            <input type="text" class="form-control" id="name" value="<?php echo($firstname . " " . $lastname) ?>" disabled>
                                        </div>
                                        <div class="col">
                                            <label for="" class="col-form-label">รหัสประจำตัว:</label>
                                            <input type="text" class="form-control" id="esta" value="<?php echo($studentid) ?>" disabled>
                                            <input type="hidden" name="studentid" value="<?php echo($studentid) ?>">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="col-form-label">ที่พักขณะปฏิบัติงาน:</label>
                                        <textarea name="rest" id="" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="col-form-label">สถานประกอบการ:</label>
                                        <input type="text" name="estra" class="form-control" id="esta" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="col-form-label">ที่อยู่:</label>
                                        <textarea name="location" id="" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="col-form-label">ประเภทกิจการ / ธุรกิจ / ผลิตภัณฑ์:</label>
                                        <input type="text" name="type" class="form-control" id="esta" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="row g-3">
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">จำนวนพนักงานรวม:</label>
                                            <input type="text" name="employee_no" class="form-control" id="" oninput="this.className = 'form-control'">
                                        </div>
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">จำนวนวันในการทำงานต่อสัปดาห์:</label>
                                            <input type="text" name="std_work_date" class="form-control" id="" oninput="this.className = 'form-control'">
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">จำนวนชั่วโมงการทำงาน:</label>
                                            <div class="input-group">
                                                <input type="text" name="std_work_hour" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" oninput="this.className = 'form-control'">
                                                <span class="input-group-text" id="basic-addon2">ชั่วโมง/สัปดาห์</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">วัน:</label>
                                            <input type="date" name="start_date" class="form-control" id="" oninput="this.className = 'form-control'">
                                        </div>
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">ถึง:</label>
                                            <input type="date" name="end_date" class="form-control" id="" oninput="this.className = 'form-control'">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="col-form-label">ตำแหน่งงานที่นักศึกษาปฏิบัติ:</label>
                                        <input type="text" name="position" class="form-control" id="" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="col-form-label">ลักษณะงานที่นักศึกษาปฏิบัติ:</label>
                                        <textarea name="job_des" id="" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">ชื่อพี่เลี้ยงที่สถานประกอบการจัดให้ดูแลนักศึกษา:</label>
                                            <input type="text" name="mentor_name" class="form-control" id="" oninput="this.className = 'form-control'">
                                        </div>
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">เบอร์โทรศัพท์:</label>
                                            <input type="text" name="mentor_phone" class="form-control" id="" oninput="this.className = 'form-control'">
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">ตำแหน่งพี่เลี้ยง:</label>
                                            <input type="text" name="mentor_position" class="form-control" id="" oninput="this.className = 'form-control'">
                                        </div>
                                        <div class="col">
                                            <label for="" class="col-form-label mt-2">จำนวนนักศึกษาที่พี่เลี้ยงรับผิดชอบ:</label>
                                            <input type="text" name="mentor_std_no" class="form-control" id="" oninput="this.className = 'form-control'">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <label for="" class="col-form-label">ค่าตอบแทน:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control income" aria-label="Text input with dropdown button" name="income" oninput="this.className = 'form-control'">
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
                                            <input class="form-check-input" type="radio" name="bus" id="bus1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">มี</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bus" id="bus2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">ไม่มี</label>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="esta-phoneno" class="col-form-label">ที่พัก:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rest_choice" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">สถานประกอบการมีให้ไม่เสียค่าใช้จ่าย</label>
                                        </div><br>
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="rest_choice" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio1">สถานประกอบการมีให้เเต่ต้องเสียค่าใช้จ่าย จำนวน:</label>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" name="rest_payment_est" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" oninput="this.className = 'form-control'">
                                            <span class="input-group-text" id="basic-addon2">บาท/เดือน</span>
                                        </div>
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="rest_choice" id="inlineRadio3" value="3">
                                            <label class="form-check-label" for="inlineRadio1">นักศึกษารับผิดชอบค่าใช้จ่ายเอง:</label>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" name="rest_payment_std" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" oninput="this.className = 'form-control'">
                                            <span class="input-group-text" id="basic-addon2">บาท/เดือน</span>
                                        </div>
                                    </div>
                                            
                                    <div class="mt-2">
                                        <label for="" class="col-form-label">สวัสดิการอื่น ๆ (ระบุ เช่น อาหาร ชุดทำงาน ประกันอุบัติเหตุ ฯลฯ):</label>
                                        <textarea name="benefit" id="" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                        </form>        
                                <div class="tab">
                                    <div class="card border-0 shadow-sm">
                                        <form id="uploadForm" enctype="multipart/form-data">
                                            <div class="d-flex card-body">
                                                <input type="hidden" name="studentid" value="<?php echo($studentid) ?>">   
                                                <input class="fw-bold" type="file" id="file" name="images[]" multiple accept="image/png, image/jpeg" required>
                                                <div class="d-flex align-items-end ms-3">
                                                    <button class="fw-bold btn btn-primary me-2" type="submit">Upload</button>
                                                    <label for="" class="text-danger">* อัปโหลดได้เฉพาะ .png , .jpg</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="imagePreview"></div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="fw-bold btn btn-secondary me-2">Back</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)" class="fw-bold btn btn-primary">Next</button>
                                </div>

                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
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
    <script src="js/studentform.js"></script>
    <!-- end: JS -->

    <script>
            $(document).ready(function () {
            $("#uploadForm").submit(function (e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this);

                $.ajax({
                    url: "upload_place.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#imagePreview").html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Preview images before upload (optional)
            $('input[type="file"]').change(function () {
                $('#imagePreview').html('');
                var files = $(this)[0].files;

                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imagePreview').append('<img src="' + e.target.result + '" width="100">');
                    };

                    reader.readAsDataURL(files[i]);
                }
            });
        });
    </script>
</body>

</html>