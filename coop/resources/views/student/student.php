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
                <h5 class="fw-bold mb-0 me-auto">ขั้นตอนสหกิจศึกษา</h5>
                <?php include('student_profile.php')?>
            </nav>
            <!-- end: Navbar -->

            <!-- start: card-body -->
            <?php
            $query = $conn->query("SELECT * FROM image");
            if ($query->rowCount() > 0) {
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $imageURL = 'uploads/' . $row['file_name'];
                 ?>
                <div class="d-flex justify-content-center">
                    <div class="card border-0 shadow-sm mt-3" style="width:45rem;">
                        <div class="card-body">
                            <img src="<?php echo $imageURL ?>" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <?php
                    } ?>
            <?php } else { ?>
                <p>No image found....</p>
            <?php } ?>
            <!-- end: card-body -->
            
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <!-- end: JS -->\

    <?php include('hidePage.php'); ?>

</body>

</html>