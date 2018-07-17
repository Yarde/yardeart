<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $shirts = $shirt_content['shirts']; ?>
			<?php $last = count($shirts)-1; ?>
			<?php	foreach ($shirts as $key=>$shirt): ?>
			<div class="img_container">
				<div class="img_box">
					<div class="border">
						<img class="shirt_img sizeable" src="<?= base_url('public/image/').$shirt->img?>" alt="shirt<?= $key ?>">
					</div>
				</div>
				<div class="shirt_content">
					<?php if(!$shirt->is_available){ ?>
						<?php if(isset($_SESSION['lang'])){if($_SESSION['lang']=="en"){?>
						<?php echo  "<h4 style='color: #8E0000;'>this shirt is sold out and it's only in gallery</h4>";?>
						<?php }else{?>
						<?php echo  "<h4 style='color: #8E0000;'>ta koszulka jest sprzedana i znajduje sie w archiwum</h4>";?>
						<?php }}?>
					<?php } ?>
					<p> <?= $shirt->content ?> </p>
					<?php if($shirt->is_available){ ?>
						<?php if($_SESSION['lang']=="en"){?>
						<p>size - <?= $shirt->size ?> </p>
						<p>price - <?= $shirt->price ?> PLN</p>
						<p>questions? mail to yarde.art98@gmail.com</p>
						<?php }else{?>
							<p>rozmiar - <?= $shirt->size ?> </p>
							<p>cena - <?= $shirt->price ?> PLN</p>
							<p>pytania? pisz na yarde.art98@gmail.com</p>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<?php endforeach; ?>
