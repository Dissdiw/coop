<?php
    session_start();
    require_once 'config/db.php';
    

    if (isset($_SESSION['admin_login'])) {
        $admin_id = $_SESSION['admin_login'];
        $query_stmt = $conn->prepare("SELECT * FROM users WHERE id = $admin_id");
        $query_stmt->execute();
        $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $studentid = $row['studentid'];
        $password = $row['password'];
        $email = $row['email'];
        $phoneno = $row['phoneno'];
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
                <h5 class="fw-bold mb-0 me-auto">สถานประกอบการ</h5>
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
                        <table class="table table-striped table-hover table-bordered" id="estaTable">
                            <thead>
                                <th>ลำดับ</th>
                                <th>สถานประกอบการ</th>
                                <th>ที่อยู่สถานประกอบการ</th>
                                <th>ค่าตอบแทน</th>
                                <th>จัดการ</th>
                            </thead>
                            <tbody>
                            <?php
                                $stmt = $conn->query('SELECT * FROM establishment');
                                $i = 1;
                                while ($row = $stmt->fetch()) {
                                    $id = $row['id'];
                                    $estra = $row['estra'];
                                    $location = $row['location'];
                                    $phone = $row['phone'];
                                    $pay = $row['pay'];
                                    $embedUrl = $row['embed_url']

                            ?>
                                <tr>
                                    <td><?php echo ($i);
                                        $i++ ?></td>
                                    <td><?php echo ($estra); ?></td>
                                    <td class="col-6"><?php echo ($location); ?></td>
                                    <td><?php echo ($pay); ?></td>
                                    <td>
                                        <button class="fw-bold btn btn-primary" data-bs-toggle="modal" data-bs-target="<?php echo ("#editModal" . $id); ?>">แก้ไข</button>
                                        <button class="fw-bold btn btn-danger" data-bs-toggle="modal" data-bs-target="<?php echo ("#deleteModal" . $id); ?>">ลบ</button>
                                    </td>

                                        <!-- start: edit Modal -->
                                        <div class="modal fade" id="<?php echo ("editModal" . $id); ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="editModalLabel">แก้ไข</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="admin_com_db.php" method="request">
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-center mb-3 url-holder">
                                                    <?php echo ($embedUrl); ?>
                                                    </div>
                                                        <div style="display: none;" class="alert alert-danger error-message" role="alert">กรุณาใส่ iframe จาก google map</div>
                                                        <div class="mb-2">
                                                            <label for="iframe" class="col-form-label">iframe:</label>
                                                            <input type="text" class="form-control url" id="embed-url" name="embed-url" value='<?php echo ($embedUrl); ?>'>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="esta" class="col-form-label">สถานประกอบการ:</label>
                                                            <input type="text" class="form-control" id="esta" name="esta" value="<?php echo ($estra); ?>" required>
                                                            <input type="text" class="form-control" id="esta" name="establish" value="<?php echo ($estra); ?>" hidden>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="esta-address" class="col-form-label">ที่อยู่สถานประกอบการ:</label>
                                                            <textarea class="form-control" id="esta-address" name="location" required><?php echo ($location); ?></textarea>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="esta-phoneno" class="col-form-label">เบอร์โทรศัพท์:</label>
                                                            <input type="text" class="form-control" id="esta-phoneno" name="phone" value="<?php echo ($phone); ?>" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="esta-p" class="col-form-label">ค่าตอบแทน:</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pay" id="<?php echo ("inlineRadio1" . $id); ?>" value="มี">
                                                                <label class="form-check-label" for="inlineRadio1">มี</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pay" id="<?php echo ("inlineRadio2" . $id); ?>" value="ไม่มี">
                                                                <label class="form-check-label" for="inlineRadio2">ไม่มี</label>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="saveChanges" >Save Changes</button>
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
                                                <form action="admin_com_db.php" method="request">
                                                    <div class="modal-body">
                                                        ต้องการ Delete ใช่หรือไม่?
                                                        <div class="form-group">
                                                            <input type="text" name="idDL" value="<?php echo ($id); ?>" hidden>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete" class="btn btn-primary">Delete</button>
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
            <h1 class="modal-title fs-5" id="addModalLabel">เพิ่มสถานประกอบการ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="admin_com_db.php?role=<?php $_SESSION['admin_login'] ?>" method="post">
                <div class="d-flex justify-content-center mb-3" id="url-holder">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.331165951846!2d100.51171287480611!3d13.819142195731423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b877800c9af%3A0xd754c571fc7177b!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lie4Lij4Liw4LiI4Lit4Lih4LmA4LiB4Lil4LmJ4Liy4Lie4Lij4Liw4LiZ4LiE4Lij4LmA4Lir4LiZ4Li34Lit!5e0!3m2!1sth!2sth!4v1692517936607!5m2!1sth!2sth" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="url" name="embed-url" placeholder="iframe" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="estra" name="estra" placeholder="สถานประกอบการ" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="location" name="location" placeholder="ที่อยู่สถานประกอบการ" required></textarea>
                </div>
                <div class="mb-3">
                    <!-- <label for="esta-phoneno" class="col-form-label">เบอร์โทรศัพท์:</label> -->
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" required>
                </div>
                <div class="mb-2">
                    <label for="esta-phoneno" class="col-form-label">ค่าตอบแทน:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pay" value="มี" required>
                        <label class="form-check-label" for="inlineRadio1">มี</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pay" value="ไม่มี" required>
                        <label class="form-check-label" for="inlineRadio2">ไม่มี</label>
                    </div>
                </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" name="submit" id="add-place">Submit</button>
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
    <script>let table = new DataTable('#estaTable');</script>
    <!-- table -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // var closeButtons = document.querySelectorAll('.e');
            // closeButtons.forEach(function(button) {
            //     button.addEventListener('click', function() {
            //         location.reload();
            //     });
            // });



            var url = document.querySelector('#url');
            var urlHolder = document.querySelector('#url-holder');
            var errorMessageElement = document.querySelector('#error-message');

            url.addEventListener('input', function() {

                if (url.value.includes('google.com')) {
                    urlHolder.innerHTML = url.value;

                    errorMessageElement.style.display = 'none';
                } else {
                    errorMessageElement.style.display = 'block';
                };

            });

            var urls = document.querySelectorAll('.url');
            var urlHolders = document.querySelectorAll('.url-holder');
            var errorMessage = document.querySelectorAll('.error-message');
            var i = 0;
            urlHolders.forEach(function(holder) {
                holder.innerHTML = urls[i].value;
                i++;
            });


            for (let z = 0; z < urls.length; z++) {
                urls[z].addEventListener('input', function() {
                    if (urls[z].value.includes('google.com')) {
                        urlHolders[z].innerHTML = urls[z].value;

                        errorMessage[z].style.display = 'none';
                    } else {
                        errorMessage[z].style.display = 'block';
                    };

                });
            }


            var inputPhones = document.querySelectorAll('.phone');

            inputPhones.forEach(function(inputPhone) {
                inputPhone.addEventListener('input', function() {
                    inputPhone.value = inputPhone.value.replace(/[^0-9]/g, '');
                });
            });

        });
    </script>
    <script>
        <?php
            $stmt = $conn->query('SELECT * FROM establishment');
            $i = 1;
            while ($row = $stmt->fetch()) {
                $id = $row['id'];
                $pay = $row['pay'];

        ?>
            console.log(<?php echo ($id) ?>);
            var inlineRadio1 = document.getElementById('<?php echo ("inlineRadio1" . $id); ?>');
            var inlineRadio2 = document.getElementById('<?php echo ("inlineRadio2" . $id); ?>');

            if (inlineRadio1.value == '<?php echo ($pay) ?>') {
                inlineRadio1.checked = true;
            } else if (inlineRadio2.value == '<?php echo ($pay) ?>') {
                inlineRadio2.checked = true;
            }
        <?php } ?>
    </script>
</body>

</html>