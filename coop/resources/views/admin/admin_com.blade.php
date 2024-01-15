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
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
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
    
    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
            <div class="d-flex align-items-center p-3">
                <a href="admin.php" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">iptm</a>
                <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
            </div>
            <ul class="sidebar-menu p-3 m-0 mb-0">
                <li class="sidebar-menu-item">
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="ri-flow-chart sidebar-menu-item-icon"></i>
                        ขั้นตอนสหกิจศึกษา
                    </a>
                </li>
                <li class="sidebar-menu-item active">
                    <a href="{{ url('/admin/company') }}">
                        <i class="ri-search-line sidebar-menu-item-icon"></i>
                        ข้อมูลสถานประกอบการ
                    </a>
                    
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ url('/admin/student') }}">
                        <i class="ri-user-search-line sidebar-menu-item-icon"></i>
                        ข้อมูลนักศึกษา
                    </a>
                    
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ url('/admin/personnel') }}">
                        <i class="ri-user-search-line sidebar-menu-item-icon"></i>
                        ข้อมูลบุคลากร
                    </a>
                    
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ url('/admin/regisce') }}">
                        <i class="ri-user-add-line sidebar-menu-item-icon"></i>
                        สมัครโครงการสหกิจ
                    </a>
                    
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ url('/admin/report') }}">
                        <i class="ri-file-add-line sidebar-menu-item-icon"></i>
                        รายงานปฏิบัติงานสหกิจ
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ url('/admin/sv') }}">
                        <i class="ri-settings-4-line sidebar-menu-item-icon"></i>
                        นิเทศ
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
                <h5 class="fw-bold mb-0 me-auto">สถานประกอบการ</h5>
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                        <div class="d-flex justify-content-center mb-3 preview">
                            <img class="edit-profile" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" id="img" alt="preview">
                        </div>
                        <div class="d-flex justify-content-center">
                            <!-- <button class="btn btn-primary mb-2">Browse</button> -->
                            <input type="file" id="fileImg" name="fileImg" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <form>
                            <div class="duo">
                            <div class="me-4 mb-3">
                                <label for="firstname" class="col-form-label">ชื่อ:</label>
                                <input type="text" class="form-control" id="firstname" value="">
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="col-form-label">นามสกุล:</label>
                                <input type="text" class="form-control" id="lastname" value="">
                            </div>
                            </div>
                            <div class="duo">
                            <div class="me-4 mb-3">
                                <label for="personnelid" class="col-form-label">รหัสประจำตัว:</label>
                                <input type="text" class="form-control" id="personnelid" value="" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="col-form-label">Password:</label>
                                <input type="text" class="form-control" id="password" value="">
                            </div>
                            </div>
                            <div class="duo">
                            <div class="me-4 mb-3">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="text" class="form-control" id="email" value="">
                            </div>
                            <div class="mb-3">
                                <label for="phoneno" class="col-form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" class="form-control" id="phoneno" value="">
                            </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
                        </div>
                        </div>
                    </form>
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
                         <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end: logout Modal -->

            </nav>
            <!-- end: Navbar -->

            <!-- start: Add data -->
                <button class="fw-bold mt-4 ms-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">เพิ่มข้อมูล</button>
            <!-- end: Add data -->

            <!-- start: card-body -->
                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered" id="estaTable">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>สถานประกอบการ</th>
                                    <th>ที่อยู่สถานประกอบการ</th>
                                    <th>ค่าตอบแทน</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="col-6"></td>
                                    <td></td>
                                    <td>
                                        <button class="fw-bold btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">แก้ไข</button>
                                        <button class="fw-bold btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">ลบ</button>
                                    </td>
                                </tr>
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
            <form action="" method="">
                <div class="d-flex justify-content-center mb-3" id="url-holder">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.331165951846!2d100.51171287480611!3d13.819142195731423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b877800c9af%3A0xd754c571fc7177b!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lie4Lij4Liw4LiI4Lit4Lih4LmA4LiB4Lil4LmJ4Liy4Lie4Lij4Liw4LiZ4LiE4Lij4LmA4Lir4LiZ4Li34Lit!5e0!3m2!1sth!2sth!4v1692517936607!5m2!1sth!2sth" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="url" name="embed-url" placeholder="iframe" >
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="estra" name="estra" placeholder="สถานประกอบการ" >
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="location" name="location" placeholder="ที่อยู่สถานประกอบการ" ></textarea>
                </div>
                <div class="mb-3">
                    <!-- <label for="esta-phoneno" class="col-form-label">เบอร์โทรศัพท์:</label> -->
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" >
                </div>
                <div class="mb-2">
                    <label for="esta-phoneno" class="col-form-label">ค่าตอบแทน:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pay" value="มี" >
                        <label class="form-check-label" for="inlineRadio1">มี</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pay" value="ไม่มี" >
                        <label class="form-check-label" for="inlineRadio2">ไม่มี</label>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit" id="add-place">Submit</button>
        </div>
        </div>
    </div>
    </div>
    <!-- end: add Modal -->

    <!-- start: edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="editModalLabel">แก้ไข</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="">
            <div class="modal-body">
                <div class="d-flex justify-content-center mb-3" id="url-holder">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.331165951846!2d100.51171287480611!3d13.819142195731423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b877800c9af%3A0xd754c571fc7177b!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lie4Lij4Liw4LiI4Lit4Lih4LmA4LiB4Lil4LmJ4Liy4Lie4Lij4Liw4LiZ4LiE4Lij4LmA4Lir4LiZ4Li34Lit!5e0!3m2!1sth!2sth!4v1692517936607!5m2!1sth!2sth" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="mb-2">
                    <label for="iframe" class="col-form-label">iframe:</label>
                    <input type="text" class="form-control url" id="embed-url" name="embed-url" value=''>
                </div>
                <div class="mb-2">
                    <label for="esta" class="col-form-label">สถานประกอบการ:</label>
                    <input type="text" class="form-control" id="esta" name="esta" value="" >
                </div>
                <div class="mb-2">
                    <label for="esta-address" class="col-form-label">ที่อยู่สถานประกอบการ:</label>
                    <textarea class="form-control" id="esta-address" name="location"></textarea>
                </div>
                <div class="mb-2">
                    <label for="esta-phoneno" class="col-form-label">เบอร์โทรศัพท์:</label>
                    <input type="text" class="form-control" id="esta-phoneno" name="phone" value="" >
                </div>
                <div class="mb-2">
                    <label for="esta-p" class="col-form-label">ค่าตอบแทน:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pay" id="" value="มี">
                        <label class="form-check-label" for="inlineRadio1">มี</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pay" id="" value="ไม่มี">
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
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="">
                <div class="modal-body">
                    ต้องการ Delete ใช่หรือไม่?
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


    <!-- start: JS -->
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/script.js')}}"></script>
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
    
</body>

</html>