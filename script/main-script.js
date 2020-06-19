autosize(document.querySelectorAll('.user-textarea'));

function onButtonClick() {
	let height = $('.user-textarea').height();
	/* console.log(height); */
	
	$('.user-textarea').height(50);
}