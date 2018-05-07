$(document).ready(function() {
	console.log('Loading today\'s hours...');
	$('.site .library-hours').load('https://prod.library.gvsu.edu/labs/template_hours/hours.php');			
});
