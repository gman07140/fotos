<div class="bootstrap">
<form id="myForm" action="clientlog.php" method="POST" style="padding-top:25px;">
<fieldset>
    <div class="form-group">
		<input autofocus class="form-control" placeholder="Email" type="text" name="email" id="email"/><br />
		<div class="white" id="emailack"></div>
	</div>

	<div class="form-group">
		<input class="form-control" placeholder="Password" type="password" name="pass" id="pass"/><br />
		<div class="white" id="passack"></div>
	</div>

	<div class="form-group">
		<button id="submit" class="btn btn-default">Login</button>
	</div>
</fieldset>
</form>
</div>
	<script type="text/javascript" src="java/clientlog.js"></script>
<div id="logtext">
    or go to <a href="adminlog.php">admin</a> page to log in as an administrator
    </br>
    click <a href="newpass2.php">here</a> if you have forgotten your password and need to reset
</div>