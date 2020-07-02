autosize(document.querySelectorAll('.user-textarea'));

function textareaHeightChecking() {
	if($('.user-textarea') > 50) {
		$('.user-textarea').height(50);
		console.log('textarea is more than 50px!');
	}
}

if($('.user-name').text() == '') {
	//console.log('.user-name is empty!');
	$('.user-name').hide();
	$('.user-nickname').css({
		"font-weight": "600",
		"font-size": "26px",
		"line-height": "1.25",
	});
}


