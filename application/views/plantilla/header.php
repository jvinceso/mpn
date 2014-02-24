<!DOCTYPE html>
<html>
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
    <title><?php echo $titulo; ?></title>
  </head>
  <body class="glossed">
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-42863888-4', 'pinsupreme.com');
        ga('send', 'pageview');
    </script>
    <div class="all-wrapper fixed-header left-menu">
      <div class="page-header">
        <div class="header-links hidden-xs">
          <div class="top-search-w pull-right">
            <input type="text" class="top-search" placeholder="Search"/>
          </div>
          <div class="dropdown hidden-sm hidden-xs">
            <a href="#" data-toggle="dropdown" class="header-link"><i class="fa fa-bolt"></i> User Alerts <span class="badge alert-animated">5</span></a>

            <ul class="dropdown-menu dropdown-inbar dropdown-wide">
              <li><a href="#"><span class="label label-warning">1 min</span> <i class="fa fa-bell"></i> New Mail Received</a></li>
              <li><a href="#"><span class="label label-warning">4 min</span> <i class="fa fa-fire"></i> Server Crash</a></li>
              <li><a href="#"><span class="label label-warning">12 min</span> <i class="fa fa-flag-o"></i> Pending Alert</a></li>
              <li><a href="#"><span class="label label-warning">15 min</span> <i class="fa fa-smile-o"></i> User Signed Up</a></li>
            </ul>
          </div>
          <div class="dropdown hidden-sm hidden-xs">
            <a href="#" data-toggle="dropdown" class="header-link"><i class="fa fa-cog"></i> Settings</a>

            <ul class="dropdown-menu dropdown-inbar">
              <li><a href="#"><span class="label label-warning">2</span> <i class="fa fa-envelope"></i> Messages</a></li>
              <li><a href="#"><span class="label label-warning">4</span> <i class="fa fa-users"></i> Friends</a></li>
              <li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
              <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </div>

          <div class="dropdown">
            <a href="#" class="header-link clearfix" data-toggle="dropdown">
              <div class="avatar">
                <img src="<?php echo URL_IMG; ?>avatar-small.jpg" alt="">
              </div>
              <div class="user-name-w">
                Lionel Messi <i class="fa fa-caret-down"></i>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-inbar">
              <li><a href="#"><span class="label label-warning">2</span> <i class="fa fa-envelope"></i> Messages</a></li>
              <li><a href="#"><span class="label label-warning">4</span> <i class="fa fa-users"></i> Friends</a></li>
              <li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
              <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </div>
        </div>
        <a class="current logo hidden-xs" href="index-2.html"><i class="fa fa-rocket"></i></a>
        <a class="menu-toggler" href="#"><i class="fa fa-bars"></i></a>
        <h1>Dashboard</h1>
      </div>
      <div class="side">
        <div class="sidebar-wrapper">
          <ul>
            <li class='current'>
              <a class='current' href="index-2.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
                <i class="fa fa-home"></i>
              </a>
            </li>
            <li>
              <a href="forms.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Forms">
                <i class="fa fa-file-text-o"></i>
              </a>
            </li>
            <li>
              <a href="elements.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="UI Elements">
                <span class="badge"></span>
                <i class="fa fa-code-fork"></i>
              </a>
            </li>
            <li>
              <a href="charts.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Charts">
                <i class="fa fa-bar-chart-o"></i>
              </a>
            </li>
            <li>
              <a href="table.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tables">
                <i class="fa fa-th"></i>
              </a>
            </li>
            <li>
              <a href="grid.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Layouts">
                <i class="fa fa-font"></i>
              </a>
            </li>
            <li>
              <a href="calendar.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Calendar">
                <span class="badge">5</span>
                <i class="fa fa-calendar"></i>
              </a>
            </li>
            <li>
              <a href="maps.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Maps">
                <i class="fa fa-map-marker"></i>
              </a>
            </li>
            <li>
              <a href="page_search.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Extra Pages">
                <i class="fa fa-trophy"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="sub-sidebar-wrapper">
          <ul class="nav">
            <li><a href="#widget_stats">Statistics</a></li>
            <li><a href="#widget_profit_chart">Profit Charts</a></li>
            <li><a href="#widget_tasks_list">Tasks List</a></li>
            <li><a href="#widget_real_time_chart">Real Time Chart</a></li>
            <li><a href="#widget_server_activity">Server Activity</a></li>
            <li><a href="#widget_calendar">Calendar</a></li>
            <li><a href="#widget_tabs">Tabs</a></li>
          </ul>
        </div>
      </div>