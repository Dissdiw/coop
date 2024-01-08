<?php

  require_once 'config/db.php';
  if(isset($_SESSION['teacher_login'])){
          $teacher_id = $_SESSION['teacher_login'];
          $query_stmt = $conn->prepare("SELECT * FROM users WHERE studentid = $teacher_id");
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

<div class="dropdown">
    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-2 d-none d-sm-block"><?php echo($firstname . " " . $lastname) ?></span>
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
              <input type="text" class="form-control" id="firstname">
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