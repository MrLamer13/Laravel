<a href="<?= route('index') ?>">Главная</a>
<a href="<?= route('news.index') ?>">Все новости</a>
<a href="<?= route('categories.index') ?>">Категории</a>
<?php foreach ($categories as $key => $category): ?>
    <div style="border: 2px solid red">
        <h2><a href="<?= route('categories.show', ['id' => $key]) ?>"><?= $category['title'] ?></a></h2>
        <?php foreach ($category['news'] as $keyNews => $news): ?>
            <div style="border: 1px solid green;">
                <h3><a href="<?= route('news.show', ['id' => $keyNews]) ?>"><?= $news['title'] ?></a></h3>
                <p><?= $news['author'] ?> - <?= $news['created_at']->format('d-m-Y H:i:s') ?></p>
                <p><?= $news['description'] ?></p>
            </div><br>
            <hr>
        <?php endforeach; ?>
    </div><br>
    <hr>
<?php endforeach; ?>
