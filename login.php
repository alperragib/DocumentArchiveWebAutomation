
<?php
session_start();
require_once __DIR__ . '/db_config.php';

if(isset($_SESSION['username'])){
    header("Location:home.php");
    exit();
}


?>

<!doctype html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Giriş Yap</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Giriş Yap</h1>
                                    </div>

                                    <?php
                                    if(isset($_GET['s'])){
                                      ?>

                                      <div class="col-lg-6 mb-4">
                                        <div class="card bg-danger text-white shadow">
                                            <div class="card-body">
                                                Girilen kullanıcı adı veya şifre hatalı.
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

                                <form class="user" action="login.php" method="POST">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Kullanıcı adınızı giriniz..." <?php if(isset($_COOKIE['username'])){ ?> value="<?php echo $_COOKIE['username']; ?>"<?php } ?> >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                        name="password" placeholder="Şifrenizi giriniz....">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" <?php if(isset($_COOKIE['username'])){ ?>checked <?php } ?> class="custom-control-input" name="remember_me" id="checkbox_id">
                                            <label class="custom-control-label" for="checkbox_id">Beni Hatırla</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit" name="sign_in">
                                        Giriş Yap
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Şifrenizi unuttuysanız buraya tıklayın.</a>
                                </div>
                            </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php

if(isset($_POST['sign_in'])){

    if(login($_POST['username'],$_POST['password']))
    {
        if(isset($_POST['remember_me']))
        {
            setcookie("username",$_POST['username'],strtotime("+1 day"));
        }
        else
        {
            setcookie("username",$_POST['username'],strtotime("-1 day")); 
        }

        header("Location:index.php");
        exit();
    }
    else
    {
        header("Location:login.php?s=0");
        exit();
    }

    
}

function login($username,$password){

    
    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        return false;
    }
    else{
        
        
        $sqlsorgu2 = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result2 = mysqli_query($baglanti,$sqlsorgu2);
        
        if(mysqli_num_rows($result2) > 0)
        {
            $row2 = mysqli_fetch_assoc($result2);
            $hashed_password2 = $row2['password'];
            
            if(password_verify($password, $hashed_password2)) {
                
                $_SESSION['user_id'] = $row2['id'];
                $_SESSION['username'] = $row2['username'];
                $_SESSION['user_email'] = $row2['email'];
                $_SESSION['user_level'] = $row2['level'];
                
                return true;
                
            }else{
                return false;
            }
            
        }
        else{
            return false;
        }
        
        
        mysqli_close($baglanti);
    }
}


?>