<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h2 class='head-title'>Новости</h2>
<div class="row">
<div class="col-sm-9">
<?php foreach ($articles as $article): ?>
    
<div class="article">

        <h2><a href="/site/newspage/?id=<?= $article->id ?>"><?= $article->title ?></a></h2>
        <a href="/site/newspage/?id=<?= $article->id ?>"><img class="article-image" src="../uploads/<?= $article->image ?>" /></a>
        <a href="/site/newspage/?id=<?= $article->id ?>"><h4><?= $article->description ?></a></h4>
        Добавлено <?= date("d.m.Y", strtotime($article->date)) . ' ' . date("H:i", strtotime($article->time));  ?>
        <span style="float:right;">Просмотры <i class="fas fa-eye"></i> <?= (int) $article->viewed ?></span>
        
</div>
    <br/>
<?php endforeach; ?>


</div>

<div class="col-sm-3">
<?= $this->render('/partials/sidebar', [
                'populars' => $populars,
                'recents' => $recents,
            ]);?>
</div>

</div>


<?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>


