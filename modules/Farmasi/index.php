<?php
if(!defined('IS_IN_MODULE')) { die("NO DIRECT FILE ACCESS!"); }
?>

<?php if($role == 'Admin' || $role == 'Manajemen' || $role == 'Apotek')  { ?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
  <a href="<?php echo URL; ?>/?module=Farmasi">
    <div class="image">
      <div class="icon">
        <i class="medical-icon-i-pharmacy"></i>
      </div>
    </div>
    <div class="sname">Farmasi</div>
  </a>
</div>
<?php } ?>
