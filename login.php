<?php
 //error_reporting(0);
@session_start(); 
@ob_start();                // yönlendirme ve bazı header işlemlerini kullanmak için
define("DATA","data/");     // define komutu kullanarak sabit değişken tanımşamış oluyoruz
define("SAYFA","include/");
define("SINIF","class/");

include_once(DATA."baglanti.php");

define("SITE",$siteURL);
if(!empty($_SESSION["ID"]) && !empty($_SESSION["adsoyad"]) && !empty($_SESSION["mail"]))
{
  ?>
  <meta http-equiv="refresh" content="0;url=<?=SITE?>index">
  <?php  
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $sitebaslik ?></title>
  <meta http-equiv="keywords" content="<?= $siteanahtar ?>">
  <meta http-equiv="description" content="<?= $siteaciklama ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=SITE?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=SITE?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=SITE?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?=SITE?>" class="h1"><b>Yönetim</b>Paneli</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Giriş yapmak için bilgilerinizi giriniz.</p>
      <?php
        if($_POST)
        {
            if(!empty($_POST["kullanici"]) && !empty($_POST["sifre"]))
            {
                $kullanici  =$VT->filter($_POST["kullanici"]);
                $sifre      =md5($VT->filter($_POST["sifre"]));
                $kontrol    =$VT->VeriGetir("kullanicilar","WHERE kullanici=? AND sifre=?",array($kullanici,$sifre),"ORDER BY ID ASC",1);
                if($kontrol!=false)
                {
                  $_SESSION["kullanici"]  = $kontrol[0]["kullanici"];
                  $_SESSION["adsoyad"]    = $kontrol[0]["adsoyad"];
                  $_SESSION["mail"]       = $kontrol[0]["mail"];
                  $_SESSION["ID"]        = $kontrol[0]["ID"];
                  ?>
                  <meta http-equiv="refresh" content="0;url=<?=SITE?>">
                  <?php
                  exit();
                }
                else
                {
                  echo "<div class='alert alert-danger'>Kullanici adınız veya şifreniz hatalı.</div>" ;
                }
            }
            else
            {
                echo "<div class='alert alert-danger'>Boş bıraktığınız alanları dldurunuz.</div>" ;
            }
        }
      ?>
      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adınız">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="sifre" placeholder="Parola">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=SITE?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=SITE?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=SITE?>dist/js/adminlte.min.js"></script>
</body>
</html>
