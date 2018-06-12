<h2> Комментарии: </h2>

<?php foreach ($comments as $comment): ?>
<div class="comment" style="margin-top: 5px; background: rgb(219, 219, 219); ">
<span style="font-weight:bold;"><?= $comment['name'] ?></span> <span style="float:right;"><?=$comment['date'] . ' '. $comment['time']?></span>
</br>
<?= $comment['comment'] . "<br/>" ?>
</div>
<?php endforeach; ?>

<h2>Оставить комментарии:</h2>
<br/>