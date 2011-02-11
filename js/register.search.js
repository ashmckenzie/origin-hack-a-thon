
$('#form_query').one('submit', function () {
	
  var register_url = "/ajax/register_search_term.php";
  var search_query = document.form_query.query.value;
  
  $.ajax({
    url: register_url,
    type: "POST",
    data: ({query : search_query}),
    dataType: "json",
    success: function(msg) {
			$('#form_query').submit();
    },
  	error: function(msg) {
  	  console.log('OHNOES!\n...failcats');
  	}
  });

	return false;
});
