<div class="container">
<div class="col-lg-12">
  <?php
    if (session()->getFlashdata('pesan')) {
      echo ' <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
      echo session()->getFlashdata('pesan');
      echo '</div>';
    }
  ?>
</div>

  <?php echo form_open('home/update') ?>
  <!-- Main content -->
  <div class="invoice p-3 mb-3">
    
    <div class="row">
      <div class="col-12">
        <h4>
          <i class='fas fa-shopping-cart'></i> Keranjang Belanja
        </h4>
      </div>
    </div>
    
    <br>
    
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th width="100px">Qty</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Total</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
          <?php
           $i =1;
           foreach ($cart->contents() as $key => $value) {?>
            <tr>
            <td><input name='qty<?= $i++ ?>' type="number" min="1" class="form-control" value="<?= $value['qty'] ?>"></td>
            <td><?= $value['name'] ?></td>
            <td>Rp. <?= number_format($value['price'],0) ?></td>
            <td><?= $value['options']['deskripsi'] ?></td>
            <td>Rp. <?= number_format($value['subtotal'],0) ?></td>
            <td>
              <a href="<?= base_url('home/delete/'.$value['rowid']) ?>" class="btn btn-sm btn-danger">
                <i class="fas fa fa-trash"></i>
              </a>
            </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        
      </div>
      <!-- /.col -->
      <div class="col-6">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rp <?= number_format($cart->total(),0) ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
        <a href="<?= base_url('home/clear/') ?>" class="btn btn-warning">
          <i class="fa fa-trash"></i>
          Clear Keranjang
        </a>
        <button type="button" class="btn btn-success float-right">
        <i class="far fa-credit-card"></i>
         Cek Out
        </button>
       
      
       
      </div>
    </div>

  </div>
  <?php echo form_close() ?>
</div>
        <!-- /.invoice -->