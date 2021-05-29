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
<div class="table-container">
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th><abbr title="ID">ID</abbr></th>
                <th><abbr title="name">Titulo</abbr></th>
                <th><abbr title="updated_at">Publicación</abbr></th>
                <th><abbr title="created_at">Creado</abbr></th>
                <th><abbr title="updated_at">Actualizado</abbr></th>
                <th><abbr title="actions">Acciones</abbr></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><abbr title="ID">ID</abbr></th>
                <th><abbr title="name">Titulo</abbr></th>
                <th><abbr title="updated_at">Publicación</abbr></th>
                <th><abbr title="created_at">Creado</abbr></th>
                <th><abbr title="updated_at">Actualizado</abbr></th>
                <th><abbr title="actions">Acciones</abbr></th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <td>
                        <?= $post->id ?>
                    </td>
                    <td>
                        <?= $post->title?>
                    </td>
                    <td>
                        <!-- Usamos un Método que forma parte de la entidades Entidades -->
                        <?= $post->published_at->humanize() ?>
                    </td>
                    <td>
                        <!-- Usamos un Método que forma parte de la entidades Entidades -->
                        <?= $post->created_at->humanize() ?>
                    </td>
                    <td>
                        <!-- Usamos un Método que forma parte de la entidades Entidades -->
                        <?= $post->updated_at->humanize() ?>
                    </td>
                    <td>
                        <a class="button is-success is-small" href="<?= $post->getRouteEdit() ?>">Editar</a>
                        <a class="button is-danger is-small" href="<?= $post->getRouteDelete() ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Generamos los Links de Pagination -->
<?= $pager->links() ?>
<?= $this->endSection() ?>