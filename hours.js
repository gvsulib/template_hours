$(document).ready(function() {
	console.log('Loading today\'s hours...');
	$('.site .library-hours').load('https://matthew.reidsrow.com/temp/hours.php');			
});
