<div class="top-popular" style="background: rgb(219, 219, 219); text-align:center;">
<h3> Популярные статьи </h3>
<?php foreach ($populars as $popular): ?>
<a href="/site/newspage/?id=<?= $popular->id ?>"><?= $popular->title ;?></a>
<br>
<a href="/site/newspage/?id=<?= $popular->id ?>"><img  src="/uploads/<?= $popular->image ?>" style="width: 100px;" /></a>
<br/>
<h5>Просмотров <?= $popular->viewed ?></h5>
<br/>
<?php endforeach; ?>
</div>
<div class="recent" style="background: rgb(219, 219, 219); text-align: center;">
<h3> Последние статьи </h3>
<?php foreach ($recents as $recent): ?>
<a href="/site/newspage/?id=<?= $recent->id ?>"><?= $recent->title ;?></a>
<br>
<a href="/site/newspage/?id=<?= $recent->id ?>"><img  src="/uploads/<?= $recent->image ?>" style="width: 100px;" /></a>
<br/>
<?= date("d.m.Y", strtotime($recent->date)) . ' ' . date("H:i", strtotime($recent->time)); ?>
<hr>
<br/>
<?php endforeach; ?>
</div>