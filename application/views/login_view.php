<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 198.74.61.72/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 02 Mar 2014 23:36:06 GMT -->
<head>
  <meta charset="utf-8" />
  <title>Login  - MPN Administración</title>

  <meta name="description" content="User login page" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- basic styles -->

  <link href="<?php echo URL_CSS; ?>bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo URL_CSS; ?>font-awesome.min.css" />

    <!--[if IE 7]>
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>font-awesome-ie7.min.css" />
      <![endif]-->

      <!-- page specific plugin styles -->

      <!-- fonts -->

      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-fonts.css" />

      <!-- ace styles -->

      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace.min.css" />
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-rtl.min.css" />

    <!--[if lte IE 8]>
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-ie.min.css" />
      <![endif]-->

      <!-- inline styles related to this page -->

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="<?php echo URL_JS; ?>html5shiv.js"></script>
    <script src="<?php echo URL_JS; ?>respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="login-layout">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
                <h1>
                  <i class="icon-leaf green"></i>
                  <span class="red">DIVISOFT</span>
                  <span class="white">Application</span>
                </h1>
                <h4 class="blue">&copy; Municipalidad Pueblo Nuevo</h4>
              </div>

              <div class="space-6"></div>

              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        <i class="icon-coffee green"></i>
                        Porvafor Ingrese sus Datos
                      </h4>

                      <div class="space-6"></div>

                      <form id="loginform" action="login/validar" autentica="post" method="post">
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" id="username" name="username" class="form-control" placeholder="Usuario" />
                              <i class="icon-user"></i>
                            </span>
                          </label>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" />
                              <i class="icon-lock"></i>
                            </span>
                          </label>
                          <div class="space"></div>
                          <div class="clearfix">
                            <label class="inline">
                              <input type="checkbox" class="ace" />
                              <span class="lbl"> Recordarme</span>
                            </label>
                            <button type="button" id="btnLogin" class="width-35 pull-right btn btn-sm btn-primary">
                              <i class="icon-key"></i>
                              Login
                            </button>
                          </div>
                          <div class="space-4"></div>
                        </fieldset>
                      </form>
                      <div class="social-or-login center">
                        <span class="bigger-110">Or Login Using</span>
                      </div>
                      <div class="social-login center">
                        <a class="btn btn-primary">
                          <i class="icon-facebook"></i>
                        </a>
                        <a class="btn btn-info">
                          <i class="icon-twitter"></i>
                        </a>
                        <a class="btn btn-danger">
                          <i class="icon-google-plus"></i>
                        </a>
                      </div>
                    </div><!-- /widget-main -->
                    <div class="toolbar clearfix">
                      <div>
                        <a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
                          <i class="icon-arrow-left"></i>
                          Olvide mi contraseña
                        </a>
                      </div>
                      <div>
                        <a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
                          Registrarme
                          <i class="icon-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </div><!-- /widget-body -->
                </div><!-- /login-box -->
                <div id="forgot-box" class="forgot-box widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header red lighter bigger">
                        <i class="icon-key"></i>
                        Recuperar mi Contraseña
                      </h4>
                      <div class="space-6"></div>
                      <p>
                        Ingrese su e-mail para recibir las instrucciones
                      </p>
                      <form>
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="email" class="form-control" placeholder="Email" />
                              <i class="icon-envelope"></i>
                            </span>
                          </label>

                          <div class="clearfix">
                            <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                              <i class="icon-lightbulb"></i>
                              Envieme!
                            </button>
                          </div>
                        </fieldset>
                      </form>
                    </div><!-- /widget-main -->

                    <div class="toolbar center">
                      <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                        Regresar al login
                        <i class="icon-arrow-right"></i>
                      </a>
                    </div>
                  </div><!-- /widget-body -->
                </div><!-- /forgot-box -->

                <div id="signup-box" class="signup-box widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header green lighter bigger">
                        <i class="icon-group blue"></i>
                        Registrar Nuevo Usuario
                      </h4>

                      <div class="space-6"></div>
                      <p> Introdusca sus datos para comenzar: </p>

                      <form>
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="email" class="form-control" placeholder="Email" />
                              <i class="icon-envelope"></i>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" class="form-control" placeholder="Username" />
                              <i class="icon-user"></i>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" class="form-control" placeholder="Password" />
                              <i class="icon-lock"></i>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" class="form-control" placeholder="Repeat password" />
                              <i class="icon-retweet"></i>
                            </span>
                          </label>

                          <label class="block">
                            <input type="checkbox" class="ace" />
                            <span class="lbl">
                              Acepto el
                              <a href="#">Acerdo de Usuario</a>
                            </span>
                          </label>

                          <div class="space-24"></div>

                          <div class="clearfix">
                            <button type="reset" class="width-30 pull-left btn btn-sm">
                              <i class="icon-refresh"></i>
                              Reiniciar
                            </button>

                            <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                              Registrar
                              <i class="icon-arrow-right icon-on-right"></i>
                            </button>
                          </div>
                        </fieldset>
                      </form>
                    </div>

                    <div class="toolbar center">
                      <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                        <i class="icon-arrow-left"></i>
                        Regresar al login
                      </a>
                    </div>
                  </div><!-- /widget-body -->
                </div><!-- /signup-box -->
              </div><!-- /position-relative -->
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->

    <script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo URL_JS; ?>jquery-2.0.3.min.js'>"+"<"+"/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo URL_JS; ?>jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
if("ontouchend" in document) document.write("<script src='<?php echo URL_JS; ?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
function show_box(id) {
 jQuery('.widget-box.visible').removeClass('visible');
 jQuery('#'+id).addClass('visible');
}
</script>
<script>
jQuery('#username').keyup(function(event){
    if(event.keyCode == 13){
        $( "#btnLogin" ).trigger( "click" );
        // $("#id_of_button").click();
    }
});
jQuery('#password').keyup(function(event){
    if(event.keyCode == 13){
        $( "#btnLogin" ).trigger( "click" );
        // $("#id_of_button").click();
    }
});

jQuery('#btnLogin').click(function(){
  // if(!jQuery.browser.msie) {
    if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
      alert("vuelva a intentar");
    } else {
      jQuery('#loginform').submit();
    }
    return false;
  // }
});
</script>
</body>
</html>