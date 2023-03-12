<a href="<?= route('index') ?>">Главная</a>
<a href="<?= route('news.index') ?>">Все новости</a>
<a href="<?= route('categories.index') ?>">Категории</a>
<a href="<?= route('categories.showAll') ?>">Все новости по категориям</a>
<div style="border: 1px solid green;">
    <h2><?= $news['title'] ?></h2>
    <p><?= $news['author'] ?> - <?= $news['created_at']->format('d-m-Y H:i') ?></p>
    <p><?= $news['description'] ?></p>
</div>
