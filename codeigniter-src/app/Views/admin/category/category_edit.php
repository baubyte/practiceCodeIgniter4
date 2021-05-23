<!-- Extendemos del Layout Principal -->
<?= $this->extend('admin/layout/main') ?>
<!-- Seccion Titulo -->
<?= $this->section('title') ?>
Editar de Categoria - <?=$category->name?>
<?= $this->endSection() ?>
<!-- Seccion Contenido -->
<?= $this->section('content') ?>
<form action="<?= base_url(route_to('category_update')) ?>" method="post">
    <?= csrf_field() ?>
    <div class="field">
        <label class="label">Nombre de la Categoria</label>
        <div class="control">
            <input name="name" class="input" type="text" placeholder="Nombre" value="<?=old('name') ??$category->name?>">
            <input name="id" type="hidden" value="<?=$category->id?>">
        </div>
        <p class="help is-danger"><?=session('errors.name')?></p>
    </div>
    <div class="field">
        <div class="control">
            <input class="button is-dark" type="submit" value="Guardar">
        </div>
    </div>
    </div>
</form>
<?= $this->endSection() ?>