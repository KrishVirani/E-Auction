<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Login Test</title>
</head>
<body>
    <section class="account-section padding-bottom">
            <div class="container">
                <div class="account-wrapper mt--100 mt-lg--440">
                    <div class="left-side">
                        <div class="section-header" data-aos="zoom-out-down" data-aos-duration="1200">
                            <h2 class="title">HI, THERE</h2>
                            <p>You can log in to your Sbidu account here.</p>
                        </div>
                        <ul class="login-with">
                            <li>
                                <a href="#0"><i class="fab fa-facebook"></i>Log in with Facebook</a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-google-plus"></i>Log in with Google</a>
                            </li>
                        </ul>
                        <div class="or">
                            <span>Or</span>
                        </div>
                        <form class="login-form" method="POST">
                            <div class="form-group mb-30">
                                <label for="login-email"><i class="far fa-envelope"></i></label>
                                <input type="text" id="login-email" placeholder="Email Address" name="txtemail"
                                       <?php if (isset($_POST['email'])) echo 'value="' . $_REQUEST['email'] . '"'; ?>>
                            </div>
                            <div class="form-group">
                                <label for="login-pass"><i class="fas fa-lock"></i></label>
                                <input type="password" id="login-pass" placeholder="Password" name="txtpass">
                                <span class="pass-type"><i class="fas fa-eye"></i></span>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <a href="#0">Forgot Password?</a>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="custom-button" name="btnlogin">LOG IN</button>
                            </div>
                        </form>
                    </div>
                    <div class="right-side cl-white">
                        <div class="section-header mb-0">
                            <h3 class="title mt-0">NEW HERE?</h3>
                            <p>Sign up and create your Account</p>
                            <a href="sign-up.php" class="custom-button transparent">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if (isset($_POST['btnlogin'])) {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "e-Auction";
            
            $email=$_POST['txtemail'];
            $password=$_POST['txtpass'];
            
            $c = mysqli_connect($hostname, $username, $password, $database);
            $qu = "SELECT Password FROM tblusers WHERE Email='$email'";
            $q = mysqli_query($c, $qu);

            if (!$q) {
                echo '<script>alert("Query Error: ' . mysqli_error($c) . '");</script>';
            } else {
                // Check if user with given email exists
                if (mysqli_num_rows($q) > 0) {
                    // Fetch the row as an associative array
                    $row = mysqli_fetch_assoc($q);
                    // Extract the hashed password from the fetched row
                    $dpassword = $row['Password'];

                    // Verify the entered password with the hashed password
                    if (password_verify($password, $dpassword)) {
                        echo '<script>alert("Login Successful");</script>';
                    } else {
                        echo '<script>alert("Wrong Password");</script>';
                    }
                } else {
                    echo '<script>alert("User not found");</script>';
                }
            }




            mysqli_close($c);
        }
        ?>
</body>
</html>
