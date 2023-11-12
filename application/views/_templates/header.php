<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AIF | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/adminlte.css">
  <link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
  <link rel="stylesheet" href="<?php echo URL; ?>public/plugins/daterangepicker/daterangepicker.css">






  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<script type="text/javascript">
  function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    if (h == 0) {
      h = 12;
    }

    if (h > 12) {
      h = h - 12;
      session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " " + session;
    var element = document.querySelector("#MyClockDisplay")
    if (element) {
      element.textContent = time
    }

    setTimeout(showTime, 1000);

  }

  showTime();
</script>

<script src="<?= URL; ?>public/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= URL; ?>public/js1/sweetalert.js"></script>

<style>
  @font-face {
    font-family: laofont;
    src: url(<?php echo URL; ?>public/css/phetsarath_ot.ttf);
  }

  .laotext {
    font-family: laofont !important;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" onload="showTime();">