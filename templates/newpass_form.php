<div class="bootstrap">
<form id="myForm" action="newpass.php?action&userid="<?php echo $id; ?>"" method="POST">
<fieldset>
	<div class="form-group">
		<input class="form-control" placeholder="Password" type="password" name="pass" id="pass"/><br />
		<div class="white" id="passack"></div>
	</div>
	<input type="hidden" name="uid" id="uid" value="<?php echo $id; ?>"/>
	<div class="form-group">
		<input class="form-control" placeholder="Confirm password" type="password" name="confirm" id="confirm"/><br />
		<div class="white" id="confirmack"></div><div class="white" id="success" style="display: none;">You may now <a href="clientlog.php">login</a> with your new password</div>
	</div>

	<div class="form-group">
		<button id="submit" class="btn btn-default">Submit</button>
	</div>
</fieldset>
</form>
</div>
<script type="text/javascript" src="java/newpass.js"></script>