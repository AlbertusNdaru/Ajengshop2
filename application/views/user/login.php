<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ajeng Shop Member</title>
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
   <link rel="stylesheet" href="<?php echo base_url('').'assets/'?>dist/css/animate.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="overflow-y: hidden;">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Member Ajeng Shop</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>


      <div class="form-group has-feedback">
        <input id="email" type="email" name="EMAIL" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password"  type="password" name="PASSWORD" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button  onclick="loginuser()" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>


    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <button class="btn btn-primary" onclick="lupa()">I forgot my password</button><br><br>
    <a href="<?php echo base_url()?>operator/postuser" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('').'assets/'?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('').'assets/'?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('').'assets/'?>plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('').'assets/'?>dist/js/bootstrap-notify.js"></script>
<script>

<?php if(!empty($error)){ ?> 
 setnotif('<?php echo $error?>'); 
 <?php }?>

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

$("#password").keydown(function(e)
{
  var keycode = (e.keyCode ? e.keyCode : e.which);
  if (keycode == '13'){
      console.log('aaaaaaa');
      loginuser();    
  }
});
  function loginuser()
 {
    var email= $('#email').val();
     var password = $('#password').val();

        $.ajax({
        url  :"<?php echo base_url('authuser/login');?>",
        type : 'POST', 
        data : {
          email : email, 
          password : password
        },
         success : function(data)
        {
          console.log(data);
            if (data==3){ window.location="<?php echo base_url().'penjualan'?>";}
            if (data==1){ alert('Akun sudah digunakan untuk Login');}
            if (data==2){ alert('Akun diblokir karena kesalahan password lebih dari 3 kali');}
            if (data==0){ alert('Email user atau password salah');}
        }
     })
     
 }

  function lupa()
  {
    var email= $('#email').val();
    if (email=="")
    {
      alert('Email harus di isi');
    }
    else
    {
    var email = $('#email').val();
     window.location="<?php echo base_url().'operator/get_member_byemail?email='?>"+email+"";
    }
  }
  
  function setnotif(err)
{ 


  $.notify({
	// options
	icon: 'glyphicon glyphicon-warning-sign',
	title: 'Error',
	message: err,
  },{
    // settings
    element: 'body',
    position: null,
    type: "danger",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
      from: "top",
      align: "center"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 5000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
      enter: 'animated fadeInDown',
      exit: 'animated fadeOutUp'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
      '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
      '<span data-notify="icon"></span> ' +
      '<span data-notify="title">{1}</span> ' +
      '<span data-notify="message">{2}</span>' +
      '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
      '</div>' +
      '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>' 
  });

}
 
//  function lupa()
//   {
//     var email= $('#email').val();
//     if (email=="")
//     {
//       alert('Email harus di isi');
//     }
//     else
//     {
//       $.ajax({
//         url  :"<?php echo base_url('email/sendMailUser');?>",
//         type : 'POST',
//         data : {
//           email : email
//         },
//          success : function(data)
//         {
//           alert(data);
//         }
//      })
//     }
//   }
</script>
</body>
</html>

