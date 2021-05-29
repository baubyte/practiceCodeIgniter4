<div class="columns is-multiline">
    <?php foreach ($posts as $post) : ?>
        <div class="column is-one-quarter">
            <div class="columns">
                <div class="column">
                    <a href="<?= $post->getRouteArticle() ?>">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="<?= $post->getLinkImage() ?>" alt="cover">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="user">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4"><?= $post->title ?></p>
                                        <p class="subtitle is-6"><?= $post->author->getFullName() ?></p>
                                    </div>
                                </div>

                                <div class="content">
                                    <?= character_limiter(strip_tags($post->body), 10) ?>
                                    <br>
                                    <?php if (!empty($post->getCategories())) : ?>
                                        <?php foreach ($post->getCategories()  as $category) : ?>
                                            <a href="#">#<?= $category->name ?></a>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                    <br>
                                    <time datetime="2016-1-1"><?= $post->published_at->humanize() ?></time>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>