<?php
if(!defined('IS_IN_MODULE')) die("NO DIRECT FILE ACCESS!");
?>

<?php if(FKTL == 'Yes'):?>
<?php if($role == 'Admin' || $role == 'Manajemen' || $role == 'Medis' || $role == 'Paramedis_Ralan'): ?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
  <a href="<?php echo URL; ?>/?module=RawatInap">
    <div class="image">
      <div class="icon">
        <i class="medical-icon-i-inpatient"></i>
      </div>
    </div>
    <div class="sname">Rawat Inap</div>
  </a>
</div>
<?php endif ?>
<?php endif ?>
