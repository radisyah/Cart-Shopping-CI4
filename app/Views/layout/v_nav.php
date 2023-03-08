<div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= base_url('home') ?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('') ?>" class="nav-link">Contact</a>
          </li>
        </ul>

         <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <?php 
          $keranjang = $cart->contents(); 
          $jml_item = 0;
          foreach ($keranjang as $key => $value) {
            $jml_item = $jml_item + $value['qty'];
          }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge"><?=  $jml_item ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           
              <?php if (empty($keranjang)) { ?>
                <a href="#" class="dropdown-item">
                  <p>Keranjang Belanja Kosong</p>
                </a>
              <?php } else{ ?>
              <a href="#" class="dropdown-item">
                 <!-- Message Start -->
                <?php foreach ($keranjang as $key => $value) { ?>
                  <div class="media">
                    <img src="<?= base_url('img/'. $value['options']['gambar'])?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                       <?= $value['name'] ?>
                        <span class="float-right text-sm text-success"> <?= $value['qty'] ?>x</span>
                      </h3>
                      <p class="text-sm"><?= $value['options']['deskripsi'] ?></p>
                      <p class="text-sm text-muted">Rp. <?= number_format($value['price'],0) ?></p>
                    </div>
                  </div>
                <?php } ?>
                <!-- Message End -->
              </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('home/view') ?>" class="dropdown-item dropdown-footer">View Chart</a>
                <a href="#" class="dropdown-item dropdown-footer">Check Out</a>
              <?php } ?>

           
          </div>
        </li>
     
      </ul>
  </div>
</nav>
  <!-- /.navbar -->

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">