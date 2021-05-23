<!-- Extendemos del Layout Principal -->
<?= $this->extend('front/layout/main') ?>
<!-- Seccion Titulo -->
<?= $this->section('title') ?>
Ingreso
<?= $this->endSection() ?>
<!-- Seccion Contenido -->
<?= $this->section('content') ?>
<section class="section">
    <div class="container">
        <section class="section">
            <h1 class="title">¡Iniciar Sesión! 🦸</h1>
            <h2 class="subtitle">Ingresar al Blog.</h2>
        </section>
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
        <form action="<?= base_url(route_to('signin')) ?>" method="post">
            <?= csrf_field() 
            ?>
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email" name="email" value="<?=old('email')?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </p>
                <p class="help is-danger"><?=session('errors.email')?></p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Password"  name="password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
                <p class="help is-danger"><?=session('errors.password')?></p>
            </div>
            <div class="field">
                <p class="control">
                <input type="submit" value="Ingresar" class="button is-success">
                </p>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>