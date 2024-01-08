<x-regis-layout>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="firstname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="firstname" id="firstname" placeholder="Firstname"/>
                            </div>
                            <div class="form-group">
                                <label for="lastname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lastname" id="lastname" placeholder="Lastname"/>
                            </div>
                            <div class="form-group">
                                <label for="studentid"><i class="zmdi zmdi-account-o material-icons-name"></i></label>
                                <input type="text" name="studentid" id="studentid" placeholder="Student ID"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <input type="text" name="phoneno" id="phone" placeholder="Phone no."/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div>
                        <div class="signup-image">
                            <figure><img src="img/undraw_profile.svg" alt="sign up image"></figure>
                        </div>
                        <input type="file" class="browse form-upload" id="img" name="img" accept="application/zip,application/x-rar-compressed" required>
                        <a href="index.php" class="signup-image-link">I am already member</a>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/alert.js"></script>
</body>
<x-regis-layout>
