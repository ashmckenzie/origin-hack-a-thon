$(document).ready(function() {
	update_users();
	update_search();
});

function update_users() {
	$('#users').load('/inc/php/dashboard_users.php');
	setTimeout(update_users, 3000);
}

function update_search() {
	$('#search_terms').load('/inc/php/dashboard_search.php');
	setTimeout(update_search, 3000);
}
