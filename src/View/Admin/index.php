<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? "Bảng điều khiển"; ?></title>
  <!-- Bootstrap CSS 5.1.3 -->
  <link href="/public/plugins/bootstrap/bootstrap.min.css" rel="stylesheet" />
  <!-- wysiwyg-editor 4.1.3 -->
  <link href="/public/plugins/froala-editor/froala_editor.pkgd.min.css" rel="stylesheet" />
  <link href="/public/assets/css/admin/style.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
    crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="/public/assets/images/admin/favicon.png">
</head>

<body class="sb-nav-fixed">
  <?= require_once "components/header.php"; ?>

  <div id="layoutSidenav">
    <?= require_once "components/menu.php"; ?>
    <?= require_once "components/success-alert.php"; ?>
    <?= require_once "components/error-alert.php"; ?>

    <div id="layoutSidenav_content">
      <div class="container-fluid p-4">
        <?php require_once $pageName; ?>
      </div>
    </div>
  </div>

  <!-- Bootstrap CSS 5.1.3 -->
  <script src="/public/plugins/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- wysiwyg-editor 4.1.3 -->
  <script src="/public/plugins/froala-editor/froala_editor.pkgd.min.js"></script>
  <script src="/public/assets/js/admin/scripts.js"></script>

  <script>
    new FroalaEditor('textarea');
  </script>
</body>

</html>