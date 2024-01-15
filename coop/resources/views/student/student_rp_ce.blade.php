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
                <h5 class="fw-bold mb-0 me-auto">ส่งรายงานปฏิบัติงานสหกิจ</h5>
                <?php include('student_profile.php')?>
            </nav>
            <!-- end: Navbar -->
            
            <!-- start: rp card-body -->
            <div class="d-flex justify-content-center">
                <div class="card border-0 shadow-sm mt-4 col-6">
                    <div class="card-body">
                        <form action="upload_rp.php" method="POST" enctype="multipart/form-data">
                            <div class="duo">
                                <label class="col-4" for="esta">ชื่อสถานประกอบการ</label>
                                <input type="text" class="form-control" id="esta" value="#" disabled>
                            </div>
                            <div class="duo mt-3">
                                <label class="col-4 " for="fn-ln">ชื่อ-นามสกุล นักศึกษา</label>
                                <input type="text" class="form-control me-2" id="firstname" value="<?php echo($firstname) ?>" disabled>
                                <input type="text" class="form-control" id="lastname" value="<?php echo($lastname) ?>" disabled>
                            </div>
                            <label for="esta-phoneno" class="col-form-label col-4 mt-3">รายงานปฏิบัติงานสหกิจ:</label>
                            <div class="form-check form-check-inline col-2">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">รอบที่1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">รอบที่2</label>
                            </div>
                            <div class="mt-3">
                                <label for="images" class="drop-container">
                                    <span class="drop-title">Drop files here</span>
                                    <input type="file" id="file" name="file" accept="application/zip,application/x-rar-compressed" required>
                                </label>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="fw-bold btn btn-primary" name="submit">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end: rp card-body -->

            <!-- start: table card-body -->
            <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>ลำดับ</th>
                                <th>รายงานปฏิบัติงานสหกิจ</th>
                                <th>รอบที่</th>
                                <th>จัดการ</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><button class="fw-bold btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">ลบ</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- end: table card-body -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ต้องการ Delete ใช่หรือไม่?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary">Delete</a>
            </div>
            </div>
        </div>
    </div>
    <!-- end: delete Modal -->

    <!-- start: JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <!-- end: JS -->
</body>

</html>