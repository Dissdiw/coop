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
    <link rel="stylesheet" href="css/studentform.css">
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
                <h5 class="fw-bold mb-0 me-auto">ใบสมัครงานสหกิจศึกษา</h5>
                <?php include('student_profile.php')?>
            </nav>
            <!-- end: Navbar -->
            <form id="regForm" action="">
                <div class="d-flex justify-content-center">
                    <div class="card border-0 shadow-sm mt-3 col-10">  
                        <div class="card-body">
                            <div class="tab">
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label">ชื่อสถานประกอบการที่ต้องการสมัคร:</label>
                                        <input type="text" class="form-control" id="esta" value="#" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label">สมัครงานในตำแหน่ง:</label>
                                        <input type="text" class="form-control" id="postition" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <label for="" class="col-form-label mt-2">ระยะเวลาปฏิบัติงานสหกิจศึกษา (อย่างน้อย 10 เดือน):</label>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="" class="col-form-label">จาก</label>
                                        <input type="date" class="form-control" id="" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label">ถึง</label>
                                        <input type="date" class="form-control" id="" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <h6 class="fw-bold mt-4 d-flex justify-content-center">ข้อมูลส่วนตัวนักศึกษา</h6>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label">ชื่อ (ภาษาไทย):</label>
                                        <input type="text" class="form-control" id="firstname" value="#" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label">นามสกุล:</label>
                                        <input type="text" class="form-control" id="lastname" value="#" disabled>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label mt-2">ชื่อ (ภาษาอังกฤษ):</label>
                                        <input type="text" class="form-control" id="firstnameeng" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label mt-2">นามสกุล:</label>
                                        <input type="text" class="form-control" id="lastnameeng" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="esta-phoneno" class="col-form-label">เพศ:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexRadioOptions" id="sexRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">ชาย</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexRadioOptions" id="sexRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">หญิง</label>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label ">วัน เดือน ปีเกิด:</label>
                                        <input type="date" class="form-control" id="dateofbirth" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label ">อายุ:</label>
                                        <input type="text" class="form-control" id="age" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label ">น้ำหนัก:</label>
                                        <input type="text" class="form-control" id="weight" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label">ส่วนสูง:</label>
                                        <input type="text" class="form-control" id="height" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label mt-2">บัตรประจำตัวประชาชนเลขที่:</label>
                                        <input type="text" class="form-control" id="idcardno" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label mt-2">ออกให้ ณ:</label>
                                        <input type="text" class="form-control" id="placeofissue" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label mt-2">วันหมดอายุ:</label>
                                        <input type="text" class="form-control" id="duedate" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label mt-2">เชื้อชาติ:</label>
                                        <input type="text" class="form-control" id="Race" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label mt-2">สัญชาติ:</label>
                                        <input type="text" class="form-control" id="Nationality" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label mt-2">ศาสนา:</label>
                                        <input type="text" class="form-control" id="Religion" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="" class="col-form-label">ที่อยู่ปัจจุบัน:</label>
                                    <textarea name="" id="presentaddress" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label mt-2">โทรศัพท์:</label>
                                        <input type="text" class="form-control" id="phone" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label mt-2">โทรศัพท์เคลื่อนที่:</label>
                                        <input type="text" class="form-control" id="mobilephone" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label mt-2">อีเมล์:</label>
                                        <input type="text" class="form-control" id="email" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="" class="col-form-label">ที่อยู่ตามทะเบียนบ้าน:</label>
                                    <textarea name="" id="permanentaddress" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col">
                                    <label for="name" class="col-form-label mt-2">โทรศัพท์:</label>
                                    <input type="text" class="form-control" id="permanentphone" oninput="this.className = 'form-control'">
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label mt-2">บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน:</label>
                                        <input type="text" class="form-control" id="emergencycontact" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label for="" class="col-form-label mt-2">โทรศัพท์:</label>
                                        <input type="text" class="form-control" id="emergencyphone" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <h6  class="fw-bold mt-2 d-flex justify-content-center">ข้อมูลครอบครัว</h6>
                                <div class="row g-3">
                                    <div class="col">
                                        <label class="col-form-label mt-2">ชื่อ-สกุลบิดา:</label>
                                        <input type="text" class="form-control" id="fathername" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-2">อาชีพ:</label>
                                        <input type="text" class="form-control" id="fatheroccupation" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="" class="col-form-label">สถานที่ทำงาน:</label>
                                    <textarea name="" id="fatherplaceofwork" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col">
                                    <label for="name" class="col-form-label mt-2">โทรศัพท์:</label>
                                    <input type="text" class="form-control" id="fatherplaceofworkphone" oninput="this.className = 'form-control'">
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label class="col-form-label mt-2">ชื่อ-สกุลมารดา:</label>
                                        <input type="text" class="form-control" id="mothername" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-2">อาชีพ:</label>
                                        <input type="text" class="form-control" id="motheroccupation" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="" class="col-form-label">สถานที่ทำงาน:</label>
                                    <textarea name="" id="motherplaceofwork" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col">
                                    <label for="name" class="col-form-label mt-2">โทรศัพท์:</label>
                                    <input type="text" class="form-control" id="motherplaceofworkphone" oninput="this.className = 'form-control'">
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label class="col-form-label mt-2">จำนวนพี่น้อง:</label>
                                        <input type="text" class="form-control" id="noofsiblings" oninput="this.className = 'form-control'">
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-2">เป็นบุตรคนที่:</label>
                                        <input type="text" class="form-control" id="son" oninput="this.className = 'form-control'">
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <h6 class="fw-bold mt-2 d-flex justify-content-center">การศึกษา</h6>
                                <h6 class="mt-2">กำลังศึกษาในภาควิชาการจัดการเทคโนโลยีการผลิตและสารสนเทศ</h6>
                                <h6 class="mt-2">Department of Information and Product Technology Management</h6>
                                <h6 class="mt-4">วิทยาลัยเทคโนโลยีอุตสาหกรรม มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h6>
                                <h6 class="mt-2">College of Industrial Technology King Mongkut's University of Technology North Bangkok</h6>
                                <div class="col">
                                    <label class="col-form-label mt-2">ผลการเรียนสะสม:</label>
                                    <input type="text" class="form-control" id="GPA" oninput="this.className = 'form-control'">
                                </div>
                                <h6 class="fw-bold mt-4 d-flex justify-content-center">ประวัติการศึกษา</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-2">ระดับ</th>
                                            <th>สถานศึกษา</th>
                                            <th>ปีที่เริ่ม</th>
                                            <th>ปีที่จบ</th>
                                            <th>วุฒิการศึกษา</th>
                                            <th>วิชาเอก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><th>มัธยมต้น</th>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr><th>มัธยมปลาย</th>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr><th>อนุปริญญา</th>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr><th>ปริญญา</th>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h6 class="fw-bold mt-4 d-flex justify-content-center">ประวัติการฝึกอบรม</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>หัวข้อฝึกอบรม</th>
                                            <th>หน่วยงานที่ให้การอบรม</th>
                                            <th>ช่วงเวลาที่ฝึกอบรม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab">
                                <h6 class="fw-bold mt-4 d-flex justify-content-center">ประสบการณ์การปฏิบัติงานและกิจกรรมนักศึกษา</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ช่วงเวลา</th>
                                            <th>องค์กร/กิจกรรม</th>
                                            <th>ความรับผิดชอบ</th>
                                            <th>หมายเหตุ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h6 class="fw-bold mt-4 d-flex justify-content-center">ความสามารถทางภาษา</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ภาษา</th>
                                            <th>พูด</th>
                                            <th>ฟัง</th>
                                            <th>หมายเหตุ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="tab">
                                <div>
                                    <h6>ข้อมูลส่วนตัวนักศึกษา</h6>
                                </div>
                            </div> -->
                            <div class="tab">
                                <div class="d-flex justify-content-between">
                                    <label for="" class="col-form-label">Location (นำ iframe ใน Google Map มาใส่) :</label>
                                    <label for="" class="col-form-label text-danger">* วิธีการใส่ iframe <a href="#">คลิกที่นี่</a></label>
                                </div>
                                <input type="text" class="form-control" id="esta" placeholder="<iframe>">
                                <div class="d-flex justify-content-center mt-3">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.331165951846!2d100.51171287480611!3d13.819142195731423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b877800c9af%3A0xd754c571fc7177b!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lie4Lij4Liw4LiI4Lit4Lih4LmA4LiB4Lil4LmJ4Liy4Lie4Lij4Liw4LiZ4LiE4Lij4LmA4Lir4LiZ4Li34Lit!5e0!3m2!1sth!2sth!4v1692607975929!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                
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
                                <span class="step"></span>
                                <span class="step"></span>
                                <!-- <span class="step"></span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
</body>

</html>