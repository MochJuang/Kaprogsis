<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" style="word-break:break-word">
            <div class="inner">
              <h3><?= $produk ?></h3>

              <p>Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url() ?>barang_jasa/semua" class="small-box-footer">Lainnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green" style="word-break:break-word">
            <div class="inner">
              <h4 style="font-size: 28px">Rp <?= number_format($saldo_akhir,0,',','.') ?></sup></h4>

              <p>Saldo Akhir</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url() ?>uang_kas" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow" style="word-break:break-word">
            <div class="inner">
              <h3><?= $user ?></h3>

              <p>Anggota</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="word-break:break-word;clear: both;">
            <div class="inner">
              <h3><?= $invoice ?></h3>

              <p>Penjualan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url() ?>invoice" class="small-box-footer">Rincian
             <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>