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
                  <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addTopperModal">Add Topper</button>
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
																<th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Date</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php if(count($toppers)>0): $i=1; ?>
                                <?php foreach($toppers as $topper): ?>
                                  <tr>
                                    <td><?= $i++; ?></td>
                                    <td>
                                      <div class="btn-group btn-group-justified">
                                        <button class="btn btn-danger btn-sm" onclick="Delete(<?= $topper['topper_id'];?>)"><i class="fa fa-times"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#editTopperModal" data-topper_id="<?= $topper['topper_id'];?>" data-name="<?= $topper['name'];?>" data-category="<?= $topper['category'];?>"  data-description="<?= $topper['description'];?>" data-image="<?= $topper['image']?>" data-image_url="<?= $topper['image_url']?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>

                                      </div>
                                      <label class="switch">
                                        <input type="checkbox" <?php if($topper['status']==1){ echo "checked";  }?> onclick="Status('<?= $topper['topper_id'];?>')">>
                                        <span class="slider round"></span>
                                      </label>
                                    </td>
                                    <td><?= $this->dm->getSingleValueWhere("category",array("category_id" => $topper['category']),"name"); ?></td>
																		<td><?php echo $topper['name']; ?></td>
                                    <td><img src="<?php echo BASE_URL.$topper['image_url'].$topper['image']; ?>" style="height:100px;width:100px;"></td>
                                    <td><?php echo $topper['description'];?></td>
                                    <td><?php echo date("d M, Y",strtotime($topper['date'])); ?></td>
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
  <div class="modal fade" id="addTopperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Topper</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="addTopper" enctype="multipart/form-data">
            <?= form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
            <div class="row">
              <div class="col-sm-12">

                <div class="form-group">
                  <?= form_label("Select Category","category");?>
                  <select class="form-control" name="category" id="category" required="">
                     <option value="">Select Category</option>
                     <?php if(count($category)>0): ?>
                      <?php foreach($category as $val): ?>
                         <option value="<?= $val['category_id']; ?>"><?= $val['name']; ?></option>
                      <?php endforeach; ?>  
                     <?php endif; ?>
                  </select>
                </div>

								<div class="form-group">
									<?= form_label("Enter Name","name");?>
									<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"/>
								</div>

                <div class="form-group">
                  <label for="image">Select Image</label>
                  <?= form_input(["class"=>"form-control","name"=>"image","id"=>"image","required"=>"required","type"=>"file","accept"=>"image/*"]);?>
                </div>
                <div class="form-group">
                  <label for="description">Enter Description</label>
                  <?= form_textarea(["class"=>"form-control","name"=>"description","id"=>"description","placeholder"=>"Enter Description","required"=>"required","rows"=>"2"]);?>
                </div>

                <div class="button-group">
                  <button class="btn btn-primary btn-sm" name="submit" value="addTopper">Submit</button>
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
    $("#addTopper").validate({
       ignore: ":hidden",
       rules:{
				 name:{
					required: true
				 },
         category:{
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
				category:{
           required:"Select Catgory",
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
           url: '<?= BASE_URL;?>addTopper',
           data: new FormData(form),
           mimeType: "multipart/form-data",
           contentType: false,
           processData: false,
            beforeSend: function(){
              $('#addTopper').find('[name="submit"]').attr("disabled",true);
            },
            complete: function(){
              $('#addTopper').find('[name="submit"]').attr("disabled",false);
            },
            success: function(e){ 
              var res=JSON.parse(e);
              if (res[0].status==0){
                $.notify(res[0].msg,'error');
                $('#addTopper').find('[name="submit"]').attr("disabled",true);
              }else{
                $.notify(res[0].msg,"success");
                setTimeout(function(){ location.reload(); }, 2500);
              }
            },
            error:function(){
              $.notify("Server error occure.","error");
              $('#addTopper').find('[name="submit"]').attr("disabled",true);
            }
           
         });
         return false; // required to block normal submit since you used ajax
       }
    });   
</script>

 <!-- Add Category -->
  <div class="modal fade" id="editTopperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Topper</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="editTopper" enctype="multipart/form-data">
            <?= form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
            <?= form_hidden("topper_id");?>
            <?= form_hidden("oimg");?>
            <div class="row">
              <div class="col-sm-12">

								<div class="form-group">
                  <?= form_label("Select Category","category");?>
                  <select class="form-control" name="category" required="">
                     <option value="">Select Category</option>
                     <?php if(count($category)>0): ?>
                      <?php foreach($category as $val): ?>
                         <option value="<?= $val['category_id']; ?>"><?= $val['name']; ?></option>
                      <?php endforeach; ?>  
                     <?php endif; ?>
                  </select>
                </div>

								<div class="form-group">
									<?= form_label("Enter Name","name");?>
									<input type="text" name="name" class="form-control" placeholder="Enter Name"/>
								</div>

                <div class="form-group">
                  <label for="image">Select Image</label>
                  <?= form_input(["class"=>"form-control","name"=>"image","type"=>"file","accept"=>"image/*"]);?>
                </div>
                <div class="form-group">
                  <label for="description">Enter Description</label>
                  <?= form_textarea(["class"=>"form-control","name"=>"description","placeholder"=>"Enter Description","required"=>"required","rows"=>"2"]);?>
                </div>

                <div class="button-group">
                  <button class="btn btn-primary btn-sm" name="submit" value="editTopper">Submit</button>
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
      $('#editTopperModal').on('show.bs.modal', function (e) {
          if (e.namespace === 'bs.modal') {
              var opener=e.relatedTarget;

              var category           = $(opener).attr('data-category');
							var name               = $(opener).attr('data-name');
              var topper_id          = $(opener).attr('data-topper_id');
              var description        = $(opener).attr('data-description');
              var image              = $(opener).attr('data-image');
              var image_url          = $(opener).attr('data-image_url');
            
        
               $('#editTopper').find('[name="category"]').val(category);
							 $('#editTopper').find('[name="name"]').val(name);
               $('#editTopper').find('[name="topper_id"]').val(topper_id);
               $('#editTopper').find('[name="description"]').val(description);
               $('#editTopper').find('[name="oimg"]').val(image);
             
          }
      });
  });
  </script>

 <script type="text/javascript">
    $("#editTopper").validate({
       ignore: ":hidden",
       rules:{
         category:{
           required:true
         },
				 name:{
           required:true
         },
         description:{
          required:true
         }
          
       },
       messages:{
         category:{
           required:"Select Category"
         },
				 name:{
           required:"Enter Name"
         },
         description:{
          required:"Enter Description"
         }
       },
       submitHandler: function (form) {

         $.ajax({ 
           type: "POST",
           url: '<?= BASE_URL;?>addTopper',
           data: new FormData(form),
           mimeType: "multipart/form-data",
           contentType: false,
           processData: false,
            beforeSend: function(){
                $('#editTopper').find('[name="submit"]').attr("disabled",true);
            },
            complete: function(){
               $('#editTopper').find('[name="submit"]').attr("disabled",false);
            },
            success: function(e){ 
              var res=JSON.parse(e);
              if (res[0].status==0){
                $.notify(res[0].msg,'error');
                $('#editTopper').find('[name="submit"]').attr("disabled",true);
              }else{
                $.notify(res[0].msg,"success");
                setTimeout(function(){ location.reload(); }, 2500);
              }
            },
            error:function(){
               $.notify("Server error occure.","error");
               $('#editTopper').find('[name="submit"]').attr("disabled",true);
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
          data:{"id":id,"table":"topper","field":"topper_id","<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>"},
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
          data:{"id":id,"table":"topper","field":"topper_id","<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>"},
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
