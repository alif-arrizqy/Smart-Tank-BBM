<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/assets/images/favicon.png') ?>">
    <title>Smart Tanki BBM</title>

    <!-- CSS -->
    <?= $this->include('layout/css') ?>

</head>

<body class="skin-default fixed-layout">
    <div id="main-wrapper">
        <!-- Right Panel -->
        <?= $this->include('layout/nav') ?>
        <?= $this->include('layout/menu') ?>
        <!-- /#Right Panel -->
        <!-- Content -->
        <?= $this->renderSection('content'); ?>
        <!-- Footer -->
        <?= $this->include('layout/footer') ?>
        
        <!-- /.site-footer -->
    </div>
    <!-- JS -->
    <?= $this->include('layout/js') ?>
</body>