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

    <title>Kullanıcılar</title>

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

                <li class="nav-item">
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
                        <li class="nav-item active">
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


                                <form action="users.php" method="POST" 
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Kullanıcı ara..."
                                    aria-label="Search" aria-describedby="basic-addon2" name="search_user">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="search_user_button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form> 
                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Kullanıcı ara..." aria-label="Search"
                                        aria-describedby="basic-addon2" name="search_user">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" name="search_user_button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

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
<?php
if(isset($_GET['i'])){ 
    if($_GET['i']==1){
        ?>
        <div class="container-fluid">
            <div class="container">
              <br>

              <?php

              if(isset($_GET['c']) && !empty($_GET['c']))
              {

                  $user_id = $_GET['c'];
                  $username = "";
                  $email = "";

                  $baglanti3 = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
                  $baglanti3->set_charset("utf8");
                  if(!$baglanti3)
                  {

                  }
                  else{

                      $sqlsorgu3 = "SELECT * FROM users WHERE id = $user_id LIMIT 1";

                      $result3 = mysqli_query($baglanti3,$sqlsorgu3);

                      if(mysqli_num_rows($result3) > 0)
                      {
                        $row3 = mysqli_fetch_assoc($result3);

                        $username = $row3['username'];
                        $email = $row3['email'];
                    }
                }


                ?>
                <h3>Kullanıcı Güncelle</h3>
                <hr>
                <br>
                <form action="users.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                    <div class="mb-3">
                        <label class="form-label">Kullanıcı Adı</label>
                        <input type="text" class="form-control" name="e_username" value="<?php echo $username; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="e_email" value="<?php echo $email; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Şifre (Boş bırakırsanız kullanılan şifre geçerli kalacaktır.)</label>
                        <input type="password" class="form-control" name="e_password">
                    </div>

                    <button type="submit" class="btn btn-primary" name="user_edit">Güncelle</button>
                </form>
                <?php
            }
            else
            {
              ?>
              <h3>Kullanıcı Oluştur</h3>
              <hr>
              <br>
              <form action="users.php" method="POST">


                <div class="mb-3">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="a_username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="a_email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Şifre</label>
                    <input type="password" class="form-control" name="a_password" required>
                </div>

                <button type="submit" class="btn btn-primary" name="add_user">Oluştur</button>
            </form>
            <?php
        }

        ?>


        <br>

        <?php

        if(isset($_GET['s'])){
          $s = $_GET['s'];
          $title = "İşlem Başarısız";
          $content = "Bir hata meydana geldi!";

          if($s=="0"){
            $content = "Gerekli alanları doldurmalısın!";
        }
        else if($s=="1"){
            $content = "Girilen email adresi geçersiz!";
        }
        else if($s=="2"){
            $content = "Tüm alanlar 6 karakterden büyük olmalıdır.";
        }
        else if($s=="3"){
            $content = "Tüm alanlar 6 karakterden büyük olmalıdır.";
        }
        else if($s=="4"){
            $content = "Bir hata meydana geldi!";
        }
        else if($s=="5"){
            $title = "işlem Başarılı!";
            $content = "Kullanıcı başarıyla kaydedildi.";
        }

        if($s=="5"){
          ?>
          <div class="col-lg-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5><?php echo $title; ?></h5>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

        <?php
    }else{
      ?>
      <div class="col-lg-6 mb-4">
        <div class="card bg-danger text-white shadow">
            <div class="card-body">
                <h5><?php echo $title; ?></h5>
                <?php echo $content; ?>
            </div>
        </div>
    </div>
    <?php
}

}
?>
</div>
</div>
<?php }}
else{ ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="container">
          <br>
          <h3>Tüm Kullancılar</h3>
          <hr>
          <br>
          <form method="POST">
              <div class="row">
                <div class="col">
                 <button type="button" class="btn btn-primary" onclick="location.href='users.php?i=1'">Kullanıcı Oluştur</button>
             </div>
         </div>
     </form>



     <br>
     <br>
     <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kullanıcı Adı</th>
              <th scope="col">Email</th>
              <th scope="col">Seviye</th>
              <th scope="col">Oluşturma Tarihi</th>
              <th scope="col"></th>
              <th scope="col"></th>
          </tr>
      </thead>
      <tbody>
        <?php


        $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        $baglanti->set_charset("utf8");
        if(!$baglanti)
        {

        }
        else{

          if(isset($_GET['s']) && !empty($_GET['s'])){

            $search = $_GET['s'];

            $sqlsorgu2 = "SELECT * FROM users Where (username like '%$search%' OR email like '%$search%') ORDER BY id DESC";
        }
        else
        {
            $sqlsorgu2 = "SELECT * FROM users ORDER BY id DESC";
        }

        $result2 = mysqli_query($baglanti,$sqlsorgu2);

        if(mysqli_num_rows($result2) > 0)
        {
          while($row = mysqli_fetch_assoc($result2))
          {
            ?>

            <tr>
              <th scope="row"><?php echo $row['id'];?></th>
              <th><span style="font-weight:normal;"><?php echo $row['username'];?></span></th>
              <th><span style="font-weight:normal;"><?php echo $row['email'];?></span></th>
              <th><span style="font-weight:normal;"><?php echo $row['level'];?></span></th>
              <th><span style="font-weight:normal;"><?php echo $row['created_time'];?></span></th>
              <td><button type="button" class="btn btn-primary" onclick="location.href='users.php?i=1&c=<?php echo $row['id'];?>'">Düzenle</button></td>
              <td><button type="button" class="btn btn-danger" onclick="location.href='users.php?i=2&c=<?php echo $row['id'];?>'">Sil</button></td>
          </tr>
          <?php
      }

  }
  else{

  }


  mysqli_close($baglanti);
}

?>
</tbody>
</table>
</div>

</div>
</div>
<!-- /.container-fluid -->
<?php }
?>
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

<!-- deleteUserModal Modal-->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Asisst Panel</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="location.href='users.php'">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Kullanıcıyı silmek istediğinize emin misiniz?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="location.href='users.php'">İptal</button>
            <form method="POST">
              <button type="submit" class="btn btn-primary" name="delete_user">Sil</button>
          </form>
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

<script>

    function showdeleteUser() {
        $("#deleteUserModal").modal()

    }
</script>

<?php

if(isset($_GET['c'],$_GET['i']) && $_GET['i']=="2" && !isset($_POST['delete_user'])){
    echo '<script type="text/javascript">',
    'showdeleteUser();',
    '</script>'
    ;
}

if(isset($_POST['add_user'])){

    $username = trim($_POST['a_username']);
    $email = trim($_POST['a_email']);
    $password = trim($_POST['a_password']);
    

    if(empty($username) || empty($email) || empty($password)){
        header("Location:users.php?i=1&s=0");
        exit();
    }else
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location:users.php?i=1&s=1");
            exit();
        }
        else
        {
            if(strlen($username)<6 || strlen($email)<6 || strlen($password)<6){
                header("Location:users.php?i=1&s=2");
                exit();
                
            }
            else
            {
                add_user($username,$email,$password);
            }
        }
        
    }

}

else if(isset($_POST['user_edit'])){

    $user_id = trim($_POST['user_id']);
    $username = trim($_POST['e_username']);
    $email = trim($_POST['e_email']);
    $password = trim($_POST['e_password']);
    

    if(empty($user_id) || empty($username) || empty($email)){
        header("Location:users.php?i=1&s=0&c=".$user_id);
        exit();
    }else
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location:users.php?i=1&s=1&c=".$user_id);
            exit();
        }
        else
        {

            if(strlen($username)<6 || strlen($email)<6){
                header("Location:users.php?i=1&s=2&c=".$user_id);
                exit();
                
            }
            else
            {
                if(empty($password)){
                    edit_user($user_id,$username,$email,null);
                }
                else
                {
                    edit_user($user_id,$username,$email,$password);
                }
                
            }
        }
        
    }
}

else if(isset($_POST['search_user_button'])){

    header("Location:users.php?s=".$_POST['search_user']);
    exit();
}

else if(isset($_POST['delete_user'],$_GET['c'])){

    if(deleteUser($_GET['c'])){
        header("Location:users.php");
        exit();
    }
    else
    {
        header("Location:users.php");
        exit();
    }
}

function add_user($username,$email,$password){


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        header("Location:users.php?i=1&s=4");
        exit();
    }
    else{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $datetime = getDatetimeNow();
        $sqlsorgu1 = "INSERT INTO users (username,email,password,created_time) VALUES ('$username','$email','$hashed_password','$datetime')";

        if(mysqli_query($baglanti, $sqlsorgu1))
        {
            header("Location:users.php?i=1&s=5");
            exit();
        }
        else
        {
            header("Location:users.php?i=1&s=4");
            exit();
        }


        
        mysqli_close($baglanti);
    }
}

function edit_user($user_id,$username,$email,$password){


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        header("Location:users.php?i=1&s=4&c=".$user_id);
        exit();
    }
    else{
        $sqlsorgu2="";
        if($password!=null){

            if(strlen($password)<6){
                header("Location:users.php?i=1&s=2&c=".$user_id);
                exit();
                
            }else{
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sqlsorgu2 = "UPDATE users SET username='$username' , email='$email' , password='$hashed_password' WHERE id='$user_id' ";
            }

            
        }
        else{
            $sqlsorgu2 = "UPDATE users SET username='$username' , email='$email' WHERE id='$user_id' ";
        }

        

        if(mysqli_query($baglanti, $sqlsorgu2))
        {
            header("Location:users.php");
            exit();
        }
        else
        {
            header("Location:users.php?i=1&s=4&c=".$user_id);
            exit();
        }


        
        mysqli_close($baglanti);
    }
}

function deleteUser($user_id){


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        return false;
    }
    else{


        $sqlsorgu2 = "DELETE FROM users WHERE users.id = $user_id";
        $result2 = mysqli_query($baglanti,$sqlsorgu2);

        if(mysqli_num_rows($result2) > 0)
        {
            return true;
        }
        else{
            return false;
        }

        
        mysqli_close($baglanti);
    }
}


ob_flush();

?>