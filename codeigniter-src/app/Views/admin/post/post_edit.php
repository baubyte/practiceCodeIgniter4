<!-- Extendemos del Layout Principal -->
<?= $this->extend('admin/layout/main') ?>
<!-- Seccion Titulo -->
<?= $this->section('title') ?>
Editar Articulo - <?=$post->title?>
<?= $this->endSection() ?>
<!-- Seccion Contenido -->
<?= $this->section('content') ?>
<form action="<?= base_url(route_to('post_store')) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="columns">
        <div class="column is-four-fifths">
            <div class="field">
                <label class="label">Titulo</label>
                <div class="control">
                    <input name="title" class="input" type="text" placeholder="Titulo" value="<?= old('title') ?? $post->title ?>">
                </div>
                <p class="help is-danger"><?= session('errors.title') ?></p>
            </div>
            <div class="field">
                <label class="label">Cuerpo</label>
                <div class="control">
                    <textarea id="body" name="body" class="textarea" type="text" placeholder="Cuerpo"><?= old('body') ?? $post->body ?></textarea>
                </div>
                <p class="help is-danger"><?= session('errors.body') ?></p>
            </div>
        </div>
        <div class="column">

            <div class="field">
                <label class="label">Fecha de Publicación</label>
                <div class="control">
                    <input name="published_at" class="input" type="date" placeholder="Fecha de Publicación" value="<?= old('published_at') ?? $post->published_at->toDateString() ?>">
                </div>
                <p class="help is-danger"><?= session('errors.published_at') ?></p>
            </div>
            <div class="field">
                <label class="label">Categorías</label>
                    <div class="field">
                        <?php foreach ($categories as $category) : ?>
                            <label class="checkbox">
                                <input type="checkbox" name="categories[]" value="<?= $category->id?>"
                                    <?php
                                        //Si no esta vacio
                                        if(old('categories.*'))
                                            {
                                            //si el valor se encuentra en el array
                                            echo in_array($category->id, old('categories.*'))? 'checked' : '';
                                             }else{
                                                 //seleccionamos las categorías
                                                foreach ($post->categories as $categoryPost) {
                                                    echo $categoryPost->id == $category->id ? 'checked' : '';
                                                }
                                             }
                                    ?>
                                >
                                <?= $category->name ?>
                            </label>
                        <?php endforeach; 
                        ?>
                    </div>
                    <p class="help is-danger"><?= session('errors')['categories.*'] ?? '' ?></p>
            </div>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input class="button is-fullwidth is-dark" type="submit" value="Guardar">
        </div>
    </div>
</form>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://cdn.tiny.cloud/1/rr9tne38u22uw6iq18zpidc9mwuaze2inpzvmp86glfbft1z/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: '#body',
        height: 500,
        menubar: false,
        language: 'es',
        spellchecker_language: 'es',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount code',
            'tinymcespellchecker'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | code',
        toolbar_mode: 'floating',
        content_style: 'body {font-family: Helvetica, Arial, sans-serif; font-size:14px}'
    });
</script>
<?= $this->endSection() ?>