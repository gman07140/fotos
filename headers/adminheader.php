<!DOCTYPE html>
<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>              
        <link href="/css/pictures.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <link href="/css/table.css" rel="stylesheet"/>
        <link href="/css/menu.css" rel="stylesheet"/>
        <link href="/css/map.css" rel="stylesheet"/>
        <link rel="icon" type="image/ico" href="/pics/favicon.ico">
         
        <?php if (isset($title)): ?>
            <title>Vida, arte, photografia: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Vida, arte, photografia</title>
        <?php endif ?>
        
        <script src="/java/jquery.js"></script>
        <script src="/java/google_analytics.js"></script>
        <script src="/java/bootstrap.min.js"></script>
        <script src="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.css">

    </head>
    <body>
            <div id="top">    
            <ul id="saturday">
                <li><a href="newclient.php">Add new client</a></li>
                <li><a href="admintable2.php">Client list</a></li>
                <li><a href="gallery.php?action&categoryid=2">Gallery</a></li>
                <li><a href="map2.php">Map</a></li>
                <li><a href="logout.php">Log Out</a></li> 
            </ul>
            </div>
            <div id="admin">