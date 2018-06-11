<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

		<?php $shirts = $shirt_content['shirts']; ?>
		<div class="container">
		<p style="text-align: center;">Galeria sprzedanych koszulek</p>
		<?php $last = count($shirts)-1; ?>
		<?php	foreach ($shirts as $key=>$shirt): ?>
			<?php if($key%2==0){ ?>
				<div class="left">
					<a href="<?= base_url('Shirt').'?id='.$shirt->id_shirt?>">
						<img class="shirt_img" src="<?= base_url('public/image/').$shirt->img.".png"?>" alt="shirt<?= $key ?>">
					</a>
				</div>
			<?php }else{ ?>
				<div class="right">
					<a href="<?= base_url('Shirt').'?id='.$shirt->id_shirt?>">
						<img class="shirt_img" src="<?= base_url('public/image/').$shirt->img.".png"?>" alt="shirt<?= $key ?>">
					</a>
				</div>
			<?php } ?>
			<?php endforeach; ?>

		</div>
