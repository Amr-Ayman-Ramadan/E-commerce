<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
<meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
<meta name="author" content="PIXINVENT">
<title>Dashboard | @yield("title")</title>
<link rel="apple-touch-icon" href="{{asset("/assets/dashboard")}}/images/ico/apple-icon-120.png">
<link rel="shortcut icon" type="image/x-icon" href="{{asset("/assets/dashboard")}}/images/ico/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/vendors/css/charts/jquery-jvectormap-2.0.3.css">
<link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/vendors/css/charts/morris.css">
<link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/fonts/simple-line-icons/style.css">
@if(app()->getLocale() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css-rtl/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css-rtl/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css-rtl/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css-rtl/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/assets/css/style-rtl.css">
    <!-- END Custom CSS-->
  @else
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/dashboard")}}/assets/css/style.css">
    <!-- END Custom CSS-->
@endif
<!-- BEGIN VENDOR CSS-->

