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
        
        <?= $form->field($model, 'name')?>

		<div class="form-group">
			<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'upload', 'value' => 'upload']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>

RESULT: <?php echo $name ?>
