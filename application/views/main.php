<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
		<?php $shirts = $shirt_content['shirts']; ?>
		<?php if(isset($info))echo $info; ?>
		<div class="img_container">
			<?php $last = count($shirts)-1; ?>
			<?php	foreach ($shirts as $key=>$shirt): ?>
				<div class="img_box">
					<a class="border" href="<?= base_url('Shirt').'?id='.$shirt->id_shirt?>">
						<img class="shirt_img" src="<?= base_url('public/image/').$shirt->img?>" alt="shirt<?= $key ?>">
					</a>
				</div>
			<?php endforeach; ?>
		</div>
