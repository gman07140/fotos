<div class="bootstrap">
<form class="ajax" action="newpassemail.php" method="post" style="padding-top:25px;">
<fieldset>
    <div class="form-group">
		<input autofocus class="form-control" placeholder="Email" type="text" name="email" id="email"/><br />
		<div class="white" id="emailack"></div>
	</div>
	
    <div class="form-group">
        <button type="submit" class="btn btn-default">Send</button>
        <div class="white" style="margin-top: 10px;" id="progress"></div>
    </div>
</fieldset>
</form>
</div>

	<script type="text/javascript" src="java/newpassemail.js"></script>
<div id="logtext">
    <a href="clientlog.php">back</a>
</div>