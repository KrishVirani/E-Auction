<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    </head>
    <body>

        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "e-Auction";

        $c = mysqli_connect($hostname, $username, $password, $database);
        if (!$c) {
            echo '<script>alert("Some Went Wrong While Connecting server.");</script>';
        } else {
            echo '<script>alert("Connection Succesfully");</script>';
            $email = '22bmiit142@gmail.com';
            $pass = '$2y$10$ll5xxrjSP8gNR';
            $qu = "select Password from tblUser where Email='$email'";
            if (!$qu) {
                echo '<script>alert("User Name not Found");</script>';
            }
            while ($r = mysqli_fetch_row($qu)) {
                $dpassword = $r[0];
            }
            if (password_verify($pass, $dpassword)) {
                echo '<script>alert("Login Succesfully");</script>';
            } else {
                echo '<script>alert("Wromg Password");</script>';
            }

            $q = mysqli_query($c, $qu);

            if (!$q) {
                $e = mysqli_error($c);
                echo "<script>alert('error occur');</script>";
            } else {
                echo "<script>alert('User data stored successfully.');</script>";
            }

            mysqli_close($c);
        }
        ?>
    </body>
</html>