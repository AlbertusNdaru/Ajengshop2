<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
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
<body class="hold-transition register-page" style="overflow-y: hidden; hidden;margin-top: -95px;">
<div class="register-box">
  <div class="register-logo">
    <a><b>Super Admin Ajeng Shop</b></a>
  </div>

  <div class="register-box-body"  >
    <p class="login-box-msg">Register a new Admin</p>


      <div class="form-group has-feedback">
        <input id="nama" type="text" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="email" type="email" onchange="validate()" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" onchange="validateregexpass()" class="form-control" placeholder="Password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="validatepassword" type="password" onchange="validatepass()" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="pertanyaan" type="pertanyaan" class="form-control" placeholder="Pertanyaan">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="jawaban" type="jawaban" class="form-control" placeholder="Jawaban">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label>Level Admin</label>
                <select id="leveladmin" class="form-control" style="width: 100%;">
                  <option selected="selected" value="0">Admin</option>
                  <option value="1">Superadmin</option>
                  
                </select>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <button onclick="daftar()" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>

      <div class="col" style="text-align: center;">
    <a href="<?php echo base_url().'loginadmin'?>"  class="text-center">I already have a membership</a>
    </div>
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
{var regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
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
             $('#email').val('');
             $('#email').focus();
          }else if (!regex.test(email))
            {
               alert('Format email salah');
                $('#email').val('');
             $('#email').focus();
            }
          else
          {
              $('#save').removeAttr('disabled');
          }
 
        }
    })
    
  
}

function validateregexpass()
{
     var regexpassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_#$^+=!*()@%&]).{8,}$/;
    var password =  $('#password').val();

 if(!regexpassword.test(password))
    {
         alert('Password Harus Terdiri dari minimal 1 Huruf Capital 1 Huruf kecil dengan panjang karakter minimal 8  ');
         $('#password').val('');
         $('#password').focus();
    }
        
  
}


 function daftar()
 {
   var nama = $('#nama').val();
   var validatepassword = $('#validatepassword').val();
   var level = $('#leveladmin').val();
   var email = $('#email').val();
   var password = $('#password').val();
   var pertanyaan = $('#pertanyaan').val();
   var jawaban = $('#jawaban').val();
   var regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
   var regexpassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_+?#$^+=!*()@%&]).{8,}$/;
    if (!regex.test(email))
    {
       alert('Format email salah');
    }
    else if(!regexpassword.test(password))
    {
         alert('Password Harus Terdiri dari minimal 1 Huruf Capital 1 Huruf kecil dengan panjang karakter minimal 8  ');
    }
    else if (password != validatepassword)
    {
      alert('Password Tidak Sesuai');
    }else if(nama=='' || validatepassword=='' || email=='' || password=='' || pertanyaan=='' || jawaban =='')
    {
        alert('Form Harap diisi dengan lengkap!');
    }
    else
    {
      $.ajax({
        url  :"<?php echo base_url('auth/register');?>",
        type : 'POST',
        data : {
          daftar : 'yes',
          nama : nama,
          level : level, 
          email :email,
          password :password,
          pertanyaan :pertanyaan,
          jawaban :jawaban
        },
         success : function(dd)
        {
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
