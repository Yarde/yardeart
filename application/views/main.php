<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

		<?php $shirts = $shirt_content['shirts']; ?>
		<div class="container">
		<?php if(isset($info))echo $info; ?>
		<?php $last = count($shirts)-1; ?>
		<?php	foreach ($shirts as $key=>$shirt): ?>
				<div class="<?= ($key%2==0) ? "left" : "right"?>">
					<a href="<?= base_url('Shirt').'?id='.$shirt->id_shirt?>">
						<img class="shirt_img" src="<?= base_url('public/image/').$shirt->img.".png"?>" alt="shirt<?= $key ?>">
					</a>
				</div>
			
			<?php endforeach; ?>

		</div>
