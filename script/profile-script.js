autosize(document.querySelectorAll('.user-textarea'));



if($('.user-name').text() == '') {
	console.log('.user-name is empty!');
	$('.user-name').hide();
	$('.user-nickname').css({
		"font-weight": "600",
		"font-size": "26px",
		"line-height": "1.25",
		"color": "#fff",
	});
}