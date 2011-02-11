

$(document).ready(function () {
  
  var register_url = "/ajax/ajax_test.php.php";
  var search_query = window.location.hostname;
  
  $.ajax({
      url: register_url,
      type: "POST",
      data: ({query : search_query}),
      dataType: "json",
      success: function(msg) {
	  	alert(msg.url);
      },
  	  error: function(msg) {
  	    alert('OHNOES!\n...failcats');
  	  }
    });
});

