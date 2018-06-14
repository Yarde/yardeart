<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $shirts = $shirt_content['shirts']; ?>
			<?php $last = count($shirts)-1; ?>
			<?php	foreach ($shirts as $key=>$shirt): ?>
			<div class="img_container">
				<div class="img_box">
					<div class="border">
						<img class="shirt_img sizeable" src="<?= base_url('public/image/').$shirt->img.".png"?>" alt="shirt<?= $key ?>">
					</div>
				</div>
				<div class="shirt_content">
					<?php if(!$shirt->is_available){ ?>
					<h4 style="color: #8E0000;">ta koszulka jest sprzedana i znajduje sie w archiwum</h4>
					<?php } ?>
					<p> <?= $shirt->content ?> </p>
					<?php if($shirt->is_available){ ?>
					<p>PLN <?= $shirt->price ?> </p>
					<?php } ?>
				</div>
			</div>
			<?php endforeach; ?>
