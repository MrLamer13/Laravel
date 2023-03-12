<a href="<?= route('index') ?>">Главная</a>
<a href="<?= route('news.index') ?>">Все новости</a>
<a href="<?= route('categories.index') ?>">Категории</a>
<a href="<?= route('categories.showAll') ?>">Все новости по категориям</a>
<h1><?= $category[1]['title'] ?></h1>
<?php foreach ($category[1]['news'] as $key => $news): ?>
    <div style="border: 1px solid green;">
        <h2><a href="<?= route('news.show', ['id' => $key]) ?>"><?= $news['title'] ?></a></h2>
        <p><?= $news['author'] ?> - <?= $news['created_at']->format('d-m-Y H:i') ?></p>
        <p><?= $news['description'] ?></p>
    </div><br>
    <hr>
<?php endforeach; ?>

