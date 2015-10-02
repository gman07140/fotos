var p = 0;
var q = 0;
var r = 0;
var s = 0;
$(document).ready(function()
{
    // add new album
    $("#newalb").click( function() 
    {
        $.post( $("#newalbum").attr("action"),
             $("#newalbum :input").serializeArray(),
             function(info) {
               $("#progress").html(info);
             });
        return false;
    });

    // get all divs with class of 'detail'
    formblock= document.getElementsByClassName('detail');
 
    // when 'edit gallery' button clicked
    $("#show").click( function() {
        // if divs are not showing, show them. Else, hide them
        if (p == 1)
        {
            $("#remove").css("display","block");
            $("#filter").css("display","none");
            $("#upload_ops").css("display","none");
            $("#albums").css("display","none");

            $('#show').val('Collapse');                     // change button text
            $('#filter_cat').val('Filter');
            $('#options').val('Upload Pics'); 
            $('#album_show').val('New album');

            for (i = 0; i < formblock.length; i++)
            {
                var det = formblock[i];
                $(det).css("display","block"); 
            }
            p = 0; q = 0; r = 0; s = 0;
        }

        else
        {
            $("#remove").css("display","none");
            $('#show').val('Edit Pics');     
            for (j = 0; j < formblock.length; j++) 
            {
                var det = formblock[j];
                $(det).css("display","none"); 
            }
            p = 1;
        }       
    });

    $("#options").click( function() {
        // show the upload options
        if (q == 0)
        {
            $("#upload_ops").css("display","block");
            $("#remove").css("display","none");
            $("#filter").css("display","none");
            $("#albums").css("display","none");

            $('#options').val('hide upload options');      // change button text
            $('#filter_cat').val('Filter');
            $("#show").val('Edit Pics'); 
            $('#album_show').val('New album');
            q = 1; r = 0; p = 1; s = 0;
        }

        else
        {
            $("#upload_ops").css("display","none");
            $('#options').val('Upload Pics');  
            $("#remove").css("display","block");
            $('#show').val('Collapse');
            q = 0;
        }       
    });

    $("#filter_cat").click( function() {
        // show the upload options
        if (r == 0)
        {
            $("#upload_ops").css("display","none");
            $("#remove").css("display","none");
            $("#filter").css("display","block");
            $("#albums").css("display","none");

            $('#filter_cat').val('hide filter');      // change buttons texts'
            $('#options').val('Upload Pics');
            $('#show').val('Edit Pics'); 
            $('#album_show').val('New album');
            r = 1; q = 0; p = 1; s = 0;
        }
        else
        {
            $("#filter").css("display","none");
            $('#filter_cat').val('Filter');
            $('#show').val('Collapse');
            $("#remove").css("display","block");
            r = 0;
        }       
    });

    $("#album_show").click( function() {

        if (s == 0)
        {
            $("#upload_ops").css("display","none");
            $("#remove").css("display","none");
            $("#filter").css("display","none");
            $("#albums").css("display","block");

            $('#album_show').val('hide');      // change buttons texts'
            $('#options').val('Upload Pics');
            $('#show').val('Edit Pics'); 
            $('#filter_cat').val('Filter');
            p = 1; q = 0; r = 0; s = 1;
        }

        else
        {
            $("#albums").css("display","none");
            $('#album_show').val('New album');
            $("#remove").css("display","block");
            $('#show').val('Collapse');
            s = 0;
        }       
    });

    // filter the gallery by admin selection
    // by category...
    $("#filtercat").change(function() {
      var filter = $("#filtercat").val();
      window.location.replace("gallery.php?action&categoryid="+filter);
    });

    // ...or album
    $("#filteralb").change(function() {
      var album = $("#filteralb").val();
      window.location.replace("gallery.php?action&albumid="+album);
    });
});