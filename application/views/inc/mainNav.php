<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav class="menu">
    <div class="header">
        <div>
        <div class="brand">
            <a href="<?= base_url()?>" class="logo" rel="nofollow" target="_self"><span class="name">Yardeart</span></a>
        </div>
        <div class="links">
			<a target="_blank" href="https://www.instagram.com/yardeart/">Insta</a>
			▪
            <a target="_self" href="<?= site_url("Gallery")?>">Gallery</a>
			▪
            <a target="_self" href="<?= site_url("Quiz")?>">Quiz</a>
        </div>
        </div>
        <div class="settings">
            <a href="<?= base_url('index.php?lang=pl')?>"> 
                <img class="language_pl" src="<?= base_url('public/image/pl.png')?>" alt="Polski">
            </a>
            <a href="<?= base_url('index.php?lang=en')?>"> 
                <img class="language_en" src="<?= base_url('public/image/en.png')?>" alt="English">
            </a>
            <?php if(current_url() == base_url('Quiz')): ?>
                <img class="setting-img" src="<?= base_url('public/image/setting.png')?>" alt="Ustawienia">
            <?php endif; ?>
        </div>
    </div>
</nav>
