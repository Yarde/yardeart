<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav class="menu">
    <div class="header">
        <div>
        <div class="brand">
            <a href="<?= base_url()?>" rel="nofollow" target="_self"><img class="logo" src="<?= base_url('public/image/logo.png')?>" alt="Logo"><span class="name">Yardeart</span></a>
        </div>
        <div class="links">
            <a target="_self" href="<?= site_url("Gallery")?>">Gallery</a>
            <a target="_self" href="<?= site_url("Quiz")?>">Quiz</a>
        </div>
        </div>
        <?php if(current_url() == base_url('Quiz')): ?>
            <div class="settings">
                <img class="setting-img" src="<?= base_url('public/image/setting.png')?>" alt="Ustawienia">
            </div>    
    <?php endif; ?>
    </div>
</nav>
