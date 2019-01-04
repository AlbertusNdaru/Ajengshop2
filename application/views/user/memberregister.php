<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ajeng Shop Regiter Member</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('').'assets/'?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('').'assets/'?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('').'assets/'?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('').'assets/'?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('').'assets/'?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page" style="overflow-y: hidden; margin-top: -100px;" >
<div class="register-box">
  <div class="register-logo">
    <a><b>Member Ajeng Shop</b></a>
  </div>

  <div class="register-box-body">
   <?php echo form_open_multipart("authuser/register")?>
    <p class="login-box-msg">Register a new Member</p>
      <div class="form-group has-feedback">
        <input required id="nama" type="text" name="nama" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required id="no_ktp" type="text" name="no_ktp" class="form-control" placeholder="Nomer KTP">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required id="email" name="email" type="email" class="form-control" placeholder="Email" onchange="validate()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required id="password" name="password" type="password" class="form-control" placeholder="Password" pattern ="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required id="validatepassword" type="password" class="form-control" onchange="validatepass()" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required id="pertanyaan" name="pertanyaan" type="pertanyaan" class="form-control" placeholder="Pertanyaan">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required id="jawaban" name="jawaban" type="jawaban" class="form-control" placeholder="Jawaban">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label>Upload Foto</label>
         <input required id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkas" placeholder="upload" >
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button id="save" type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        </form>
        <!-- /.col -->
      </div>
      

   

    <a href="<?php echo base_url().'loginuser'?>" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('').'assets/'?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('').'assets/'?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('').'assets/'?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

function validatepass()
{
    var pass = $('#password').val();
    var valid = $('#validatepassword').val()
    if (pass != valid)
    {
        alert('Password Tidak sama');
        $('#validatepassword').focus();
    }
}

function validate()
{
    var email = $('#email').val();

         $.ajax({
        url: "<?php echo base_url('authuser/cekemail');?>",
        type: 'POST',
        data: {email:email},
        success: function (dd) {
          if (dd==1)
          {
            alert("Email sudah ada");
            $('#save').attr('disabled','disabled');
             $('#email').focus();
          }
          else
          {
              $('#save').removeAttr('disabled');
          }
 
        }
    })
    
  
}


 function daftar()
 {
   var input = document.getElementById('inputfoto');
   console.log(input.files[0]); 
   var nama = $('#nama').val();
   var validatepassword = $('#validatepassword').val();
   var email = $('#email').val();
   var password = $('#password').val();
   var pertanyaan = $('#pertanyaan').val();
   var jawaban = $('#jawaban').val();
   var regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (!regex.test(email))
    {
       alert('Format email salah');
    }
    else if (password != validatepassword)
    {
      alert('Password Tidak Sesuai');
    }
    else
    {
      $.ajax({
        url  :"<?php echo base_url('authuser/register');?>",
        type : 'POST',
        files : input.files[0],
        data : {
          daftar : 'yes',
          nama : nama,
          email :email,
          password :password,
          pertanyaan :pertanyaan,
          jawaban :jawaban
        },
         success : function(dd)
        {
            console.log(dd);
          if (dd==1)
          {
            alert("Email sudah ada");
          }
          else
          {
            window.location= "<?php echo base_url();?>auth/loginadmin";
          }
           
        }
     })
    }
     
 }
</script>
</body>
</html>
