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
   
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">iptm</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item active">
                <a href="student.php">
                    <i class="ri-flow-chart sidebar-menu-item-icon"></i>
                    ขั้นตอนสหกิจศึกษา
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="student_com.php">
                    <i class="ri-search-line sidebar-menu-item-icon"></i>
                    ค้นหาสถานประกอบการ
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="student_regis_ce.php">
                    <i class="ri-user-add-line sidebar-menu-item-icon"></i>
                    สมัครโครงการสหกิจ
                </a> 
            </li>
            <li class="sidebar-menu-item" id="hide">
                <a href="student_rp_ce.php">
                    <i class="ri-file-add-line sidebar-menu-item-icon"></i>
                    รายงานปฏิบัติงานสหกิจ
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>

    <!-- end: Sidebar -->


    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">ขั้นตอนสหกิจศึกษา</h5>
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 d-none d-sm-block"></span>
                        <img class="navbar-profile-image" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
                    </ul>
                </div>

                <!-- start: profile Modal -->
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="profileModalLabel">Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center mb-3">
                        <img class="edit-profile" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="image">
                        </div>
                        <div class="d-flex justify-content-center">
                        <!-- <button class="btn btn-primary mb-2">Browse</button> -->
                        <input type="file" id="file" name="file" accept="application/zip,application/x-rar-compressed" required>
                        </div>
                        <form>
                        <div class="duo">
                            <div class="me-4 mb-3">
                            <label for="firstname" class="col-form-label">ชื่อ:</label>
                            <input type="text" class="form-control" id="firstname" value="">
                            </div>
                            <div class="mb-3">
                            <label for="lastname" class="col-form-label">นามสกุล:</label>
                            <input type="text" class="form-control" id="lastname">
                            </div>
                        </div>
                        <div class="duo">
                            <div class="me-4 mb-3">
                            <label for="personnelid" class="col-form-label">รหัสประจำตัว:</label>
                            <input type="text" class="form-control" id="personnelid" disabled>
                            </div>
                            <div class="mb-3">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="text" class="form-control" id="password">
                            </div>
                        </div>
                        <div class="duo">
                            <div class="me-4 mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                            <label for="phoneno" class="col-form-label">เบอร์โทรศัพท์:</label>
                            <input type="text" class="form-control" id="phoneno">
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end: profile Modal -->

                <!-- start: logout Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="logoutModalLabel">Logout</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ต้องการ Logout ใช่หรือไม่?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="index.php" class="btn btn-primary">Logout</a>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end: logout Modal -->
            </nav>
            <!-- end: Navbar -->

            <!-- start: card-body -->
            <div class="d-flex justify-content-center">
                <div class="card border-0 shadow-sm mt-3" style="width:45rem;">
                    <div class="card-body">
                        <img src="" width="100%">
                    </div>
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

</body>

</html>