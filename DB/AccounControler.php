<?php
session_start();
require_once("DBControler.php");
require_once("./DB/AccounControler.php");
$email = "";
$fullname = "";

//if user signup button
if (isset($_POST['signup'])) {
    $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $repassword = mysqli_real_escape_string($connection, $_POST['repassword']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    if ($email == ""  || $password == "" || $repassword == "" || $phone == "" || $fullname == "") {
        echo "<div class='alert alert-danger' role='alert'>Vui lòng nhập đầu đủ thông tin!</div>";
    } else {
        $email_check = "SELECT * FROM user";
        $res = mysqli_query($connection, $email_check);
        if ($res->num_rows > 0) {
            // $errors['email'] = "Email that you have entered is already exist!";
            $row = mysqli_fetch_assoc($res);
            $check_email = $row['email'];
            $check_phone = $row['phone'];
            if ($email == $check_email) {
                echo "<div class='alert alert-danger' role='alert'>Email đã được đăng ký trước đó!</div>";
            } elseif ($phone == $check_phone) {
                echo "<div class='alert alert-danger' role='alert'>Số điện thoại đã được đăng ký trước đó!</div>";
            } elseif ($password != $repassword) {
                echo "<div class='alert alert-danger' role='alert'>Mật khẩu không khớp!</div>";
            } else {
                $code = rand(999999, 111111);
                $status = "notverified";
                $sql = "insert into user (full_name,password,email,code,phone,status) values('$fullname','$password','$email','$code','$phone','$status')";
                $data_check = mysqli_query($connection, $sql);
                if ($data_check) {
                    $subject = "Email Verification Code";
                    $message = "Your verification code is $code";
                    $sender = "From: noreply@gmail.com";                   
                    if (mail($email, $subject, $message, $sender)) {
                        echo "<div class='alert alert-danger' role='alert'>Đã gửi email chứa mã xác minh tới - '$email'</div>";
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        header('location: verifi_email.php');
                        exit();
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Gửi mail xác nhận thất bại</div>";
                    }
                }
            }
        }
    }
}
//if user click verification code submit button
if (isset($_POST['checkcode_signup'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($connection, $_POST['otp']);
    $check_code = "SELECT * FROM user WHERE code = $otp_code";
    $code_res = mysqli_query($connection, $check_code);
    if ($code_res->num_rows > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE user SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($connection, $update_otp);
        if ($update_res) {
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            header('location: index.php');
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Xác minh thất bại!</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Mã xác minh không chính xác!</div>";
    }
}

//if user click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $check_email = "SELECT * FROM user WHERE email = '$email' and password='$password'";
    $res = mysqli_query($connection, $check_email);
    if ($res->num_rows > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $_SESSION['userid'] = $fetch['user_id'];
        $_SESSION['fullname'] = $fetch['full_name'];
        $_SESSION['phone'] = $fetch['phone'];
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Đăng nhập thất bại!</div>";
    }
}

//if user click continue button in forgot password form
if (isset($_POST['forgotpwd'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $check_email = "SELECT * FROM user WHERE email='$email'";
    $run_sql = mysqli_query($connection, $check_email);
    if ($run_sql->num_rows > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE user SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($connection, $insert_code);
        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: noreply@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                echo "<div class='alert alert-danger' role='alert'>Đã gửi mã xác minh khôi phục tài khoản tới email của bạn - '$email'</div>";
                $_SESSION['email'] = $email;
                header('location: check_reset.php');
                exit();
            } else {
                echo "<div class='alert alert-danger' role='alert'>Gửi email xác minh thất bại!</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Có gì đó không đúng!</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Email không tồn tại!</div>";
    }
}

//if user click check reset otp button
if (isset($_POST['checkcode_reset'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($connection, $_POST['otp']);
    $check_code = "SELECT * FROM user WHERE code = $otp_code";
    $code_res = mysqli_query($connection, $check_code);
    if ($code_res->num_rows > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        echo "<div class='alert alert-danger' role='alert'>Tạo mật khẩu mới mà bạn chưa từng sử dụng trên website này.</div>";
        header('location: new_pwd.php');
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Mã xác minh không chính xác!</div>";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $repassword = mysqli_real_escape_string($connection, $_POST['repassword']);
    if ($password !== $repassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        // $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE user SET code = $code, password = '$password' WHERE email = '$email'";
        $run_query = mysqli_query($connection, $update_pass);
        if ($run_query) {
            echo "<div class='alert alert-danger' role='alert'>Đổi mật khẩu thành công</div>";
            header('Location: login.php');
        } else {
            echo "<div class='alert alert-danger' role='alert'>Khôi phục thất bại</div>";
        }
    }
}
