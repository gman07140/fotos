<div class="headertitle">
<h1>Bem-vindo, 
    <?php   
    $named = query("SELECT username FROM users WHERE userID = ?", $_SESSION["userID"]);
    echo $named[0]["username"];
    ?>!
    </h1>
    <h4>Selecione as imagens que voce gostaria em seu album e clique 'select'</h4>
</div>

<form id="form1" name="form1" method="post" action="select.php" onsubmit="myFunction()">
    <div class="headertitle">
        <input name="select" type="submit" id="select" value="Select">
    </div>
        <div id="content">
            <ul>
                <?php foreach ($photos as $photo): ?>
                    <li><a class="fancybox" rel="group" title="<?=$photo['link'];?>" 
                    href="<?= $photo["link"]?>"$><img src=
                    "<?= $photo["link"]?>" height="120" alt=""/></a></br><input name="data[]" type="checkbox" id="
                    data" value="<?php echo $photo["link"]; ?>"></li>
                <?php endforeach ?>
            </ul>
        </div>
</form>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/java/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="/java/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/java/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
    $(document).ready(function($) {
        $(".fancybox").fancybox({
            padding: 2, // or whatever, 0 = nothing
        'nextEffect': 'elastic',
        'prevEffect': 'elastic',
        'nextSpeed': 'slow',
        'beforeLoad' : function() {
        var cVal = this.title;
        console.log(cVal);
        formblock = document.getElementById('form1');
        forminputs = formblock.getElementsByTagName('input');

        for (i = 0; i < forminputs.length; i++) 
        {
          if (forminputs[i].getAttribute('value') == cVal)
          {            
            if(forminputs[i].checked)
            {
                console.log('truek');
                this.title = "<input type='checkbox' checked='checked' id='data' class='fancy' onclick='handleClick(this);' value='" + cVal + "'>";
            }
            else
            {
                console.log('flasek');
                this.title = "<input type='checkbox' id='data' class='fancy' onclick='handleClick(this);' value='" + cVal + "'>";
            }
          }
        }
    }
    });
});
</script>
<script type="text/javascript" src="/java/clientpics.js"></script>

<style type="text/css">
.fancybox-skin {
 background-color: #808080; /* or whatever */
}
</style>