<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $shirts = $shirt_content['shirts']; ?>
		<div class="container">
			<?php $last = count($shirts)-1; ?>
			<?php	foreach ($shirts as $key=>$shirt): ?>
				<div class="left">
						<img class="shirt_img" src="<?= base_url('public/image/').$shirt->img.".png"?>" alt="shirt<?= $key ?>">
				</div>
				<div class="shirt_content">
					<?php if($shirt->is_available == 0){ ?>
					<h4 style="color: #8E0000;">ta koszulka jest sprzedana i znajduje sie w archiwum</h4>
					<?php } ?>
					<p> <?= $shirt->content ?> </p>
					<?php if($shirt->is_available == 1){ ?>
					<p>PLN <?= $shirt->price ?> </p>
					<?php } ?>
				</div>
			<?php endforeach; ?>
		</div>
