
<h1>Новости</h1>
<?php foreach ($newsList as $newsItem):?>
	<h3><?= $newsItem['title']; ?></h3>
	<p><?= $newsItem['description']; ?></p>
<?php endforeach;?>
