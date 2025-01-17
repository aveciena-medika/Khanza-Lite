<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : dentix.id@gmail.com
* Licence under GPL
***/

$title = 'Pembayaran';
include_once('config.php');
include_once('layout/header.php');
include_once('layout/sidebar.php');

if(isset($_GET['no_rawat'])) {
    $_sql = "SELECT a.no_rkm_medis, a.no_rawat, b.nm_pasien, b.umur, a.status_lanjut , a.kd_pj, c.png_jawab FROM reg_periksa a, pasien b, penjab c WHERE a.no_rkm_medis = b.no_rkm_medis AND a.no_rawat = '$_GET[no_rawat]'";
    $found_pasien = query($_sql);
    if(num_rows($found_pasien) == 1) {
	     while($row = fetch_array($found_pasien)) {
	        $no_rkm_medis  = $row['0'];
	        $get_no_rawat	 = $row['1'];
          $no_rawat	     = $row['1'];
	        $nm_pasien     = $row['2'];
	        $umur          = $row['3'];
          $status_lanjut = $row['4'];
          $kd_pj         = $row['5'];
          $png_jawab     = $row['6'];
	     }
    } else {
	     redirect ("{$_SERVER['PHP_SELF']}");
    }
}

?>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $title; ?>
                                <small>Periode <?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } else { echo date("d-m-Y",strtotime($date)) . ' s/d ' . date("d-m-Y",strtotime($date));} ?></small>
                            </h2>
                        </div>
                        <?php
                        $action = isset($_GET['action'])?$_GET['action']:null;
                        if(!$action){
                        ?>
                        <div class="body">
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <th>No. RM</th>
                                        <th>Alamat</th>
                                        <th>Jenis Bayar</th>
                                        <th>Status Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT a.nm_pasien, b.no_rkm_medis, a.alamat, c.png_jawab, b.stts, b.status_bayar, b.no_rawat FROM pasien a, reg_periksa b, penjab c WHERE a.no_rkm_medis = b.no_rkm_medis AND b.kd_pj = c.kd_pj";
                                if(isset($_POST['status_lanjut']) && $_POST['status_lanjut'] == 'Ralan') {
                                	$sql .= " AND b.status_lanjut = 'Ralan'";
                                }
                                if(isset($_POST['status_lanjut']) && $_POST['status_lanjut'] == 'Ranap') {
                                  $sql .= " AND b.status_lanjut = 'Ranap'";
                                }
                                if(isset($_POST['tgl_awal']) && $_POST['tgl_awal'] !=="" && isset($_POST['tgl_akhir']) && $_POST['tgl_akhir'] !=="") {
                                	$sql .= " AND b.tgl_registrasi BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                  	$sql .= " AND b.tgl_registrasi = '$date'";
                                }
                                $query = query($sql);
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo SUBSTR($row['0'],0,20); ?></td>
                                        <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=view&no_rawat=<?php echo $row['6']; ?>"><?php echo $row['1']; ?></a></td>
                                        <td><?php echo $row['2']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                        <td><?php echo $row['5']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="row clearfix">
                                <form method="post" action="">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tgl_awal" class="datepicker form-control" placeholder="Pilih tanggal awal...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tgl_akhir" class="datepicker form-control" placeholder="Pilih tanggal akhir...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <select name="status_lanjut" class="form-control show-tick">
                                              <option>Semua</option>
                                              <option value="Ralan">Rawat Jalan</option>
                                              <option value="Ranap">Rawat Inap</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="submit" class="btn bg-blue btn-block btn-lg waves-effect">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                      <?php } ?>
                      <?php if($action == "view"){ ?>
                        <div class="body">
                          <dl class="dl-horizontal">
                            <dt>Nama Lengkap</dt>
                            <dd><?php echo $nm_pasien; ?></dd>
                            <dt>No. RM</dt>
                            <dd><?php echo $no_rkm_medis; ?></dd>
                            <dt>No. Rawat</dt>
                            <dd><?php echo $no_rawat; ?></dd>
                            <dt>Cara Bayar</dt>
                            <dd><?php echo $png_jawab; ?></dd>
                            <dt>Umur</dt>
                            <dd><?php echo $umur; ?> Th</dd>
                          </dl>
                        </div>
                        <div class="body">
                        <table class="table responsive table-bordered table-striped table-hover display nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama Item</th>
                                    <th>Jumlah</th>
                                    <th>Biaya</th>
                                    <th>Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                  <th>Tindakan</th><th></th><th></th><th></th>
                              </tr>
                            <?php
                            $query_tindakan = query("SELECT a.kd_jenis_prw, a.tgl_perawatan, a.tarif_tindakandr, b.nm_perawatan  FROM rawat_jl_dr a, jns_perawatan b WHERE a.kd_jenis_prw = b.kd_jenis_prw AND a.no_rawat = '{$no_rawat}'");
                            while ($data_tindakan = fetch_array($query_tindakan)) {
                            ?>
                                <tr>
                                    <td><?php echo $data_tindakan['3']; ?></td>
                                    <td><?php echo $data_tindakan['2']; ?></td>
                                    <td>Rp. <?php echo number_format($data_tindakan['2'],2,',','.'); ?></td>
                                    <td>Rp. <?php echo number_format($data_tindakan['2'],2,',','.'); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <th>Obat</th><th></th><th></th><th></th>
                            </tr>
                             <?php
                             $query_resep = query("SELECT a.kode_brng, a.jml, a.aturan_pakai, b.nama_brng, a.no_resep, b.jualbebas FROM resep_dokter a, databarang b, resep_obat c WHERE a.kode_brng = b.kode_brng AND a.no_resep = c.no_resep AND c.no_rawat = '{$no_rawat}' AND c.kd_dokter = '{$_SESSION['username']}' ");
                             while ($data_resep = fetch_array($query_resep)) {
                             ?>
                                 <tr>
                                     <td><?php echo $data_resep['3']; ?></td>
                                     <td><?php echo $data_resep['1']; ?></td>
                                     <td>Rp. <?php echo number_format($data_resep['5'],2,',','.'); ?></td>
                                     <td>Rp. <?php echo number_format($data_resep['1']*$data_resep['5'],2,',','.'); ?></td>
                                 </tr>
                             <?php
                             }
                             ?>
                             <tr>
                                 <th>Tambahan Biaya <button class="btn bg-orange waves-effect">+</button></th><th></th><th></th><th></th>
                             </tr>
                              <?php
                              $query_tambahan_biaya = query("SELECT * FROM tambahan_biaya WHERE no_rawat = '{$no_rawat}'");
                              while ($data_tambahan_biaya = fetch_array($query_tambahan_biaya)) {
                              ?>
                                  <tr>
                                      <td><?php echo $data_tambahan_biaya['1']; ?> <button class="btn btn-danger waves-effect" href="<?php $_SERVER['PHP_SELF']; ?>?action=delete_obat&kode_obat=<?php echo $data_resep['0']; ?>&no_resep=<?php echo $data_resep['4']; ?>&no_rawat=<?php echo $no_rawat; ?>">x</a></td>
                                      <td>-</td>
                                      <td>Rp. <?php echo number_format($data_tambahan_biaya['2'],2,',','.'); ?></td>
                                      <td>Rp. <?php echo number_format($data_tambahan_biaya['2'],2,',','.'); ?></td>
                                  </tr>
                              <?php
                              }
                              ?>                             </tbody>
                         </table>
                        </div>
                        <div class="body">
                          <button type="submit" name="ok_obat" value="ok_obat" class="btn bg-indigo waves-effect" onclick="this.value=\'ok_obat\'">CETAK</button>
                        </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include_once('layout/footer.php');
?>
