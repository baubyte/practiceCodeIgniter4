<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->renderSection('title')?>&nbsp;-&nbsp;Mi Blog</title>
    <link rel="stylesheet" href="<?=base_url('assets/bulma/css/bulma.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css')?>">
    <!-- Render de CSS -->
    <?=$this->renderSection('css')?>
</head>
<body>
    <!-- Incluimos en Header -->
    <?=$this->include('front/layout/header')?>
     <!-- Render de Contenido -->
    <?=$this->renderSection('content')?>
    <!-- Incluimos en Footer -->
    <?=$this->include('front/layout/footer')?>
    <!-- Render de JS -->
    <?=$this->renderSection('js')?>
</body>
</html>