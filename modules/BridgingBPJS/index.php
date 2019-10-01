<?php
if(!defined('IS_IN_MODULE')) { die("NO DIRECT FILE ACCESS!"); }
?>

<?php if(FKTL == 'Yes') { ?>
<?php if($role == 'Admin' || $role == 'Manajemen' || $role == 'Rekam_Medis')  { ?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
  <a href="<?php echo URL; ?>/?module=BridgingBPJS">
    <div class="image">
      <div class="icon">
        <i class="material-icons">cached</i>
      </div>
    </div>
    <div class="sname">BPJS</div>
  </a>
</div>
<?php } ?>
<?php } ?>
