<?php if (FKTL == 'Yes'): ?>
    <?php if ($role == 'Admin' || $role == 'Manajemen' || $role == 'Medis' || $role == 'Paramedis_Ralan'): ?>
        <li>
            <a href="<?php echo URL . '/?module=Keuangan' ?>">Keuangan</a>
        </li>
    <?php endif;
endif ?>