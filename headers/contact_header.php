<!DOCTYPE html>
<html>
<head>
  <link href="/css/styles.css" rel="stylesheet"/>
  <link href="/css/pictures.css" rel="stylesheet"/>
  <link href="/css/contact.css" rel="stylesheet"/>
  <link rel="stylesheet" href="/java/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <link rel="icon" type="image/ico" href="/pics/favicon.ico">

    <?php if (isset($title)): ?>
        <title>Vida, arte, fotografia: <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>Vida, arte, fotografia</title>
    <?php endif ?>

  <script src="/java/jquery.js"></script>
  <script src="/java/google_analytics.js"></script>
  <script src="/java/hover.js"></script>
  <script src="/java/bootstrap.min.js"></script>
  <script type="text/javascript">
  if (screen.width <= 800) {
    window.location = "m.contact.php";
  }
  </script>
          
</head>
<body>
 <div id="wrapper">
   <div class = "header">
    <div>
       <a class="small" href="galleries.php">gallery</a>
       <a class="smallast" href="map3.php">map</a>
       <a class="smallast" href="contact.php">contact</a>
       <a class="smallast" href="clientlog.php">client area</a>
     </div>
   </div>