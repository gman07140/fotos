function init() {
  console.log('ok');
  formblock = document.getElementById('form1');
  forminputs = formblock.getElementsByTagName('input');

  var checkedValue = $('.fancy:checked').val();
  console.log(checkedValue);
}

function handleClick() {
  var checkedValue = $('.fancy').val();           // returning value of 'title'
  console.log(checkedValue);

  formblock = document.getElementById('form1');
  forminputs = formblock.getElementsByTagName('input');

  for (i = 0; i < forminputs.length; i++) 
  {
    if (forminputs[i].getAttribute('value') == checkedValue)
    {
      if(forminputs[i].checked)
      {
        forminputs[i].checked = false;
      }
      else
      {
        forminputs[i].checked = true;
      }
    }
  }
}

function myFunction() {
 formblock= document.getElementById('form1');
 forminputs = formblock.getElementsByTagName('input');
   //build the array of checked users
   var arry = [];
   for (i = 0; i < forminputs.length; i++) 
   {
       if (forminputs[i].checked)
       {
           arry.push(forminputs[i].getAttribute('value'));
        }
   }
        
   //check if any boxes were checked, alert user if none were
   if (arry.length < 1)
   {
       alert("Please select at least one picture");
       return false;
   }
}