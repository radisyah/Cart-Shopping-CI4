<div class="col-lg-12">
  <?php
    if (session()->getFlashdata('pesan')) { echo '
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
      &times;</button
    >'; echo session()->getFlashdata('pesan'); echo '
  </div>
  '; } ?>
</div>

<?php foreach ($barang as $key =>
$value) { ?>
<div class="col-lg-3">
  <?php 
    echo form_open('home/add');
    echo form_hidden('id', $value['id_barang']);
    echo form_hidden('price', $value['harga']);
    echo form_hidden('name', $value['nama_barang']);
    echo form_hidden('gambar', $value['gambar']);
    echo form_hidden('deskripsi', $value['deskripsi']);
    ?>
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h5 class="card-title"><?= $value['nama_barang'] ?></h5>
    </div>

    <div class="card-body text-center">
      <p class="card-text">
        <img src="<?= base_url('img/'. $value['gambar'])?>" alt="" />
        <?= $value['deskripsi'] ?>
      </p>

      <label
        >Rp.
        <?= number_format($value['harga'],0); ?></label
      ><br />
      <button type="submit" class="btn btn-primary btn-lg btn-flat">
        <i class="fas fa-cart-plus fa-lg mr-2"></i>
        Add to Cart
      </button>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>
<?php } ?>
