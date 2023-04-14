<?php defined("BASEPATH") OR exit("No direct script access allowed."); ?>
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
                              <li class="breadcrumb-item"><a href="<?= BASE_URL;?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                              <li class="breadcrumb-item"><a href="#"><?= $page; ?></a></li>
                              <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
                          </ol>
                      </nav>
                      <!--breadcrumbs end -->
                  </div>
              </div>

              <!--state overview start-->
              
              <div class="card">
                <div class="card-header"><span class="h3"><?= $page; ?></span> 
                  <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
                </div>
                <div class="card-body">

                    <div class="row">

                      <div class="col-sm-12">
                        <div class="table-responsive">
                          <table class="table table-hover table-bordered" id="datatable">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Date</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php if(count($category)>0): $i=1; ?>
                                <?php foreach($category as $val): ?>
                                  <tr>
                                    <td><?= $i++; ?></td>
                                    <td>
                                      <div class="btn-group btn-group-justified">
                                        <button  type="button" class="btn btn-danger btn-sm" onclick="Delete(<?= $val['category_id'];?>)"><i class="fa fa-times"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#editCategoryModal" data-category_id="<?= $val['category_id'];?>" data-name="<?= $val['name'];?>"  data-description="<?= $val['description'];?>" data-image="<?= $val['image']?>" data-image_url="<?= $val['image_url']?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>

                                      </div>
                                      <label class="switch">
                                        <input type="checkbox" <?php if($val['status']==1){ echo "checked";  }?> onclick="Status('<?= $val['category_id'];?>')">>
                                        <span class="slider round"></span>
                                      </label>
                                    </td>
                                    <td><?= $val['name']; ?></td>
                                    <td><img src="<?= BASE_URL.$val['image_url'].$val['image']; ?>" style="height:100px;width:100px;"></td>
                                    <td><?= $val['description'];?></td>
                                    <td><?= date("d M, Y",strtotime($val['date'])); ?></td>
                                  </tr>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            </tbody>

                          </table>
                        </div>
                      </div>  
                      

                    </div>
                </div>
              </div>
            
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
    <!-- Add Category -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="addCategory" enctype="multipart/form-data">
            <?= form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="name">Enter Name</label>
                  <?= form_input(["class"=>"form-control","name"=>"name","id"=>"name","placeholder"=>"Enter Category","required"=>"required"]);?>
                </div>
                <div class="form-group">
                  <label for="image">Select Image</label>
                  <?= form_input(["class"=>"form-control","name"=>"image","id"=>"image","placeholder"=>"Enter Category","required"=>"required","type"=>"file","accept"=>"image/*"]);?>
                </div>
                <div class="form-group">
                  <label for="description">Enter Description</label>
                  <?= form_textarea(["class"=>"form-control","name"=>"description","id"=>"description","placeholder"=>"Enter Description","required"=>"required","rows"=>"2"]);?>
                </div>

                <div class="button-group">
                  <button class="btn btn-primary btn-sm" name="submit" value="addCategory">Submit</button>
                </div>

              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  </body>
</html>

<script type="text/javascript">
    $("#addCategory").validate({
       ignore: ":hidden",
       rules:{
         name:{
           required:true,
         },
         image:{
          required:true
         },
         description:{
          required:true
         }
          
       },
       messages:{
         name:{
           required:"Enter Name",
         },
         image:{
          required:"Select Image"
         },
         description:{
          required:"Enter Description"
         }
       },
       submitHandler: function (form) {

         $.ajax({ 
           type: "POST",
           url: '<?= BASE_URL;?>addCategory',
           data: new FormData(form),
           mimeType: "multipart/form-data",
           contentType: false,
           processData: false,
            beforeSend: function(){
              $('#addCategory').find('[name="submit"]').attr("disabled",true);
            },
            complete: function(){
              $('#addCategory').find('[name="submit"]').attr("disabled",false);
            },
            success: function(e){ 
              var res=JSON.parse(e);
              if (res[0].status==0){
                $.notify(res[0].msg,'error');
                $('#addCategory').find('[name="submit"]').attr("disabled",true);
              }else{
                $.notify(res[0].msg,"success");
                setTimeout(function(){ location.reload(); }, 2500);
              }
            },
            error:function(){
              $.notify("Server error occure.","error");
              $('#addCategory').find('[name="submit"]').attr("disabled",true);
            }
           
         });
         return false; // required to block normal submit since you used ajax
       }
    });   
</script>

 <!-- Add Category -->
  <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="editCategory" enctype="multipart/form-data">
            <?= form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
            <?= form_hidden("category_id");?>
            <?= form_hidden("oimg");?>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="name">Enter Name</label>
                  <?= form_input(["class"=>"form-control","name"=>"name","placeholder"=>"Enter Category","required"=>"required"]);?>
                </div>
                <div class="form-group">
                  <label for="image">Select Image</label>
                  <?= form_input(["class"=>"form-control","name"=>"image","placeholder"=>"Enter Category","type"=>"file","accept"=>"image/*"]);?>
                </div>
                <div class="form-group">
                  <label for="description">Enter Description</label>
                  <?= form_textarea(["class"=>"form-control","name"=>"description","placeholder"=>"Enter Description","required"=>"required","rows"=>"2"]);?>
                </div>

                <div class="button-group">
                  <button class="btn btn-primary btn-sm" name="submit" value="editCategory">Submit</button>
                </div>

              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#editCategoryModal').on('show.bs.modal', function (e) {
          if (e.namespace === 'bs.modal') {
              var opener=e.relatedTarget;

              var category_id           = $(opener).attr('data-category_id');
              var name                 = $(opener).attr('data-name');
              var description                 = $(opener).attr('data-description');
              var image              = $(opener).attr('data-image');
              var image_url               = $(opener).attr('data-image_url');
            
        
               $('#editCategory').find('[name="category_id"]').val(category_id);
               $('#editCategory').find('[name="name"]').val(name);
               $('#editCategory').find('[name="description"]').val(description);
               $('#editCategory').find('[name="oimg"]').val(image);
             
          }
      });
  });
  </script>

 <script type="text/javascript">
    $("#editCategory").validate({
       ignore: ":hidden",
       rules:{
         name:{
           required:true,
         },
         description:{
          required:true
         }
          
       },
       messages:{
         name:{
           required:"Enter Name",
         },
         description:{
          required:"Enter Description"
         }
       },
       submitHandler: function (form) {

         $.ajax({ 
           type: "POST",
           url: '<?= BASE_URL;?>addCategory',
           data: new FormData(form),
           mimeType: "multipart/form-data",
           contentType: false,
           processData: false,
            beforeSend: function(){
                $('#editCategory').find('[name="submit"]').attr("disabled",true);
            },
            complete: function(){
               $('#editCategory').find('[name="submit"]').attr("disabled",false);
            },
            success: function(e){ 
              var res=JSON.parse(e);
              if (res[0].status==0){
                $.notify(res[0].msg,'error');
                $('#editCategory').find('[name="submit"]').attr("disabled",true);
              }else{
                $.notify(res[0].msg,"success");
                setTimeout(function(){ location.reload(); }, 2500);
              }
            },
            error:function(){
               $.notify("Server error occure.","error");
               $('#editCategory').find('[name="submit"]').attr("disabled",true);
            }
           
         });
         return false; // required to block normal submit since you used ajax
       }
    });   


    function Delete(id){
    Swal.fire({
      title: 'Are you sure?',
      text: "Are you sure delete this data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url:"<?= BASE_URL;?>dashboard/delete",
          type:"post",
          data:{"id":id,"table":"category","field":"category_id","<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>"},
          success:function(data){
            location.reload();
           }
          });
      }
      else{
        //location.reload();
      }
    });
  }

  function Status(id){
    Swal.fire({
      title: 'Are you sure?',
      text: "Are you sure!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, change it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url:"<?= BASE_URL;?>dashboard/status",
          type:"post",
          data:{"id":id,"table":"category","field":"category_id","<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>"},
          success:function(data){
           location.reload();
           }
          });
      }
      else{
        //location.reload();
      }
    });
  }

</script> 
