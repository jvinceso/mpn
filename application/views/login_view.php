<!DOCTYPE html>
<html>
<!-- Mirrored from saturn.pinsupreme.com/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 05 Feb 2014 22:51:21 GMT -->
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  

  <link rel='stylesheet' href='<?php echo URL_CSS; ?>03a03bbe34da26df16eb239ba68ecc0a.css'>

  <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>

  <link href="<?php echo URL_IMG; ?>favicon.ico" rel="shortcut icon">
  <link href="<?php echo URL_IMG; ?>apple-touch-icon.png" rel="apple-touch-icon">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
    <![endif]-->

    <title>Sistema Municipal</title>

</head>

<body class="glossed">
    <div class="all-wrapper no-menu-wrapper light-bg">
      <div class="login-logo-w">
        <a href="index-2.html" class="logo">
          <i class="fa fa-rocket"></i>
      </a>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">

      <div class="widget widget-blue">
        <div class="widget-title">
          <h3 class="text-center"><i class="fa fa-lock"></i> Login Example</h3>
      </div>
      <div class="widget-content">
          <form id="loginform" action="login/validar" autentica="post" method="post">
            <a href="#" class="facebook-connect">
              <i class="fa fa-facebook"></i>
              Connect Using Facebook
          </a>
          <div class="lined-separator">Or login using email</div>
          <div class="form-group relative-w">
              <input type="text" id="username" name="username"  class="form-control" placeholder="Enter Username">
              <i class="fa fa-user input-abs-icon"></i>
          </div>
          <div class="form-group relative-w">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
              <i class="fa fa-lock input-abs-icon"></i>
          </div>
          <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
              </label>
          </div>
      </div>
      <p class="animate6 bounceIn"><button id="btnLogin" class="btn btn-primary btn-rounded btn-iconed">Enviar</button></p>
<!--       <a href="index-2.html" class="btn btn-primary btn-rounded btn-iconed">
          <span>Log me in</span>
          <i class="fa fa-arrow-right"></i>
      </a> -->
      <div class="no-account-yet">
          Don't have an account yet? <a href="register.html">Register Now</a>
      </div>
  </form>
</div>
</div>
</div>
</div>
</div>
<script src="<?php echo URL_JS; ?>jquery.min.js"></script>
<script src="<?php echo URL_JS; ?>jquery-ui.min.js"></script>
<script src='<?php echo URL_JS; ?>ad67372f4b8b70896e8a596720082ac6.js'></script>
<script>
    jQuery('#btnLogin').click(function(){
        if(!jQuery.browser.msie) {
            if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
                alert("vuelva a intentar");
                // if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
                // if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
                // jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
                //     jQuery(this).removeClass('animate0 wobble');
                // });
            } else {
                // jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
                    jQuery('#loginform').submit();
                // });
            }
            return false;
        }
    });
</script>

</body>


<!-- Mirrored from saturn.pinsupreme.com/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 05 Feb 2014 22:51:21 GMT -->
</html>