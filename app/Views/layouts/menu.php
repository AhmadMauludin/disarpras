<?php $idu = session('id'); ?>

<?php if (session()->get('role') === 'admin'): ?>

    <li class="nav-item">
        <a href="<?= site_url('users/') ?>">
            <span class="icon">
                <i class="lni lni-user"></i>
            </span>
            <span class="text">Users</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?= site_url('jenis/') ?>">
            <span class="icon">
                <i class="lni lni-bookmark"></i>
            </span>
            <span class="text">Jenis</span>
        </a>
    </li>

<?php endif; ?>

<li class="nav-item">
    <a href="<?= site_url('sarana/') ?>">
        <span class="icon">
            <i class="lni lni-briefcase"></i> </span>
        <span class="text">Sarana</span>
    </a>
</li>