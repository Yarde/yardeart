<?php defined('BASEPATH') or exit('No direct script access allowed'); 
?>
<div class="setting">
	<h3>Wybierz epoke</h3>
	<div class="text">
		<div class="option">
			<label>
				<input type="radio" name="epoka" value="0">
				Wszystkie
				<div class="border"></div>
			</label>
		</div>
		<div class="option">
			<label>
				<input type="radio" name="epoka" value="star">
				Starozytnosc
				<div class="border"></div>
			</label>
		</div>
		<div class="option">
			<label>
				<input type="radio" name="epoka" value="sre">
				Sredniowiecze
				<div class="border"></div>
			</label>
		</div>
		<div class="option">
			<label>
				<input type="radio" name="epoka" value="now">
				Nowozytnosc
				<div class="border"></div>
			</label>
		</div>
		<div class="option">
			<label>
				<input type="radio" name="epoka" value="wsp">
				Wspólczesnosc
				<div class="border"></div>
			</label>
		</div>
	</div>
	<button class="close-setting btn btn-primary btn-md">Filtruj</button>
</div>
<?php $questions = $quiz_content['questions']; ?>
<?php shuffle($questions); ?>
<div class="container">
<form class="quiz_form col-lg-10 col-lg-offset-1 col-md-12
				col-sm-12  col-sx-12" action="" method="post">
<?php $last = count($questions)-1; ?>
<?php	foreach ($questions as $key=>$question): ?>
<?php	shuffle_assoc($question->answers) ?>
	<div class="question<?= ($key==0) ? '' : ' hidden' ?>" id="<?= $question->id_question ?>">
		<img src="<?= base_url('public/image/quiz/').$question->img.".jpg"?>" class="img col-lg-8  col-md-10 
				col-sm-10 col-sx-10 " alt="zdjecie do pytania"><br/>
			<p class="question_content"><?= $question->content ?></p>
			<?php foreach ($question->answers as $letter => $answer): ?>
				<div class="option">
					<label>
						<input type="radio" name="<?= $question->id_question ?>" value="<?= $letter ?>"><?= $answer ?>
						<div class="border">
						</div>
					</label>
				</div>
			<?php endforeach; ?>
			<?php if($key!=$last): ?>
				<button type="button" class="next btn btn-primary">Nastepny</button>
			<?php else: ?>
				<input type="submit" class="btn btn-success" value="Zakoncz quiz">
			<?php endif; ?>
	</div>
	<?php endforeach; ?>
</form>
</div>
