<a href="<?= route('index') ?>">Главная</a>
<a href="<?= route('news.index') ?>">Все новости</a>
<a href="<?= route('categories.showAll') ?>">Все новости по категориям</a>
<h1>Категории:</h1>
<?php foreach ($categories as $key => $category): ?>
    <div>
        <h2><a href="<?= route('categories.show', ['id' => $key]) ?>"><?= $category['title'] ?></a></h2>
    </div><br>
    <hr>
<?php endforeach; ?>
