            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">enhanced_encryption</i>
                        </div>
                        <div class="content">
                            <div class="text">OBAT & BHP</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT kode_brng FROM databarang"));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group_add</i>
                        </div>
                        <div class="content">
                            <div class="text">OBAT EXPIRED</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT kode_brng FROM databarang WHERE expire < CURRENT_DATE()"));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">OBAT KOSONG</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT kode_brng FROM riwayat_barang_medis WHERE tanggal IN (SELECT max(tanggal) FROM riwayat_barang_medis) AND jam IN (SELECT max(jam) FROM riwayat_barang_medis) AND stok_akhir = '0'"));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">RESEP HARI INI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_resep FROM resep_dokter"));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
              <div class="col-lg-12 pull-left pd0">
                <div class="card">
                    <div class="header">
                        <h2>RESEP POLIKLINIK HARI INI</h2>
                    </div>
                    <div class="body">
                        <canvas id="line_chart" height="250"></canvas>
                    </div>
                </div>
              </div>
            </div>
            <?php allObat(); ?>
