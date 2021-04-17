<?php
require_once("./DB/DBControler.php");
?>
<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', '24hstore');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $phone = $_POST['phone'];
    $fullname = $_POST['fullname'];

    if ($email == ""  || $password == "" || $repassword == "" || $phone == "" || $fullname == "") {
        echo "<div class='alert alert-danger' role='alert'>Vui lòng nhập đầu đủ thông tin!</div>";
    } else {
        $check = "select * from user";
        $result_check = mysqli_query($connection, $check);
        if ($result_check->num_rows > 0) {
            $row = mysqli_fetch_assoc($result_check);
            $check_email = $row['email'];
            $check_phone = $row['phone'];
            if ($email == $check_email) {
                echo "<div class='alert alert-danger' role='alert'>Email đã được đăng ký trước đó!</div>";
            } elseif ($phone == $check_phone) {
                echo "<div class='alert alert-danger' role='alert'>Số điện thoại đã được đăng ký trước đó!</div>";
            } elseif ($password != $repassword) {
                echo "<div class='alert alert-danger' role='alert'>Mật khẩu không khớp!</div>";
            } else {
                $sql = "insert into user (full_name,password,email,phone) values('$fullname','$password','$email','$phone')";
                mysqli_query($connection, $sql);               
                header("Location: login.php");
                echo "<div class='alert alert-danger' role='alert'>Đăng ký thành công</div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <p class="font-opensans font-size-12 text-black-50 m-0">Hoàng Nguyễn - Faculty of Information Technology (HUTECH)
                - (034) 44776653</p>
            <div class="font-rale font-size-14">
                <a href="#" class="px-3 border-right border-left text-dark">Tin Tức Công Nghệ</a>
                <!-- <a href="#" class="px-3 border-right border-left text-dark">Đăng nhập</a> -->
                <!-- <a href="#" class="px-3 border-right text-dark">Whishlist (0)</a> -->
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark color-red-bg">
            <a class="navbar-brand" href="/Shop_Mobile_PHP_MySQL/index.php">24H Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

    </header>
    <br> <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/Shop_Mobile_PHP_MySQL/index.php" class="color-red">Về trang chủ</a>
            </div>
            <div class="col-5">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email:</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFullname1">Họ và tên:</label>
                        <input type="text" name="fullname" class="form-control" id="exampleInputFullname1" placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone1">Họ và tên:</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputPhone1" placeholder="Điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật khẩu:</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRePassword1">Xác nhận mật khẩu:</label>
                        <input type="password" name="repassword" class="form-control" id="exampleInputRePassword1" placeholder="Xác nhận mật khẩu">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-blue">Đăng ký</button>
                    </div>
                    <div class="form-group">
                        <small>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></small>
                    </div>
                </form>
            </div>
            <div class="col">
            </div>
        </div>

    </div>
    <br>