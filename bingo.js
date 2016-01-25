/**
 * Created by Foss on 2015-09-04.
 */
$(document).ready(setEvents);

function setEvents() {
    jQuery("td").click(function() {
        var tileID = jQuery(this).attr('name');
        if(jQuery(this).hasClass("marked")) {
            jQuery(this).removeClass("marked");
            jQuery("#hidden_tile_" + tileID).val("unmarked");
        }
        else {
            jQuery(this).addClass("marked");
            jQuery("#hidden_tile_" + tileID).val("marked");
        }
    });

    setInterval(update, 2000);
}

function update() {
    var username = $('form').find('input[name=username]').val();
    // Todo: hämta all data och kötta in skiten med ajax
    $.ajax({
        type: 'post',
        url: 'src/AjaxController.php',
        data: tba,
        success: function () {
            alert('form was submitted');
        }
    });
};