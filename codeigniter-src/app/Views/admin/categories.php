<!-- Extendemos del Layout Principal -->
<?= $this->extend('admin/layout/main') ?>
<!-- Seccion Titulo -->
<?= $this->section('title') ?>
Lista de CAtegorias
<?= $this->endSection() ?>
<!-- Seccion Contenido -->
<?= $this->section('content') ?>
<h1>Lista de Categorias</h1>
<a href="<?=base_url(route_to('category_create'))?>">Agregar Categoria</a>
<?= $this->endSection() ?>