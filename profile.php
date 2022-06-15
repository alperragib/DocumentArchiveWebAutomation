<?php
ob_start();
session_start();
require_once __DIR__ . '/db_config.php';

if(!isset($_SESSION['username'])){
    header("Location:login.php");
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

    <title>Profil Sayfası</title>

    <!-- Custom fonts for this template-->  
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Yönetim Paneli</div>
            </a>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-map-marker-alt"></i>
                    <span>Tüm Lokasyonlar</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="doc_tur.php">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>Döküman Türleri</span></a>
                    </li>

                <li class="nav-item active">
                    <a class="nav-link" href="profile.php">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Profil</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Çıkış yap</span></a>
                        </li>

                        

                        <?php 
                        if($_SESSION['user_level']==2){ ?>
                           <!-- Divider -->
                           <hr class="sidebar-divider">
                           <!-- Heading -->
                           <div class="sidebar-heading">
                            Yönetici Ayarları
                        </div>

                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">
                                <i class="fas fa-fw fa-users"></i>
                                <span>Kullanıcılar</span></a>
                            </li>

                        <?php }
                        ?>
                        

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

                    </ul>
                    <!-- End of Sidebar -->

                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">

                        <!-- Main Content -->
                        <div id="content">

                            <!-- Topbar -->
                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                </button>

                                <h3>Profil</h3>
                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">

                                    

                                    <!-- Nav Item - Alerts -->
                                    <li class="nav-item dropdown no-arrow mx-1">
                                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <!-- Counter - Alerts -->
                                        <span class="badge badge-danger badge-counter">1</span>
                                    </a>
                                    <!-- Dropdown - Alerts -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Bildirim Merkezi
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">25 Mayıs 2021</div>
                                            <span class="font-weight-bold">Asisst Panel'e hoşgeldin. Kullanmaya başla ve işlerini kolaylaştır.</span>
                                        </div>
                                    </a>
                                    
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Tüm bildirimleri göster</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'];?></span>
                                <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Çıkış yap
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

               <div class="container">
                  <br>
                  <h3>Hesap bilgilerin</h3>
                  <hr>
                  <br>
                  <div class="container">
                      <div class="row">
                        <div class="col-2">
                         <img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/unknown_1-2-64.png" class="rounded-circle" alt="...">
                     </div>
                     <div class="col">
                      <span style="font-weight:bold;font-size:20px"><?php echo $_SESSION['username'];?></span>
                      <br>
                      <span style="font-size:18px"> <?php echo $_SESSION['user_email'];?></span>
                      
                  </div>
              </div>
              <br>
              <br>
              <br>
              <h5>Şifreni değiştir</h5>
              <br>
              <form action="profile.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Kullandığın şifre</label>
                    <input type="password" class="form-control" name="password_old">
                </div>
                <div class="mb-3">
                    <label class="form-label">Yeni şifre</label>
                    <input type="password" class="form-control" name="password_new">
                </div>
                <div class="mb-3">
                    <label class="form-label">Yeni şifre tekrar</label>
                    <input type="password" class="form-control" name="password_new_repeat">
                </div>
                <button type="submit" class="btn btn-primary" name="change_password">Gönder</button>
            </form>
            <br>
            <?php if(isset($_GET['s'])){
              $s = $_GET['s'];
              $title = "İşlem Başarısız!";
              $content = "Şifreniz değiştirilirken bir hata meydana geldi.";
              if($s=="0"){
                $content = "Boş alan bırakılamaz! Tüm alanları doldurmalısın.";
            }
            else if($s=="1"){
                $content = "Şifren 6 karakterden büyük olmalıdır.";
            }
            else if($s=="2"){
                $content = "Girdiğin yeni şifreler eşleşmiyor.";
            }
            else if($s=="3"){
                $content = "Kullandığın şifre hatalı.";
            }
            else if($s=="4"){
                $content = "Şifreniz değiştirilirken bir hata meydana geldi.";
            }
            else if($s=="5"){
                $title = "İşlem Başarılı!";
                $content = "Şifreniz başarıyla değiştirildi.";
            }
            if($s=="5"){ ?>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                       <div class="card-body">
                        <h5> <?php echo $title; ?> </h5> <?php echo $content; ?> </div></div>
                        </div> <?php }else{ ?>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-danger text-white shadow">
                                   <div class="card-body">
                                    <h5> <?php echo $title; ?> </h5> <?php echo $content; ?> </div></div>
                                </div> <?php } } ?> </div></div></div>
                                <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->

                            <!-- Footer -->
                            <footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; Tüm Hakları Saklıdır.</span>
                                    </div>
                                </div>
                            </footer>
                            <!-- End of Footer -->

                        </div>
                        <!-- End of Content Wrapper -->

                    </div>
                    <!-- End of Page Wrapper -->

                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Asisst Panel</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Hesabınızdan çıkış yapmak istediğinize emin misiniz?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                                <a class="btn btn-primary" href="javascript:void(0)" onclick="location.href='index.php?u=1'">Çıkış Yap</a>
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

            if(isset($_POST['change_password'])){

                $password_old = trim($_POST['password_old']);
                $password_new = trim($_POST['password_new']);
                $password_new_repeat = trim($_POST['password_new_repeat']);

                if(empty($password_old) || empty($password_new) || empty($password_new_repeat)){
                    header("Location:profile.php?s=0");
                    exit();
                }else
                {
                    if(strlen($password_new)<6){
                        header("Location:profile.php?s=1");
                        exit();
                    }
                    else
                    {
                        if($password_new == $password_new_repeat){
                            change_password($password_old,$password_new);
                        }
                        else
                        {
                            header("Location:profile.php?s=2");
                            exit();
                        }
                    }
                    
                }
                
            }

            function change_password($user_old_password,$user_password){

                
                $user_id = $_SESSION['user_id'];
                
                $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
                
                $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
                $baglanti->set_charset("utf8");
                if(!$baglanti)
                {
                    header("Location:profile.php?s=4");
                    exit();
                }
                else{
                    
                    $sqlsorgu1 = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
                    $result1 = mysqli_query($baglanti,$sqlsorgu1);
                    
                    if(mysqli_num_rows($result1) > 0)
                    {
                        $row = mysqli_fetch_assoc($result1);
                        
                        if(password_verify($user_old_password, $row['password'])) {
                            
                            $sqlsorgu2 = "UPDATE users SET password = '$hashed_password' WHERE id = '$user_id' ";
                            
                            if(mysqli_query($baglanti,$sqlsorgu2))
                            {
                                header("Location:profile.php?s=5");
                                exit();
                            }
                            else
                            {
                                header("Location:profile.php?s=4");
                                exit();
                            }
                        }else{
                            header("Location:profile.php?s=3");
                            exit();
                        }
                        
                        
                    }else{
                        header("Location:profile.php?s=4");
                        exit();
                    }
                    
                    
                    
                    mysqli_close($baglanti);
                }
            }

            ob_flush();

            ?>