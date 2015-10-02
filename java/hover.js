$(document).ready(function()
{
	$('.small').hover(function () {
	$(this).next().css("border-left","0px");
	$(this).css("border-right","1px solid white");
     });

   $('.smallast').hover(function () {
   	$(this).next().css("border-left","0px");
	$(this).prev().css("border-right","0px");
	$(this).css("border-left","1px solid white");
	$(this).css("border-right","1px solid white");
     });

});