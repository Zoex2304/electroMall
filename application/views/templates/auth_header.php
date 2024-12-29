<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_name; ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/'); ?><?= $css_page; ?>">
  <script src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>
  <?php if(isset($js_controller_custom)): ?><script src="<?= base_url('assets/'); ?><?= $js_controller_custom; ?>" type="module" defer></script><?php endif ?>
  
</head>

<body>
  <?php $userCredentials = $this->session->userdata('userCredentials') ?? ''; ?>
  <?php if (isset($userCredentials) && !empty($userCredentials) && $userCredentials['user_role'] !== "GRNT000191079151"): ?>
    <?= $navbar ?? ''; ?>
  <?php endif ?>  