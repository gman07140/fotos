$(document).ready(function()
{
	var i = 0;
	$("#whatsapp").click( function() {
		if (i == 0)
		{
			$("#whats").css("display","block");
			i = 1;
		}
		else
		{
			$("#whats").css("display","none");
			i = 0;
		}
	});
});