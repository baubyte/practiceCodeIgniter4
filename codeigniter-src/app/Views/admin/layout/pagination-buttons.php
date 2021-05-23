<nav class="pagination is-centered is-rounded" role="navigation" aria-label="<?= lang('Pager.pageNavigation') ?>">
    <?php if ($pager->hasPreviousPage()) : ?>
        <a class="pagination-previous" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
            <span aria-hidden="true"><?= lang('Pager.first') ?></span>
        </a>
        <a class="pagination-previous" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
            <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
        </a>
    <?php endif ?>
    <?php if ($pager->hasNextPage()) : ?>
        <a class="pagination-next" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
            <span aria-hidden="true"><?= lang('Pager.next') ?></span>
        </a>
        <a class="pagination-next" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
            <span aria-hidden="true"><?= lang('Pager.last') ?></span>
        </a>
    <?php endif ?>
    <ul class="pagination-list">
        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a class="pagination-link <?= $link['active'] ? 'is-current"' : '' ?>" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>