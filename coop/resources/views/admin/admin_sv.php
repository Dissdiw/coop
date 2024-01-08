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
                <h5 class="fw-bold mb-0 me-auto">จัดการนิเทศ</h5>
                <?php include('admin_profile.php')?>
            </nav>
            <!-- end: Navbar -->

             <!-- start: card-body -->
             <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered" id="svTable">
                            <thead>
                                <th>ลำดับ</th>
                                <th>รหัสบุคลากร</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>จัดการ</th>
                            </thead>
                            <tbody>
                            <?php
                                $stmt = $conn->query('SELECT * FROM users WHERE urole = "teacher"');
                                $i = 1;
                                while ($row = $stmt->fetch()) {
                                    $staff_id = $row['studentid'];
                                    $staff_name = $row['firstname'];
                                    $staff_surname = $row['lastname'];
                            ?>
                                <tr>
                                    <td><?php echo ($i);
                                        $i++ ?></td>
                                    <td><?php echo($staff_id); ?></td>
                                    <td><?php echo($staff_name . " " . $staff_surname); ?></td>
                                    <td>
                                        <button class="fw-bold btn btn-primary" data-bs-toggle="modal" data-bs-target="#manageModal">จัดการ</button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- end: card-body -->

            
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: manage Modal -->
    <div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header float-right d-flex">
                    <h1 class="modal-title fs-5" id="manageModalLabel">จัดการนิเทศ:ดีใจ จังเลย</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="select1">สถานประกอบการ:</label>
                    <div class="row g-3">
                        <div class="col-7">
                            <select class="form-select" name="esta" id="select_box">
                                <option selected>KFC</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-select" name="year">
                                <option selected>2566</option>
                            </select>
                        </div>
                        <div class="col">
                            <button class="fw-bold btn btn-primary">เพิ่ม</button>
                        </div>
                    </div>
                    <form>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <th>ลำดับ</th>
                                <th>สถานประกอบการ</th>
                                <th>จัดการ</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>KFC</td>
                                    <td><button class="fw-bold btn btn-danger">ลบ</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end: manage Modal -->


    <!-- start: JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <!-- end: JS -->
    <!-- table -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#svTable');</script>
    <!-- table -->
</body>

</html>