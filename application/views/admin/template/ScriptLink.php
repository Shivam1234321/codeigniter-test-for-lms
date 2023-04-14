<script src="<?= AJS;?>jquery.js"></script>
<script src="<?= AJS;?>bootstrap.bundle.min.js"></script>
<script class="include" type="text/javascript" src="<?= AJS;?>jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= AJS;?>jquery.scrollTo.min.js"></script>
<script src="<?= AJS;?>jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= AJS;?>jquery.sparkline.js" type="text/javascript"></script>
<script src="<?= ASSETS;?>jquery-easy-pie-chart\jquery.easy-pie-chart.js"></script>
<script src="<?= AJS;?>owl.carousel.js"></script>
<script src="<?= AJS;?>jquery.customSelect.min.js"></script>
<script src="<?= AJS;?>respond.min.js"></script>

<!--right slidebar-->
<script src="<?= AJS;?>slidebars.min.js"></script>

<!--common script for all pages-->
<script src="<?= AJS;?>common-scripts.js"></script>


<!--Data Tables js-->
<script src="<?= DT;?>/js/jquery.dataTables.min.js"></script>
<script src="<?= DT;?>/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= DT;?>/js/dataTables.buttons.min.js"></script>
<script src="<?= DT;?>/js/buttons.bootstrap4.min.js"></script>
<script src="<?= DT;?>/js/jszip.min.js"></script>
<script src="<?= DT;?>/js/pdfmake.min.js"></script>
<script src="<?= DT;?>/js/vfs_fonts.js"></script>
<script src="<?= DT;?>/js/buttons.html5.min.js"></script>
<script src="<?= DT;?>/js/buttons.print.min.js"></script>
<script src="<?= DT;?>/js/buttons.colVis.min.js"></script>

<script src="<?= DT;?>/js/dataTables.responsive.min.js"></script>
<script src="<?= DT;?>/js/responsive.bootstrap.min.js"></script>

<!-- summernote -->
<script type="text/javascript" src="<?= ASSETS;?>summernote/summernote-bs4.min.js"></script>

<script src="<?= AJS;?>print-pdf.js"></script>
<script src="<?= AJS;?>print.js"></script>
<script src="<?= AJS;?>html2pdf.bundle.min.js"></script>
<script src="<?= AJS;?>jquery-ui.min.js"></script>
<script src="<?= AJS;?>RowSorter.js"></script>
<script src="<?= AJS;?>multipleselect.js"></script>

<script type="text/javascript">
  $('.multiple').multipleSelect();
  $(".summernote").summernote();
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdpjR4H6g2ytVn55rIRoUhbIUHzLxYK5k&libraries=places"></script>

<script type="text/javascript">

function getLatLong(id){
  var geocoder = new google.maps.Geocoder();
  var address = $("#address"+id).val();

  geocoder.geocode( { 'address': address}, function(results, status) {

  if (status == google.maps.GeocoderStatus.OK) {
      var latitude = results[0].geometry.location.lat();
      var longitude = results[0].geometry.location.lng();
      $("#lat"+id).val(latitude);  
      $("#long"+id).val(longitude);  
    } 
  }); 
}

</script>

<script>
   $(document).ready(function() {
    //Default data table
     $('#datatable').DataTable();
     $('#datatable1').DataTable();
     $('#datatable2').DataTable();
     $('#datatable3').DataTable();
     $('#datatable4').DataTable();
     $('#datatable5').DataTable();

     var table = $('#example').DataTable( {
      lengthChange: false,
      responsive:true,
      buttons: [ 'copy', 'excel', 'pdf', 'print' ]
    } );

   table.buttons().container()
      .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    
    } );
 $(document).ready(function() {
   var table1 = $('#responsivetable').DataTable( {
      lengthChange: false,
      responsive:true,
      buttons: [ 'copy', 'excel' , 'pdf' ]
    } );

   table1.buttons().container()
      .appendTo( '#responsivetable_wrapper .col-md-6:eq(0)' );
    
    } );

   $('.responsivetable').DataTable( {
     lengthChange: true,
     responsive: true,
     paging: true,
    });


</script>

<!--script for this page-->
<script src="<?= AJS;?>sparkline-chart.js"></script>
<script src="<?= AJS;?>easy-pie-chart.js"></script>
<script src="<?= AJS;?>count.js"></script>
<script src="<?= SA;?>sweetalert2.min.js"></script>
<script src="<?= SA;?>notify.js"></script>
<script src="<?= AJS;?>jquery.validate.js"></script>

<script>

  //owl carousel

  $(document).ready(function() {
      $("#owl-demo").owlCarousel({
          navigation : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem : true,
          autoPlay:true

      });
  });

  //custom select box

  $(function(){
      $('select.styled').customSelect();
  });

  $(window).on("resize",function(){
      var owl = $("#owl-demo").data("owlCarousel");
      owl.reinit();
  });

</script>

<script type="text/javascript">
    <?php 
    if ($this->session->flashdata('success')) { ?>
          $.notify("<?= $this->session->flashdata('success'); ?>","success");
    <?php  } ?>
    <?php 
        if ($this->session->flashdata('error')) { ?>
           $.notify("<?= $this->session->flashdata('error'); ?>","error");
    <?php } ?> 
</script> 

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="logoutModal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-sign-out"></i> Logout?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure for logout?</p>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <a href="<?= BASE_URL;?>adminlogout" class="btn btn-danger text-white" type="button">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- modal -->

<script type="text/javascript">
  //var current = window.location.pathname
  var current =  window.location.href;

    $(".sidebar-menu >li a").filter(function() {

        var link = $(this).attr("href");
        //alert(link);
        if(link){ 
            //alert(current.indexOf(link));
              //alert(current.indexOf(link));
            if (current.indexOf(link) != -1) {
                //$("a").removeClass("active");
                $(this).addClass('active');
                $(this).parents().children('a').addClass('active');
                $(this).parents().parents().children('ul').css('display', 'block');
                $(this).addClass('active');
                $(this).parent().parent().parent().children('a').find('div').replaceWith('<div class="according-menu"><i class="fa fa-angle-down"></i></div>');
                $(this).parent().parent().parent().parent().parent().children('a').find('div').replaceWith('<div class="according-menu"><i class="fa fa-angle-down"></i></div>');
                return false;
            }
        }
    });
</script>

<!--Diffrent Browser Modal -->
<div class="modal fade" id="differentBrowserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your browser is a bit unusual...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
        <div class="col-sm-12">
        <span><b id="differentBrowserTex">Try disabling ad blockers and other extensions, enabling javascript, or using a different web browser.</b></span>
      </div>
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
