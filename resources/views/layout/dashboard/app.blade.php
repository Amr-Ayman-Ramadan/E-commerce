<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    @include("layout.dashboard._head")
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- ////////////////////////////////////////////////////////////////////////////-->

@include("layout.dashboard._nav")
@include("layout.dashboard._sidebar")

@yield("content")

<!-- ////////////////////////////////////////////////////////////////////////////-->
@include("layout.dashboard._footer")
@include("layout.dashboard._scripts")
</body>

</html>
