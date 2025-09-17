<?php
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include("../Includes/db.php");

// Check database connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buyer login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        /* Your existing CSS styles */
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
        /* Add your styles here */
    </style>
</head>

<body>

    <main class="my-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border border-dark" style="background-color:#292b2c">
                            <h4 style="font-style:bold;color:goldenrod;text-align:left">Login</h4>
                        </div>
                        <div class="card-body border border-dark">
                            <form name="my-form" action="BuyerLogin.php" method="post">

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right"><b><i class="fas fa-phone-alt mr-2"></i>Phone Number</b></label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control border border-dark" name="phonenumber" placeholder="Phone Number" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="p1" class="col-md-4 col-form-label text-md-right"><b><i class="fas fa-lock mr-2"></i>Password</b></label>
                                    <div class="col-md-6">
                                        <input id="p1" class="form-control border border-dark" type="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn" style="background-color:#292b2c;color:goldenrod" name="login" value="Login">
                                        Login
                                    </button>
                                </div>
                                <br>
                                <div class="col-md-6 offset-md-4">
                                    <label id="forgotPassword"><a id='link' href="BuyerForgotPassword.php"><b style="color:black"> Forgot your password ?</b></a></label>
                                    <br>
                                    <label id="account"><a id='link' href="BuyerRegistration.php"><b style="color:black">Create New Account</b></a></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>

<?php
if (isset($_POST['login'])) {
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Encrypt the password for comparison
    $ciphering = "AES-128-CTR";
    $options = 0;
    $encryption_iv = '2345678910111211';
    $encryption_key = "DE";

    $encryption = openssl_encrypt(
        $password,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );

    // Check credentials in the database
    $query = "SELECT * FROM buyerregistration WHERE buyer_phone = '$phonenumber' AND buyer_password = '$encryption'";
    $run_query = mysqli_query($con, $query);

    // Check if the query was successful
    if (!$run_query) {
        die("Query failed: " . mysqli_error($con));
    }

    $count_rows = mysqli_num_rows($run_query);
    
    if ($count_rows == 0) {
        echo "<script>alert('Please Enter Valid Details');</script>";
        echo "<script>window.open('BuyerLogin.php','_self')</script>";
    } else {
        $row = mysqli_fetch_array($run_query);
        $id = $row['buyer_id'];

        // Set session variable
        $_SESSION['phonenumber'] = $phonenumber;

        // Redirect to the buyer portal
        echo "<script>window.open('../BuyerPortal2/bhome.php','_self')</script>";
    }
}
?>
