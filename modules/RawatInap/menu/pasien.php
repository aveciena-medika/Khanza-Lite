<div class="header">
    <h2>
        INFORMASI KAMAR INAP PASIEN
    </h2>
    <ul class="header-dropdown m-r--5">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">more_vert</i>
            </a>
            <ul class="dropdown-menu pull-right">
                <li><a href="javascript:void(0);">Action</a></li>
                <li><a href="javascript:void(0);">Another action</a></li>
                <li><a href="javascript:void(0);">Something else here</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="body">
    <div class="table-responsive">
        <table  style="font-size:12px;" id="pasien" class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
            <tr>
                <?php $headers = array(
                    "No.Rawat", "Nomer RM", "Nama Pasien", "Alamat Pasien", "Penanggung Jawab", "Hubungan P.J.", "Jenis Bayar", "Kamar", "Tarif Kamar",
                    "Diagnosa Awal", "Diagnosa Akhir", "Tgl.Masuk", "Jam Masuk", "Tgl.Keluar", "Jam Keluar",
                    "Ttl.Biaya", "Stts.Pulang", "Lama", "Dokter P.J.", "Status Bayar") ?>
                <?php foreach ($headers as $header): ?>
                    <th><?php echo $header ?></th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <?php foreach ($headers as $header): ?>
                    <th><?php echo $header ?></th>
                <?php endforeach; ?>
            </tr>
            </tfoot>
            <tbody>
            <?php $db = new DB();
            $datas = $db->query_result(<<<EOT
            SELECT ki.no_rawat,rp.no_rkm_medis,p.nm_pasien,concat(p.alamat,kel.nm_kel,kec.nm_kec,kab.nm_kab)AS alamat,
                   rp.p_jawab,rp.hubunganpj,pen.png_jawab,concat(ki.kd_kamar,b.nm_bangsal)AS kamar,ki.trf_kamar,ki.diagnosa_awal,
                   ki.diagnosa_akhir,ki.tgl_masuk,ki.jam_masuk,
                   IF(ki.tgl_keluar='0000-00-00','',ki.tgl_keluar)AS tgl_keluar,
                   IF(ki.jam_keluar='00:00:00','',ki.jam_keluar)AS jam_keluar,ki.ttl_biaya,ki.stts_pulang,ki.lama,d.nm_dokter,ki.kd_kamar,
                   rp.kd_pj,concat(rp.umurdaftar,rp.sttsumur)AS umur,rp.status_bayar 
            FROM kamar_inap ki INNER JOIN reg_periksa rp ON ki.no_rawat=rp.no_rawat INNER JOIN pasien p ON rp.no_rkm_medis=p.no_rkm_medis 
                INNER JOIN kamar k ON ki.kd_kamar=k.kd_kamar INNER JOIN bangsal b ON k.kd_bangsal=b.kd_bangsal 
                INNER JOIN kelurahan kel ON p.kd_kel=kel.kd_kel INNER JOIN kecamatan kec ON p.kd_kec=kec.kd_kec 
                INNER JOIN kabupaten kab ON p.kd_kab=kab.kd_kab INNER JOIN dokter d ON rp.kd_dokter=d.kd_dokter 
                INNER JOIN penjab pen ON rp.kd_pj=pen.kd_pj WHERE ki.stts_pulang = ? ORDER BY b.nm_bangsal,ki.tgl_masuk,ki.jam_masuk 
            EOT,'s',array('-'));
            foreach ($datas as $data):
                ?>
                <tr>
                    <td><?php echo $data->no_rawat ?></td>
                    <td><?php echo $data->no_rkm_medis ?></td>
                    <td><?php echo $data->nm_pasien ?></td>
                    <td><?php custom_echo($data->alamat,20);  ?></td>
                    <td><?php echo $data->p_jawab ?></td>
                    <td><?php echo $data->hubunganpj ?></td>
                    <td><?php echo $data->png_jawab ?></td>
                    <td><?php echo $data->kamar ?></td>
                    <td><?php echo $data->trf_kamar ?></td>
                    <td><?php echo $data->diagnosa_awal ?></td>
                    <td><?php echo $data->diagnosa_akhir ?></td>
                    <td><?php echo $data->tgl_masuk ?></td>
                    <td><?php echo $data->jam_masuk ?></td>
                    <td><?php echo $data->tgl_keluar ?></td>
                    <td><?php echo $data->jam_keluar ?></td>
                    <td><?php echo $data->ttl_biaya ?></td>
                    <td><?php echo $data->stts_pulang ?></td>
                    <td><?php echo $data->lama ?></td>
                    <td><?php echo $data->nm_dokter ?></td>
                    <td><?php echo $data->status_bayar ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
