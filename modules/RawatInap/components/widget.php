<?php $db = new DB(); ?>
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">enhanced_encryption</i>
            </div>
            <div class="content">
                <div class="text">RANAP TOTAL</div>
                <div class="number count-to" data-from="0"
                     data-to="<?php echo $db->query_result("SELECT COUNT(*) as total FROM kamar_inap")[0]->total ?>"
                     data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group_add</i>
            </div>
            <div class="content">
                <div class="text">MASUK BULAN INI</div>
                <div class="number count-to" data-from="0"
                     data-to="<?php echo $db->query_result("SELECT COUNT(*) as total FROM kamar_inap ki WHERE MONTH(ki.tgl_masuk) = MONTH(CURDATE()) AND YEAR(ki.tgl_masuk) = YEAR(CURDATE())")[0]->total; ?>"
                     data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people</i>
            </div>
            <div class="content">
                <div class="text">BELUM PULANG</div>
                <div class="number count-to" data-from="0"
                     data-to="<?php echo $db->query_result("SELECT COUNT(*) as total FROM kamar_inap ki WHERE ki.stts_pulang = ?",'s',array('-'))[0]->total; ?>"
                     data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">person</i>
            </div>
            <div class="content">
                <div class="text">MASUK HARI INI</div>
                <div class="number count-to" data-from="0"
                     data-to="<?php echo $db->query_result("SELECT COUNT(*) as total FROM kamar_inap ki WHERE ki.tgl_masuk = CURDATE()")[0]->total; ?>"
                     data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>