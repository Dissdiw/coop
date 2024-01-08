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
                <h5 class="fw-bold mb-0 me-auto">บุคลากร</h5>
                <?php include('admin_profile.php')?>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Add data -->
            <button class="fw-bold mt-4 ms-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">เพิ่มข้อมูล</button>
            <!-- end: Add data -->

            <!-- start: Alert message -->
                <?php if(isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </div>
                <?php  } ?>
                <?php if(isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success mt-2" role="alert">
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </div>
                <?php  } ?>
                <?php if(isset($_SESSION['warning'])) { ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        <?php
                            echo $_SESSION['warning'];
                            unset($_SESSION['warning']);
                        ?>
                    </div>
                <?php  } ?>
            <!-- end: Alert message -->
            
            <!-- start: card-body -->
            <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered" id="personnelTable">
                            <thead>
                                <th>ลำดับ</th>
                                <th>รหัสบุคลากร</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>จัดการ</th>
                            </thead>
                            <tbody>
                            <?php
                                $stmt = $conn->query('SELECT * FROM users WHERE urole = "admin" OR urole = "teacher"');
                                $i = 1;
                                while ($row = $stmt->fetch()) {
                                    $id = $row['id'];
                                    $staff_id = $row['studentid'];
                                    $staff_name = $row['firstname'];
                                    $staff_surname = $row['lastname'];
                                    $staff_phone = $row['phoneno'];
                                    $staff_email = $row['email'];
                                    $staff_role = $row['urole'];
                                    $staff_password = $row['password'];
                            ?>
                                <tr>
                                    <td><?php echo ($i);
                                        $i++ ?></td>
                                    <td><?php echo($staff_id); ?> </td>
                                    <td><?php echo($staff_name . " " . $staff_surname); ?></td>
                                    <td><?php echo($staff_email); ?></td>
                                    <td><?php echo($staff_role); ?> </td>
                                    <td>
                                        <button class="fw-bold btn btn-primary" data-bs-toggle="modal" data-bs-target="<?php echo ("#editModal" . $staff_id); ?>">แก้ไข</button>
                                        <button class="fw-bold btn btn-danger" data-bs-toggle="modal" data-bs-target="<?php echo ("#deleteModal" . $id); ?>">ลบ</button>
                                    </td>

                                    <!-- start: edit Modal -->
                                    <div class="modal fade" id="<?php echo ("editModal" . $staff_id); ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel">Profile</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="admin_personnel_db.php" method="request">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-center mb-3">
                                                        <img class="edit-profile" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="image">
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <input type="file" id="file" name="file" accept="application/zip,application/x-rar-compressed">
                                                        </div>
                                                            <div class="duo">
                                                                <div class="me-4 mb-3">
                                                                <label for="firstname" class="col-form-label">ชื่อ:</label>
                                                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo($staff_name); ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="lastname" class="col-form-label">นามสกุล:</label>
                                                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo($staff_surname); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="duo">
                                                                <div class="me-4 mb-3">
                                                                <label for="personnelid" class="col-form-label">รหัสประจำตัว:</label>
                                                                <input type="text" class="form-control" id="personnelid" name="personnelid" value="<?php echo($staff_id); ?>" required5>
                                                                <input type="text" class="form-control" id="personnelid" name="personid" value="<?php echo($staff_id); ?>" hidden>
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="password" class="col-form-label">Password:</label>
                                                                <input type="text" class="form-control" id="password" name="password" value="<?php echo($staff_password); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="duo">
                                                                <div class="me-4 mb-3">
                                                                <label for="email" class="col-form-label">Email:</label>
                                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo($staff_email); ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="phoneno" class="col-form-label">เบอร์โทรศัพท์:</label>
                                                                <input type="text" class="form-control" id="phoneno" name="phoneno" value="<?php echo($staff_phone); ?> ">
                                                                </div>
                                                            </div>
                                                            <label for="esta-phoneno" class="col-form-label">Role:</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="urole" id="<?php echo ("inlineRadio1" . $id); ?>" value="teacher">
                                                                <label class="form-check-label" for="inlineRadio1">Teacher</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="urole" id="<?php echo ("inlineRadio2" . $id); ?>" value="admin">
                                                                <label class="form-check-label" for="inlineRadio2">Admin</label>
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
                                    <div class="modal fade" id="<?php echo ("deleteModal" . $id) ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="admin_personnel_db.php" method="request">
                                                    <div class="modal-body">
                                                        ต้องการ Delete ใช่หรือไม่?
                                                        <div class="form-group">
                                                            <input type="text" name="staffidDL" value="<?php echo ($id); ?>" hidden>
                                                        </div>
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

    <!-- start: add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="admin_personnel_db.php?role=<?php $_SESSION['admin_login'] ?>" method="post">
                    <div class="modal-body">
                        <div class="d-flex justify-content-center mb-3">
                        <img class="edit-profile" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="image">
                        </div>
                        <div class="d-flex justify-content-center">
                        <input type="file" id="file" name="file" accept="application/zip,application/x-rar-compressed">
                        </div>
                        <div class="duo">
                            <div class="me-4 mb-3">
                            <label for="firstname" class="col-form-label">ชื่อ:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="mb-3">
                            <label for="lastname" class="col-form-label">นามสกุล:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                        </div>
                        <div class="duo">
                            <div class="me-4 mb-3">
                            <label for="personnelid" class="col-form-label">รหัสประจำตัว:</label>
                            <input type="text" class="form-control" id="personnelid" name="personnelid" required>
                            </div>
                            <div class="mb-3">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="duo">
                            <div class="me-4 mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                            <label for="phoneno" class="col-form-label">เบอร์โทรศัพท์:</label>
                            <input type="text" class="form-control" id="phoneno" name="phoneno" required>
                            </div>
                        </div>
                        <label for="esta-phoneno" class="col-form-label">Role:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urole" value="teacher">
                            <label class="form-check-label" for="inlineRadio1">Teacher</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urole" value="admin">
                            <label class="form-check-label" for="inlineRadio2">Admin</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end: add Modal -->

    <!-- start: JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <!-- end: JS -->
    <!-- table -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#personnelTable');</script>
    <!-- table -->
    <script>
        <?php
            $stmt = $conn->query('SELECT * FROM users WHERE (urole = "admin" OR urole = "teacher" )');
            $i = 1;
            while ($row = $stmt->fetch()) {
                $id = $row['id'];
                $urole = $row['urole'];

        ?>
            console.log(<?php echo ($id) ?>);
            var inlineRadio1 = document.getElementById('<?php echo ("inlineRadio1" . $id); ?>');
            var inlineRadio2 = document.getElementById('<?php echo ("inlineRadio2" . $id); ?>');

            if (inlineRadio1.value == '<?php echo ($urole) ?>') {
                inlineRadio1.checked = true;
            } else if (inlineRadio2.value == '<?php echo ($urole) ?>') {
                inlineRadio2.checked = true;
            }
        <?php } ?>
            

    </script>
</body>

</html>