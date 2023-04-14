
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>404</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= ACSS; ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= ACSS; ?>bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= BASE_URL;?>adminassets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?= ACSS; ?>style.css" rel="stylesheet">
    <link href="<?= ACSS; ?>style-responsive.css" rel="stylesheet" />
    <style type="text/css">
      .error-wrapper .icon-404 {
          background: url(<?= BASE_URL;?>adminassets/img/404_icon.png) no-repeat !important;
      }
    </style>

</head>

  <body class="body-404">
    <div class="container">
      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>404</h1>
          <h2>page not found</h2>
          <p class="page-404">Something went wrong or that page doesn’t exist yet. <a href="<?= BASE_URL;?>dashboard">Return Home</a></p>
      </section>
    </div>
  </body>
</html>
