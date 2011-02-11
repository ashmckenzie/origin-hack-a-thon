$(document).ready(function() {
	update_all();
});

function update_users() {
	$('#users').load('/inc/php/dashboard_users.php');
}

function update_search_top() {
	$('#search_terms_top').load('/inc/php/dashboard_search_top.php');
}

function update_search_recent() {
	$('#search_terms_recent').load('/inc/php/dashboard_search_recent.php');
}

function update_all() {
	update_users();
	update_search_top();
	update_search_recent();
	setTimeout(update_all, 3000);
}
