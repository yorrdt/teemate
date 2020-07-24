//autosizing textarea if count of char > height of textarea

autosize(document.querySelectorAll('.user-textarea'));

//set textarea size to 50px if textarea is empty

function textareaHeightChecking() {
	if($('.user-textarea') > 50) {
		$('.user-textarea').height(50);
		console.log('textarea is more than 50px!');
	}
}

// 

if($('.user-name').text() == '') {
	//console.log('.user-name is empty!');
	$('.user-name').hide();
	$('.user-nickname').css({
		"font-weight": "600",
		"font-size": "26px",
		"line-height": "1.25",
	});
}


//

let post = {
	
	pinPost: function() {
		console.log('pinPost function');
	},
	
	addToBookmarks: function() {
		console.log('addToBookmarks function');
	},
	
	deletePost: function(item_id) {
		console.log('deletePost function');
		$.get('settings/post-settings.php', {
			id: "1",
			success: function(data) { alert(data); }
		});
	},
	
	disableComments: function() {
		console.log('disableComments function');
	},
}

/*
$data = $_POST;
	
 	if(isset($data['do_posting'])) {
 		$errors = array();
		
		if(trim($data['textarea']) == '') {
			$errors[] = 'Пустое поле';
		}
		
		if(empty($errors)) {
			$userID = 'articles' . $_SESSION['logged_user']->id;
			$post = R::dispense($userID);
			$post->author = $_SESSION['logged_user']->login;
			$post->text = $data['textarea'];
			$post->pubdate = date('d.m.Y H:i', strtotime('+3 hour'));
			$post->count_of_likes = 0;
			$post->count_of_comments = 0;
			$post->count_of_views = 0;
			R::store($post);
		} else {
			//echo array_shift($errors);
		}
	} 
*/
