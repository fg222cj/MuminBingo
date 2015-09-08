/**
 * Created by Foss on 2015-09-04.
 */
$(document).ready(setEvents);

function setEvents() {
    jQuery("td").click(function() {
        console.log("click");
        if(jQuery(this).hasClass("marked")) {
            console.log("removeclass");
            jQuery(this).removeClass("marked");
        }
        else {
            console.log("addclass");
            jQuery(this).addClass("marked");
        }
    });
}