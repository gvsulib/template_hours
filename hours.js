$(document).ready(function() {
	console.log('Loading today\'s hours...');
	jQuery('.site .library-hours').load('https://prod.library.gvsu.edu/labs/template_hours/index.php');			
});
