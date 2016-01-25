/**
 * Created by Foss on 2015-09-04.
 */
$(document).ready(setEvents);

function setEvents() {
    jQuery("form td").click(function() {
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
    update();
    //setInterval(update, 2000);
}

function updateAndGetOtherTables() {
    var username = $('form').find('input[name=username]').val();
    var sessionID = $('form').find('input[name=sessionID]').val();
    var tiles = $('form').find('input[name=tiles]').val();
    var markedTiles = new Array();
    $('form').find('input[name=hidden_tile]').each(function(index, element) {
       markedTiles.push($(element).val());
    });

    $.ajax({
        type: 'post',
        url: 'src/AjaxController.php',
        dataType: "html",
        data: {username: username,
               sessionID: sessionID,
               markedTiles: JSON.stringify(markedTiles)}
    })
        .done(function(result) {
            $('#others').html(result);
        });

};

function update() {
    updateAndGetOtherTables();

};