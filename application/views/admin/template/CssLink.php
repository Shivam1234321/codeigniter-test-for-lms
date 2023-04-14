<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="<?= LOGO; ?>">

<title><?= $this->data['app_name']; ?> - <?= $page; ?></title>
<!-- Bootstrap core CSS -->
<link href="<?= ACSS;?>bootstrap.min.css" rel="stylesheet">
<link href="<?= ACSS;?>bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="<?= ASSETS;?>font-awesome\css\font-awesome.css" rel="stylesheet">
<link href="<?= ASSETS;?>jquery-easy-pie-chart\jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" href="<?= ACSS;?>owl.carousel.css" type="text/css">

<!--right slidebar-->
<link href="<?= ACSS;?>slidebars.css" rel="stylesheet">

<!--Data Tables -->
<link href="<?= DT;?>css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="<?= DT;?>css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="<?= DT;?>css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?= DT;?>css/responsive.dataTables.min.css">

<!-- Summernote -->

<link rel="stylesheet" type="text/css" href="<?= ASSETS?>/summernote/summernote-bs4.css">

<!-- Custom styles for this template -->

<link href="<?= ACSS?>style.css" rel="stylesheet">
<link href="<?= ACSS?>style-responsive.css" rel="stylesheet">
<link href="<?= SA?>/sweetalert2.min.css" rel="stylesheet">

<style type="text/css">
	
/*Switch button start*/
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 25px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 1px;
  bottom: .8px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #9baf1f;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>