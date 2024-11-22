<?php
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mnumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Server-side validation
    if (!preg_match("/^[a-zA-Z\s]+$/", $fname)) {
        $_SESSION['msg'] = "Full Name must contain only letters and spaces.";
    } elseif (!preg_match("/^[0-9]{10}$/", $mnumber)) {
        $_SESSION['msg'] = "Mobile number must contain exactly 10 digits.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['msg'] = "Please enter a valid email address.";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{7,}$/", $password)) {
        $_SESSION['msg'] = "Password must be more than 6 characters long, with at least one uppercase letter and one special character.";
    } else {
        $password = md5($password); // Hash the password after validation
        $sql = "INSERT INTO tblusers (FullName, MobileNumber, EmailId, Password) VALUES (:fname, :mnumber, :email, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':mnumber', $mnumber, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $_SESSION['msg'] = "You are successfully registered. Now you can login.";
            header("Location: thank_you.php");
        } else {
            $_SESSION['msg'] = "Something went wrong. Please try again.";
            header('location:thankyou.php');
        }
    }
    // echo "<script>alert('" . $_SESSION['msg'] . "');</script>";  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Validate Full Name field
            document.getElementById('fname').addEventListener('input', function(event) {
                const input = event.target;
                const validCharacters = /^[a-zA-Z\s]*$/;
                if (!validCharacters.test(input.value)) {
                    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
                }
            });

            // Validate Mobile Number field
            document.getElementById('mobilenumber').addEventListener('input', function(event) {
                const input = event.target;
                const validNumbers = /^[0-9]*$/;
                if (!validNumbers.test(input.value)) {
                    input.value = input.value.replace(/[^0-9]/g, '');
                }
            });

            // Check email availability and format
            document.getElementById('email').addEventListener('blur', function() {
                checkAvailability();
            });

            // Validate Password field
            document.getElementById('password').addEventListener('input', function(event) {
                const input = event.target;
                const passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{7,}$/;
                const message = document.getElementById('password-validation-message');
                if (!passwordRegex.test(input.value)) {
                    message.textContent = "Password must be more than 6 characters long, with at least one uppercase letter and one special character.";
                } else {
                    message.textContent = "";
                }
            });
        });

        function checkAvailability() {
            var email = document.getElementById('email').value;
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailRegex.test(email)) {
                document.getElementById('user-availability-status').innerHTML = "Please enter a valid email address.";
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <section class="login">
                    <div class="login-grids">
                        <div class="login-right">
                            <form name="signup" method="post">
                                <h3>Create your account</h3>
                                <input type="text" value="" placeholder="Full Name" name="fname" id="fname" autocomplete="off" required="">
                                <input type="text" value="" placeholder="Mobile number" maxlength="10" name="mobilenumber" id="mobilenumber" autocomplete="off" required="">
                                <input type="text" value="" placeholder="Email id" name="email" id="email" autocomplete="off" required="">
                                <span id="user-availability-status" style="font-size:12px;"></span>
                                <input type="password" value="" placeholder="Password" name="password" id="password" required="">
                                <span id="password-validation-message" style="font-size:12px;color:red;"></span>
                                <input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
