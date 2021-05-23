<!-- Extendemos del Layout Principal -->
<?= $this->extend('admin/layout/main') ?>
<!-- Seccion Titulo -->
<?= $this->section('title') ?>
Lista de Artículos
<?= $this->endSection() ?>
<!-- Seccion Contenido -->
<?= $this->section('content') ?>
<div class="field">
    <a class="button is-dark" href="<?= base_url(route_to('post_create')) ?>">Agregar Nuevo Articulo</a>
</div>
<?= $this->endSection() ?>