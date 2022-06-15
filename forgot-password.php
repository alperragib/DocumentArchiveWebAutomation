
<?php
session_start();
require_once __DIR__ . '/db_config.php';
require_once 'mail/contact.php';

if(isset($_SESSION['username'])){
    header("Location:home.php");
    exit();
}


?> 

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Şifremi Unuttum</title>

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
                        <!-- Nested Row within Card Body -->
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Şifremi Unuttum</h1>
                                         <?php
                                        if(isset($_GET['s'])){
                                      ?>

                                      <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Email adresinize başarıyle yeni şifreniz gönderildi.
                                        </div>
                                    </div>
                                </div>

                                      <?php
                                      }elseif(isset($_GET['e'])){
                                         ?>

                                      <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Girilen kullanıcı adı geçersiz!
                                        </div>
                                    </div>
                                </div>

                                      <?php
                                      }


                                      ?>
                                        <p class="mb-4">Girdiğiniz kullanıcı adı doğru ise sistemde kayıtlı olan email adresinize yeni şifreniz gönderilecektir.</p>
                                    </div>
                                    <form class="user" action="forgot-password.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Kullanıcı adınızı giriniz..." name="username">
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="forgot-password">
                                            Şifremi Sıfırla
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Giriş yapmak için buraya tıkla.</a>
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

if(isset($_POST['forgot-password'])){
    if(isset($_POST['username']) && strlen($_POST['username'])>0){
        if(forgotPassword($_POST['username']))
        {
            header("Location:forgot-password.php?s=0");
        }
        else
        {
            header("Location:forgot-password.php?e=0");
        }
    }
    else
    {
        header("Location:forgot-password.php?e=0");
    }
}

function forgotPassword($username){

        
        $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        $baglanti->set_charset("utf8");
        if(!$baglanti)
        {
            return false;
        }
        else{

            $sqlsorgu1 = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
            $result1 = mysqli_query($baglanti,$sqlsorgu1);
        
            if(mysqli_num_rows($result1) > 0)
            {
                $row = mysqli_fetch_assoc($result1);
                $user_id=$row['id'];
                $user_email=$row['email'];
                $access_code = rand(10000000,99999999);
                $hashed_password = password_hash($access_code, PASSWORD_DEFAULT);

                $datetime = getDatetimeNow();
                
                $sqlsorgu2 = "UPDATE users SET users.password = '$hashed_password' WHERE users.id = '$user_id' LIMIT 1";
                
                if(mysqli_query($baglanti, $sqlsorgu2))
                {
                    $message = "Hesabınıza $access_code yeni şifreniz ile giriş yapabilirsiniz.";
                    
                    if(sendMail($user_email,"Şifre Sıfırlama Talebiniz Başarılı!",$message)){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else
                {
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