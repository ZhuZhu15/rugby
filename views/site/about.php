<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'About';
/*
$this->params['breadcrumbs'][] = $this->title;
*/
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Это страница о контенте <?php echo $c?>
    </p>
    <?php $form = ActiveForm::begin(['id' => 'a-form']); ?>

		<?= $form->field($about, 'd')->textInput([ 'value' => ""]) ?>

        <?= $form->field($about, 'e')->textInput([ 'value' => ""]) ?>
        
		<div class="form-group">
			<?= Html::submitButton('Вывести Разницу', ['class' => 'btn btn-primary', 'name' => 'Minus', 'value' => 'Minus']) ?>
		</div>

		<?php ActiveForm::end(); ?>

    <?php echo $minus ?>

   <!-- <code><?= __FILE__ ?></code> -->
</div>
