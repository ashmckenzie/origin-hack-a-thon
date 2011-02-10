


$(document).ready(function () {
  
  var register_url = "/ajax/register_hit.php";
  var document_url = window.location.pathname;
  
  $.ajax({
      url: register_url,
      type: "POST",
      data: ({url : document_url}),
      dataType: "json",
      success: function(msg) {
	  	alert(msg.url);
      },
  	  error: function(msg) {
  	    alert('OHNOES!\n...failcats');
  	  }
    });
});

