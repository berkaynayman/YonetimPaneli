<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-darl">Seo Ayarlari</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Seo Ayarlari</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <?php
          if ($_POST) 
          {
            if (!empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"])) 
            {
              $baslik=$VT->filter($_POST["baslik"]);
              $anahtar=$VT->filter($_POST["anahtar"]);
              $description=$VT->filter($_POST["description"]);
              
                $guncelle=$VT->SorguCalistir("UPDATE ayarlar","SET baslik=?, anahtar=?, aciklama=? WHERE ID=?",
                array($baslik,$anahtar,$description,1),1);
              }
              if ($guncelle!=false)
              {
                ?>
                  <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
                  <meta http-equiv="refresh" content="2;url=<?=SITE?>seo-ayarlari">
                <?php
              }else{
                ?>
                  <div class="alert alert-danger">İşleminiz sırasında bir sorun ile karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
                <?php
              }
            }
            else
            {
              ?>
              <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
              <?php
            }
        ?>

        </div>
      </div>
      <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form action="#" method="POST" enctype="multipart/form-data"> <!-- enctype ı resim gönderme işlemi yapacağımız için yazdık -->
            <div class="card-body">
              <div class="row">
                
                    
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Site Başlık</label>
                    <input type="text" class="form-control" placeholder="Site Başlık ..." name="baslik" value="<?=$sitebaslik?>">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Anahtar</label>
                    <input type="text" class="form-control" placeholder="Anahtar ..." name="anahtar" value="<?=$siteanahtar?>">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" placeholder="Description ..." name="description" value="<?=$siteaciklama?>">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Güncelle</button>
                  </div>
              </div>
            </div>


          </form>


          
          <!-- /.card-body -->
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>