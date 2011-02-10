

/**
 * Register the actual page hit
 * 
 */
function registerPageHit() {

      glpostcode = $("#postcode").attr("value");
      var register_url = "/ajax/register.hit.php";

      $.ajax({
        url: register_url,
        global: false,
        type: "POST",
        data: ({url : $('#postcode').attr("value")}),
        dataType: "json",
        success: function(msg) {
            alert(msg);
        },
        error : function () {
            alert('fail');
        }
      }
}

