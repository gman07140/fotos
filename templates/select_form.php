<div class="headertitle">
    <h1>Reveja a sua selecao abaixo. Clique 'send' quando estiver pronto</h1>
</div>
<div class="bootstrap">
<form class="ajax" method="post" action="send.php">
    <fieldset>
            <input id="email" name="email" type="hidden" value="<?php echo $address[0]['email'] ?>"/>
            <input id="username" name="username" type="hidden" value="<?php echo $address[0]['username'] ?>"/>
            <input id="userID" name="userID" type="hidden" value="<?php echo $address[0]['userID'] ?>"/>
            <input id="pics" name="pics" type="hidden" value="<?php foreach ($images as $image): ?><?php echo $image; ?>,  <?php endforeach ?>">
        <div class="form-group">
            <textarea class="form-control" name="requests" id="requests" type="text" cols="50" rows="4" placeholder="Outras solicitacoes aqui"></textarea><br />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Send</button>
            <div class="white" style="padding-top:10px;" id="progress"></div>
        </div>
    </fieldset>
</form>
</div>

<div style="text-align:center; margin-top:10px; margin-bottom:10px;">
<?php foreach ($images as $image): ?>
        <img src="<?= $image?>" width="auto" height="200">
<?php endforeach ?>
</div>

<div id="logtext">
    ou <a href="clientpics.php">voltar</a> para selecionar de novo
</div>
<script type="text/javascript" src="java/alert2.js"></script>