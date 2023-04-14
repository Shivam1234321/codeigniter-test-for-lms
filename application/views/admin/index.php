<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require "template/CssLink.php"; ?>

  </head>

  <body class="light-sidebar-nav">

  <section id="container">
      <!--header start-->
      <?php require "template/TopBar.php"; ?>
      <!--header end-->
      <!--sidebar start-->
      <?php require "template/SideBar.php"; ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index"><i class="fa fa-home"></i> Home</a></li>
                              <!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Data</li> -->
                          </ol>
                      </nav>
                      <!--breadcrumbs end -->
                  </div>
              </div>

              <!--state overview start-->

             <?php require "template/Card.php"; ?>
              <!--state overview end-->

              

          </section>
      </section>
      <!--main content end-->

     

      <!--footer start-->
      <?php require "template/Footer.php"; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php require "template/ScriptLink.php"; ?>

  </body>
</html>

<script type="text/javascript">
  function getCount(num,id){
    countUp(num,id);
  }
</script>

<?php
  if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='success'){
    echo "<script>
      Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Login Successful',
            showConfirmButton: false,
            timer: 1500
          });
    </script>";
  }
?>
<?php
  if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="password"){
    echo "<script>
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your password change',
            showConfirmButton: false,
            timer: 1500
          });
    </script>";
  }
  ?>