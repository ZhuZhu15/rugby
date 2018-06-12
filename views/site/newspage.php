<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'News';

?>
<div class="row">
<div class="col-sm-8">
<h1><?= $articles->title ?> </h1>
<img class="news-image" src="/uploads/<?= $articles->image ?>" style="width:100%;"/>

<h5><?= nl2br($articles->content) ?></h5>
<?php Pjax::begin(); ?>
<?= $this->render('/partials/comments', [
                'comments' => $comments,
            ]);?>

<div class="article-form col-sm-5">

<?php $form = ActiveForm::begin(['options' => ['data' => ['pjax' => true]]]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'value' => ""])->label('Имя:') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'value' => ""])->label('Адрес электронной почты:') ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6,  'value' => ""])->label('Комментарий:') ?>

    <div class="form-group">
        <?= Html::submitButton('Оставить комментарий', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>

</div>


<div class="col-sm-3">
<?= $this->render('/partials/sidebar', [
                'populars' => $populars,
                'recents' => $recents,
            ]);?>
</div>
</div> <!-- /div row -->




<?php
/*
$js = <<<JS
$('form').on('beforeSubmit', function(){
var data = $(this).serialize();
$.ajax({
url: '',
type: 'POST',
data: data,
});
return false;
});
JS;
$this->registerJs($js);
*/
?>