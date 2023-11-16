<?php
require('layouts/header.php'); ?>
<?php
require('./../connect.php');
$errors = []; // biến để lưu tất cả các lỗi ở server thực hiện và trả về cho người dùng (1 mảng)
$success = ""; // là 1 chuỗi thông báo thành công (1 chuỗi)
?>

<?php
if (isset($_SESSION['account_admin'])) {
    header('Location: index.php'); // Chuyển đến một trang khác có tên là index.php
}
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    /**
     * Tìm xem có tài khoản nào mà 
     *  + tên đăng nhập hoặc email trùng với thông tin username ở form 
     *  + mật khẩu trùng với password ở form
     * Không có thì thông báo lỗi, để nhập lại.
     * Nếu có thì lưu thông tin bằng session và load lại trang
     */
    $query = "SELECT id, username, email, fullname, gender, phone, birthday FROM accounts WHERE (username = '{$username}' OR email = '{$username}') AND password = '{$password}' AND status = 'ACTIVE' AND role = 'admin'";
    $result = mysqli_query($conn, $query); // thực hiện lệnh sql => trả về 1 mảng (các bản ghi)
    // Đếm xem có bao nhiêu bản ghi thỏa mãn mãn câu sql. Nếu mà > 0 => thông báo
    if (mysqli_num_rows($result) > 0) { // mysqli_num_rows: kiểm tra (đếm) có bao nhiêu bản ghi (rows)
        // Đăng nhập thành công
        $account = $result->fetch_array(MYSQLI_ASSOC); //fetch_array đọc kết quả của result (tìm và trả về 1 dòng kết quả của câu truy vấn)
        $_SESSION['account_admin'] = $account; // $_SESSION: biến toàn cục và là kiểu mảng
        header('Location: index.php');
    } else {
        // Đăng nhập thất bại
        $errors[] = "Thông tin đăng nhập chưa đúng. Vui lòng đăng nhập lại";
    }
}
?>
<head>
  <!-- Design by foolishdeveloper.com -->
   
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style>
     body{
        background-color: #080710;

     }
     .background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
    margin-top:380px
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -77px;
    bottom: -461px;
}   

.card{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
    margin-top:381px
}
.card *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}


.cat {
    background-color: #f19b1a;
    height: 65px;
    width: 80px;
    border-radius: 0 80px 80px 0;
    position: absolute;
    bottom: 60px;
    right: 50px;
}
.ear {
    height: 15px;
    width: 15px;
    background-color: #f19b1a;
    position: absolute;
    bottom: 64px;
    left: 8px;
    border-radius: 20px 0 0 0;
    box-shadow: 25px 0 #f19b1a;
}
.eye,
.eye:before {
    height: 7px;
    width: 10px;
    border: 2px solid #2c2c2c;
    position: absolute;
    border-radius: 0 0 15px 15px;
    border-top: none;
}
.eye {
    top: 18px;
    left: 15px;
}
.eye:before {
    content: "";
    left: 30px;
}
.nose {
    background-color: #ffffff;
    height: 12px;
    width: 12px;
    border-radius: 50%;
    position: absolute;
    top: 32px;
    left: 25px;
    box-shadow: 12px 0 #ffffff;
}
.nose:before {
    content: "";
    width: 12px;
    height: 8px;
    position: absolute;
    background-color: #ffffff;
    left: 6px;
}
.nose:after {
    content: "";
    position: absolute;
    height: 0;
    width: 0;
    border-top: 8px solid #ef926b;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    bottom: 7px;
    left: 6px;
}
.mouth {
    background-color: #2c2c2c;
    height: 15px;
    width: 17px;
    position: absolute;
    border-radius: 0 0 5px 5px;
    top: 38px;
    left: 27px;
    animation: mouth-move 2s infinite;
    transform-origin: top;
}
@keyframes mouth-move {
    50% {
        transform: scaleY(0.7);
    }
}
.body {
    background-color: #f19b1a;
    height: 90px;
    width: 140px;
    position: absolute;
    right: 65px;
    bottom: 0;
    border-radius: 60px 60px 0 0;
    animation: sleep 2s infinite;
    transform-origin: bottom right;
}
@keyframes sleep {
    50% {
        transform: scale(0.9, 1.05);
    }
}
.tail {
    background-color: #d07219;
    height: 20px;
    width: 100px;
    position: absolute;
    right: 150px;
    bottom: 0;
    border-radius: 20px 0 0 20px;
}
.body:before {
    content: "";
    position: absolute;
    background-color: #ffffff;
    height: 12px;
    width: 30px;
    border-radius: 6px;
    bottom: 0;
    left: 22px;
    box-shadow: 45px 0 #ffffff;
}
.bubble {
    height: 20px;
    width: 20px;
    background-color: rgba(255, 255, 255, 0.4);
    position: absolute;
    left: 65px;
    top: 20px;
    border-radius: 50px 50px 50px 5px;
    animation: bubble-scale 2s infinite;
}
@keyframes bubble-scale {
    50% {
        transform: scale(1.6);
    }
}
.shadow {
    height: 10px;
    width: 240px;
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    position: absolute;
    bottom: 52px;
    left: 70px;
    animation: shadow 2s infinite;
}
@keyframes shadow {
    50% {
        transform: scaleX(0.7);
    }
}
    </style>
</head>
<!-- Giao diện đăng nhập -->
<body>
<div class="container1">
            <div class="shadow"></div>
            <div class="cat">
                <div class="ear"></div>
                <div class="eye"></div>
                <div class="mouth"></div>
                <div class="nose"></div>
                <div class="tail"></div>
                <div class="body"></div>
                <div class="bubble"></div>
            </div>
        </div>
<div class="container">
    <div class="row">
        <div class="col col-md-6 offset-md-3">
        <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
            <div class="card">
                <div class="card-header text-center">
                    Đăng nhập
                </div>
                <div class="card-body">
                    <?php if (count($errors) > 0) : ?>
                        <?php for ($i = 0; $i < count($errors); $i++) : ?>
                            <p class="errors" style="color: red;"> <?php echo $errors[$i]; ?> </p>
                        <?php endfor; ?>
                    <?php endif; ?>
                    <?php if ($success) : ?>
                        <p class="success" style="color: green;"> <?php echo $success; ?> </p>
                    <?php endif; ?>
                    <form method="post" action="" onsubmit="return handeFormSubmit();">
                        <div class="form-group">
                            <label for="username">Email hoặc tên đăng nhập</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Nhập Email hoặc tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4" name='submit'>Đăng nhập</button>
                        <!-- <button type="button" class="btn btn-primary mt-4">
                            <a href="forget-password.php">Quên mật khẩu</a>
                        </button> -->
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="col-sm-12 col-md-5" style="height:100px; background-color: red;">

        </div> -->
    </div>
</div>
</body>
<?php
require('layouts/footer.php'); ?>