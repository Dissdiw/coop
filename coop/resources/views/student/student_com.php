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
                <h5 class="fw-bold mb-0 me-auto">สถานประกอบการ</h5>
                <?php include('student_profile.php')?>
            </nav>
            <!-- end: Navbar -->
            
            <!-- start: card-body -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered" id="estaTable">
                            <thead>
                                <th>ลำดับ</th>
                                <th>สถานประกอบการ</th>
                                <th>ที่อยู่สถานประกอบการ</th>
                                <th>ค่าตอบแทน</th>
                                <th>รายละเอียด</th>
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
                                        <button class="fw-bold btn btn-primary" data-bs-toggle="modal" data-bs-target="<?php echo ("#detailModal" . $id); ?>">รายละเอียด</button>
                                    </td>

                                    <!-- start: detail Modal -->
                                    <div class="modal fade" id="<?php echo ("detailModal" . $id); ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="detailModalLabel">รายละเอียด</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center mb-3">
                                            <?php echo ($embedUrl); ?>
                                            </div>
                                            <form>
                                                <div class="mb-2">
                                                    <label for="esta" class="col-form-label">สถานประกอบการ:</label>
                                                    <input type="text" class="form-control" id="esta" value="<?php echo ($estra); ?>" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="esta-address" class="col-form-label">ที่อยู่สถานประกอบการ:</label>
                                                    <textarea class="form-control" id="esta-address" disabled><?php echo ($location); ?></textarea>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="esta-phoneno" class="col-form-label">เบอร์โทรศัพท์:</label>
                                                    <input type="text" class="form-control" id="esta-phoneno" value="<?php echo ($phone); ?>" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="esta-phoneno" class="col-form-label">ค่าตอบแทน:</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="pay" id="<?php echo ("inlineRadio1" . $id); ?>" value="มี" disabled>
                                                        <label class="form-check-label" for="inlineRadio1">มี</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="pay" id="<?php echo ("inlineRadio2" . $id); ?>" value="ไม่มี" disabled>
                                                        <label class="form-check-label" for="inlineRadio2">ไม่มี</label>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- end: detail Modal -->

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
    <script>let table = new DataTable('#estaTable');</script>
    <!-- table -->

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