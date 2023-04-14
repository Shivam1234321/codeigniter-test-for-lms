
<!DOCTYPE html>
<html lang="en">
<head>
   <?php require "template/CssLink.php";?>

</head>

  <body class="login-body">

    <div class="container">
      <div class="row">
        <div class="col-sm-4 mx-auto">
          <img alt="" src="<?= LOGO; ?>" style="height:150px;width:100%;">
        </div>
      </div>
      <form class="form-signin" id="chnage-password" method="post">
        <?= form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash()); ?>
        <h2 class="form-signin-heading">Change Password</h2>
        <div class="login-wrap">
            <input type="password" class="form-control" name="opass" id="opass" autocomplete="off" placeholder="Old Password" autofocus="">
            <input type="password" class="form-control" name="npass" id="npass" autocomplete="off" placeholder="New Password" autofocus="">
            <input type="password" class="form-control" name="cpass" id="cpass" autocomplete="off" placeholder="Confirm Password" autofocus="">
           
            <button class="btn btn-lg btn-login btn-block" type="submit" name="changePassword" value="changePassword">Submit</button>
            <a href="<?= BASE_URL;?>dashboard" class="text-center"><i class="fa fa-home"></i> Go To Home</a>

        </div>
      </form>

    </div>

    <?php require "template/ScriptLink.php"; ?>

    <script type="text/javascript">
      $("#chnage-password").validate({
           ignore: ":hidden",
           rules:{
               opass:{
                  required:true
               },
               npass:{
                  required:true,
                  minlength:8
               },
               cpass:{
                required:true,
                equalTo:"#npass"
               }
           },
           messages:{
               opass:{
                  required:"Enter Old Password"
               },
               npass:{
                  required:"Enter New Password",
                  minlength:"Password eight character long."
               },
               cpass:{
                required:"Enter Confirm Password",
                equalTo:"New Password not matched."
               }
           },
           submitHandler: function (form) {

             $.ajax({ 
               type: "POST",
               url: '<?= BASE_URL;?>changePassword',
               data: new FormData(form),
               mimeType: "multipart/form-data",
               contentType: false,
               processData: false,
                  success: function(e){ 
                    var res=JSON.parse(e);
                    if (res[0].status==0){
                      $.notify(res[0].msg,'error');
                    }else{
                      $.notify(res[0].msg,"success");
                      setTimeout(function(){ location.reload(); }, 2500);
                    }
                },
                error:function(){
                   $.notify("Server error occure.","error");
                }
             });
             return false; // required to block normal submit since you used ajax
           }
        });   
    </script>
    </script>


  </body>
</html>

