<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Administración - MPN</title>
  <meta name="description" content="overview &amp; stats" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- basic styles -->
  <link href="<?php echo URL_CSS; ?>bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo URL_CSS; ?>font-awesome.min.css" />
    <!--[if IE 7]>
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>font-awesome-ie7.min.css" />
      <![endif]-->
      <!-- fonts -->
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-fonts.css" />
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>sistema/estilos.css" />
      <!-- ace styles -->
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace.min.css" />
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-rtl.min.css" />
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-skins.min.css" />
    <!--[if lte IE 8]>
      <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-ie.min.css" />
      <![endif]-->
      <!-- inline styles related to this page -->
      <!-- ace settings handler -->
      <script src="<?php echo URL_JS; ?>ace-extra.min.js"></script>
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo URL_JS; ?>html5shiv.js"></script>
    <script src="<?php echo URL_JS; ?>respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href='<?php echo URL_CSS; ?>sistema/validation.css'>  
    <link rel="stylesheet" href='<?php echo URL_CSS; ?>sistema/validation.css'>  
    <link rel="stylesheet" href="<?php echo URL_CSS; ?>jquery-ui-1.10.3.full.min.css" />
    


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
          <script src="<?php echo URL_JS; ?>typeahead-bs2.min.js"></script>

          <!-- page specific plugin scripts -->

          <!--[if lte IE 8]>
            <script src="<?php echo URL_JS; ?>excanvas.min.js"></script>
          <![endif]-->
<!-- fin basic scripts -->
        <script src="<?php echo URL_JS; ?>jquery-ui-1.10.3.full.min.js"></script>
        <script src="<?php echo URL_JS; ?>jquery-ui-1.10.3.custom.min.js"></script>
        <script src='<?php echo URL_JS; ?>sistema/jsGeneral.js'></script> 
        <script src='<?php echo URL_JS; ?>sistema/jqueryvalidate.js'></script> 

    <link rel="stylesheet" href="<?php echo URL_CSS; ?>jquery.jgrowl.css" />
    <script src='<?php echo URL_JS; ?>jquery.jgrowl_minimized.js'></script> 

  </head>
  <body>
    <div class="navbar navbar-default" id="navbar">
      <script type="text/javascript">
      try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script>
      <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
          <a href="#" class="navbar-brand">
            <small>
              <i class="icon-leaf"></i>
              Municipalidad Pueblo Nuevo
            </small>
          </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
          <ul class="nav ace-nav">
            <li class="grey">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="icon-tasks"></i>
                <span class="badge badge-grey">4</span>
              </a>
              <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                  <i class="icon-ok"></i>
                  4 Tasks to complete
                </li>
                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">Software Update</span>
                      <span class="pull-right">65%</span>
                    </div>
                    <div class="progress progress-mini ">
                      <div style="width:65%" class="progress-bar "></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">Hardware Upgrade</span>
                      <span class="pull-right">35%</span>
                    </div>
                    <div class="progress progress-mini ">
                      <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">Unit Testing</span>
                      <span class="pull-right">15%</span>
                    </div>
                    <div class="progress progress-mini ">
                      <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">Bug Fixes</span>
                      <span class="pull-right">90%</span>
                    </div>
                    <div class="progress progress-mini progress-striped active">
                      <div style="width:90%" class="progress-bar progress-bar-success"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    See tasks with details
                    <i class="icon-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </li>
            <li class="purple">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="icon-bell-alt icon-animated-bell"></i>
                <span class="badge badge-important">8</span>
              </a>
              <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                  <i class="icon-warning-sign"></i>
                  8 Notifications
                </li>
                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                        New Comments
                      </span>
                      <span class="pull-right badge badge-info">+12</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="btn btn-xs btn-primary icon-user"></i>
                    Bob just signed up as an editor ...
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
                        New Orders
                      </span>
                      <span class="pull-right badge badge-success">+8</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-info icon-twitter"></i>
                        Followers
                      </span>
                      <span class="pull-right badge badge-info">+11</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    See all notifications
                    <i class="icon-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </li>
            <li class="green">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="icon-envelope icon-animated-vertical"></i>
                <span class="badge badge-success">5</span>
              </a>
              <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                  <i class="icon-envelope-alt"></i>
                  5 Messages
                </li>
                <li>
                  <a href="#">
                    <img src="<?php echo URL_IMG; ?>avatar.png" class="msg-photo" alt="Alex's Avatar" />
                    <span class="msg-body">
                      <span class="msg-title">
                        <span class="blue">Alex:</span>
                        Ciao sociis natoque penatibus et auctor ...
                      </span>
                      <span class="msg-time">
                        <i class="icon-time"></i>
                        <span>a moment ago</span>
                      </span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="<?php echo URL_IMG; ?>avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                    <span class="msg-body">
                      <span class="msg-title">
                        <span class="blue">Susan:</span>
                        Vestibulum id ligula porta felis euismod ...
                      </span>
                      <span class="msg-time">
                        <i class="icon-time"></i>
                        <span>20 minutes ago</span>
                      </span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="<?php echo URL_IMG; ?>avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                    <span class="msg-body">
                      <span class="msg-title">
                        <span class="blue">Bob:</span>
                        Nullam quis risus eget urna mollis ornare ...
                      </span>
                      <span class="msg-time">
                        <i class="icon-time"></i>
                        <span>3:15 pm</span>
                      </span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="inbox.html">
                    See all messages
                    <i class="icon-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </li>
            <li class="light-blue">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="<?php echo URL_IMG; ?>user.jpg" alt="Jason's Photo" />
                <span class="user-info">
                  <small>Bienvenido,</small>
                  <?php echo $this->session->userdata('Nombres').'|'.$this->session->userdata('url'); ?>
                </span>
                <i class="icon-caret-down"></i>
              </a>
              <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                  <a href="#">
                    <i class="icon-cog"></i>
                    Settings
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="icon-user"></i>
                    Profile
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?php echo base_url(); ?>login/logout">
                    <i class="icon-off"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
      </div><!-- /.container -->
    </div>
    <div class="main-container" id="main-container">
      <script type="text/javascript">
      try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script>
      <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
          <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
          <!-- // <script type="text/javascript"> -->
          <!-- // try{ace.settings.check('sidebar' , 'fixed')}catch(e){} -->
          <!-- // </script> -->
          <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
              <button class="btn btn-success">
                <i class="icon-signal"></i>
              </button>
              <button class="btn btn-info">
                <i class="icon-pencil"></i>
              </button>
              <button class="btn btn-warning">
                <i class="icon-group"></i>
              </button>
              <button class="btn btn-danger">
                <i class="icon-cogs"></i>
              </button>
            </div>
            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
              <span class="btn btn-success"></span>
              <span class="btn btn-info"></span>
              <span class="btn btn-warning"></span>
              <span class="btn btn-danger"></span>
            </div>
          </div><!-- #sidebar-shortcuts -->





          <ul class="nav nav-list">
            <?php
            $opciones = $this->loaders->get_menu();
            $count = count($opciones);

            for ($i = 0; $i < $count; $i++) {
                        // $ico = ($opciones[$i]["active"] != "" ? "toggle-subnav-up-white.png" : "toggle-subnav-down.png");
              ?>    

              <li <?php echo $opciones[$i]["active"];  ?> >
                <a href="#" class="dropdown-toggle">
                  <i class="<?php echo $opciones[$i]["icon"]; ?>"></i>
                  <span class="menu-text"> <?php echo $opciones[$i]["menu"]; ?></span>
                  <b class="arrow icon-angle-down"></b>
                </a>
                <?php $count2 = count($opciones[$i]["datos"]); ?>
                <ul class="submenu" <?php $opciones[$i]["ul"] ?>>
                 <?php                             
                 for ($j = 0; $j < $count2; $j++) {  ?>  
                 <li <?php echo  $opciones[$i]["datos"][$j]["active"]; ?> >
                  <a href="<?php echo URL_MAIN . substr($opciones[$i]["datos"][$j]["url"], 3); ?>">
                    <i class="icon-double-angle-right"></i>
                    <?php echo $opciones[$i]["datos"][$j]["value"]; ?>
                  </a>
                </li>
                <?php } ?>
              </ul>    
            </li>
            <?php } ?>
          </ul><!-- /.nav-list -->
          <div class="sidebar-collapse" id="sidebar-collapse">
            <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
          </div>
          <!-- // <script type="text/javascript"> -->
          <!-- // try{ace.settings.check('sidebar' , 'collapsed')}catch(e){} -->
          <!-- // </script> -->
        </div>


        <div class="main-content">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
              <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Dashboard</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="icon-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- #nav-search -->
          </div>
          <div class="page-content">