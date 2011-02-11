


$(document).ready(function () {
  
  // var register_url = "/ajax/ajax_test.php";
  var register_url = "/ajax/register_hit.php";
  
  var document_url = window.location.pathname;
  var document_referrer = document.referrer;
  
  $.ajax({
      url: register_url,
      type: "POST",
      data: ({url : document_url, referrer : document_referrer}),
      dataType: "json",
      success: function(msg) {
	  	// alert(msg.url + '\n' + msg.referrer);
      },
  	  error: function(msg) {
  	    alert('OHNOES!\n...failcats');
  	  }
    });
});

