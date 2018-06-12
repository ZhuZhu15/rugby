<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'New page';
/*
$this->params['breadcrumbs'][] = $this->title;
*/
?>
<div class="row">
	<div class="col-lg-5">

		<?php $form = ActiveForm::begin(['id' => 'a-form']); ?>

		<?= $form->field($model, 'a')?>

		<?= $form->field($model, 'b')?>


		<div class="form-group">
			<?= Html::submitButton('Вывести Сумму', ['class' => 'btn btn-primary', 'name' => 'Sum', 'value' => 'Sum']) ?>
		</div>
		<div class="form-group">
			<?= Html::submitButton('Вывести Разницу', ['class' => 'btn btn-primary', 'name' => 'Minus', 'value' => 'Minus']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>

RESULT: <?php echo $c . '  '. $a ?>