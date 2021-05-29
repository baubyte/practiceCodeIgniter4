<!-- Extendemos del Layout Principal -->
<?= $this->extend('front/layout/main') ?>
<!-- Seccion Titulo -->
<?= $this->section('title') ?>
<?= $post->title ?>
<?= $this->endSection() ?>
<!-- Seccion Contenido -->
<?= $this->section('content') ?>
<section class="section">
    <div class="content">
        <img src="<?= $post->getLinkImage() ?>" alt="" style="width: 100%;height: 300px;object-fit:cover;">
        <h1><?= $post->title ?></h1>
        <!-- se puede usar sin getAuthor() lo mismo que para getFullName() -->
        <h3>Por: <?= $post->author->fullName ?></h3>
        <p>Fecha: <?= $post->published_at->humanize() ?></p>
        <div class="tags are-medium">
            <!-- aplicamos lo mismo getCategories() es lo mismo que solo categories -->
            <?php foreach ($post->categories as $category) : ?>
                <span class="tag"><?= $category->name ?></span>
            <?php endforeach; ?>
        </div>
        <p><?= $post->body ?></p>
    </div>
</section>
<section class="section">
    <h4>Artículos Relacionados</h4>
    <!-- // FiltrosPassing Parameter Array -->
    <?php foreach ($post->categories as $category) : ?>
        <?= view_cell('\App\Controllers\Front\Home::filter', ['category' => $category->name, 'limit' => 2]) ?>
    <?php endforeach; ?>
</section>
<?= $this->endSection() ?>