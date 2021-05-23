<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?>&nbsp;-&nbsp;Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/bulma/css/bulma.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>">
    <!-- Render de CSS -->
    <?= $this->renderSection('css') ?>
</head>

<body>
    <!-- Incluimos en Header -->
    <?= $this->include('admin/layout/header') ?>
    <section class="section">
        <div class="container">
        <?php if(!empty(session('msg'))):?>
        <article class="message is-<?=session('msg.type')?>">
            <div class="message-header">
                <p><?=session('msg.header')?></p>
                <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
               <?=session('msg.body')?>
            </div>
        </article>
        <? endif;?>
            <!-- Render de Contenido -->
            <?= $this->renderSection('content') ?>
        </div>
    </section>
    <!-- Render de JS -->
    <?= $this->renderSection('js') ?>
</body>

</html>