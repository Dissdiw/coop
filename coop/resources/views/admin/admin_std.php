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
                <h5 class="fw-bold mb-0 me-auto">นักศึกษา</h5>
                <?php include('admin_profile.php')?>
            </nav>
            <!-- end: Navbar -->
            
            <!-- start: card-body -->
            <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered" id="stdTable">
                            <thead>
                                <th>ลำดับ</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>Email</th>
                                <th>จัดการ</th>
                            </thead>
                            <tbody>
                            <?php
                                $stmt = $conn->query('SELECT * FROM users WHERE urole = "student"');
                                $i = 1;
                                while ($row = $stmt->fetch()) {
                                    $id = $row['id'];
                                    $studentid = $row['studentid'];
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $email = $row['email'];
                                    $password = $row['password'];
                                    $phoneno = $row['phoneno'];
                                    $urole = $row['urole']

                            ?>
                                <tr>
                                    <td><?php echo ($i);
                                        $i++ ?></td>
                                    <td><?php echo ($studentid); ?></td>
                                    <td><?php echo ($firstname . " " . $lastname ); ?></td>
                                    <td><?php echo ($email); ?></td>
                                    <td>
                                        <button class="fw-bold btn btn-primary" data-bs-toggle="modal" data-bs-target="<?php echo ("#editModal" . $id); ?>">แก้ไข</button>
                                        <button class="fw-bold btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">ลบ</button>
                                    </td>
                                    <!-- start: edit Modal -->
                                    <div class="modal fade" id="<?php echo ("editModal" . $id); ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel">แก้ไข</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="admin_std_db.php" method="request">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-center mb-3">
                                                        <img class="edit-profile" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="image">
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <input type="file" id="file" name="file" accept="application/zip,application/x-rar-compressed" >
                                                        </div>
                                                        <div class="duo">
                                                            <div class="me-4 mb-3">
                                                            <label for="firstname" class="col-form-label">ชื่อ:</label>
                                                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo ($firstname); ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="lastname" class="col-form-label">นามสกุล:</label>
                                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo ($lastname); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="duo">
                                                            <div class="me-4 mb-3">
                                                            <label for="personnelid" class="col-form-label">รหัสนักศึกษา:</label>
                                                            <input type="text" class="form-control" id="personnelid" name="studentid" value="<?php echo ($studentid); ?>">
                                                            <input type="text" class="form-control" id="personnelid" name="studentno" value="<?php echo ($studentid); ?>" hidden>
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="password" class="col-form-label">Password:</label>
                                                            <input type="text" class="form-control" id="password" name="password" value="<?php echo ($password); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="duo">
                                                            <div class="me-4 mb-3">
                                                            <label for="email" class="col-form-label">Email:</label>
                                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo ($email); ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="phoneno" class="col-form-label">เบอร์โทรศัพท์:</label>
                                                            <input type="text" class="form-control" id="phoneno" name="phoneno" value="<?php echo ($phoneno); ?>">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="saveChanges">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end: edit Modal -->

                                    <!-- start: delete Modal -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="admin_std_db.php" method="request">
                                                <div class="modal-body">
                                                    ต้องการ Delete ใช่หรือไม่?
                                                    <input type="text" name="idDL" value="<?php echo ($id); ?>" hidden>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end: delete Modal -->
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

    <!-- start: JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <!-- end: JS -->
    <!-- table -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#stdTable');</script>
    <!-- table -->
</body>

</html>