<!-- Extendemos del Layout Principal -->
<?= $this->extend('front/layout/main') ?>
<!-- Seccion Titulo -->
<?= $this->section('title') ?>
Registro
<?= $this->endSection() ?>
<?= $this->section('css')?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<?= $this->endSection() ?>
<!-- Seccion Contenido -->
<?= $this->section('content') ?>
<div class="container">
  <section class="section">
    <h1 class="title">¡Registrate Ahora! 🦸</h1>
    <h2 class="subtitle">Solo debes completar el formulario, para comenzar a publicar.</h2>
  </section>
  <form action="<?=base_url(route_to('store'))?>" method="post">
  <?= csrf_field() ?>
  <div class="field">
    <label class="label">Nombres</label>
    <div class="control">
      <input name="name" class="input" type="text" placeholder="Ingresa tu Nombre" value="<?=old('name')?>">
    </div>
    <p class="help is-danger"><?=session('errors.name')?></p>
  </div>
  <div class="field">
    <label class="label">Apellidos</label>
    <div class="control">
      <input name="surname" class="input" type="text" placeholder="Ingresa tu Apellido" value="<?=old('surname')?>">
    </div>
    <p class="help is-danger"><?=session('errors.surname')?></p>
  </div>
  <div class="field">
    <label class="label">Correo Electrónico</label>
    <div class="control has-icons-left has-icons-right">
      <input name="email" class="input" type="email" placeholder="Ingresa tu Correo Electrónico" value="<?=old('email')?>">
      <span class="icon is-small is-left">
        <i class="fas fa-envelope"></i>
      </span>
      <p class="help is-danger"><?=session('errors.email')?></p>
    </div>
  </div>
  <div class="field">
    <label class="label">Elige tu País</label>
    <div class="control">
      <div class="select">
        <select name="country_id">
        <option disabled selected>Elige un País</option>
        <?php foreach ($countries as $country): ?>
          <option value="<?=$country->id?>" <?=($country->id==old('country_id')) ? 'selected' : ''?>><?=$country->name?></option>
        <?php endforeach;?>
        </select>
      </div>
      <p class="help is-danger"><?=session('errors.country_id')?></p>
    </div>
  </div>
  <div class="field">
    <label class="label">Contraseña</label>
    <div class="control">
      <input name="password" class="input" type="password" placeholder="Ingresa tu Contraseña" value="">
    </div>
    <p class="help is-danger"><?=session('errors.password')?></p>
  </div>
  <div class="field">
    <label class="label">Confirma tu Contraseña</label>
    <div class="control">
      <input name="password_confirm" class="input" type="password" placeholder="Confirma tu Contraseña">
    </div>
    <p class="help is-danger"><?=session('errors.password')?></p>
  </div>
  <div class="field is-grouped">
    <div class="control">
      <button class="button is-success">Registrarme</button>
    </div>
  </div>
  </form>
</div>
<?= $this->endSection() ?>