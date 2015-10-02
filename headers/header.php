<!DOCTYPE html>
<html>
<head>   
  <link href="/css/styles.css" rel="stylesheet"/>
  <link href="/css/pictures.css" rel="stylesheet"/>
  <link href="/css/map.css" rel="stylesheet"/>
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
  <script src="/java/mobile_redirect.js"></script>
  <script src="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.css">
          
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