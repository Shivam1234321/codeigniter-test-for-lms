
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

      <form class="form-signin" method="post" id="adminlogin">
        <?= form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
        <h2 class="form-signin-heading">Admin sign in</h2>
        <div class="login-wrap">

          <input type="text" class="form-control" name="email" id="email" placeholder="Email" autofocus="">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
           
          <button class="btn btn-lg btn-login btn-block" name="adminlogin" value="adminlogin" type="submit">Sign in</button>
            
        </div>
      </form>
    </div>

    <?php require "template/ScriptLink.php"; ?>

<script type="text/javascript">
  $("#adminlogin").validate({
    rules:{
      email:{
        required:true,
        email:true
      },
      password:{
        required:true
      }
    },
    messages:{
      email:{
        required:"Enter Email",
        email:"Enter Valid Email"
      },
      password:{
        required:"Enter Password"
      }
    },submitHandler: function (form) {

      $.ajax({ 
        type: "POST",
        url: '<?= BASE_URL;?>loginAuth',
        data: new FormData(form),
        mimeType: "multipart/form-data",
        contentType: false,
        processData: false,
          success: function(e){ 
            var res = JSON.parse(e);
            if (res[0].status==0){
              $.notify(res[0].msg,'error');
            }else if (res[0].status==1){
               $.notify(res[0].msg,'error');
               //$('#adminlogin').find('[name="submit"]').attr("disabled",false);
               $("#differentBrowserModal").find("#differentBrowserText").text(res[0].msg);
               setTimeout(function(){ $("#differentBrowserModal").modal("show"); }, 1000);
            }else{
              $.notify(res[0].msg,"success");
              setTimeout(function(){ location.reload(); }, 2000);
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


  </body>
</html>

