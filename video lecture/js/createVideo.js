/** Belongs to headermenuCourse.php
 ** Responsible for adding a new lecture video to a course **/
$(document).ready(function(){
  $('#createVideo-form').submit(function(e){
    e.preventDefault();
	var video_title = $('input[name=video_title]').val();
	var video_description = $('textarea[name=video_description]').val();
	var url = $('input[name=url]').val();
	url = youtube_parser(url);
	if(!url) {
		$('#createVideo_error').html("");
		$('#createVideo_error').css('opacity', 1);
		$('#createVideo_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspLink incorrect!</p>');
		$('#createVideo_error').fadeTo(2000, 0.7);
		return 0;
	}
	var course_id = $("#createVideo-form").data("course");
	var user_id = $("#createVideo-form").data("user");
	console.log(user_id);
	$.ajax({
	  url: '/php/setVideo.php', //PHP file you want to access
	  type: 'POST',
	  contentType: "application/json; charset=utf-8", //Sets data you are sending as JSON
	  dataType: "json", //Tells AJAX to expect JSON data to be returned
	  data: JSON.stringify({'user_id': user_id, 'course_id': course_id, 'video_title' : video_title, 'video_description' : video_description, 'url' : url}), //The data to send. Needs to turned into JSON compatible data
	  success: function(data) { //Data is the returned variable with echo.
		  $('#createVideo_error').html("");
		  $('#createVideo_error').css('opacity', 1);
		  var recv = data["code"]; //data["code"] is set in the PHP file with array('code' => -1) e.g.
		  if(recv === -2) {
			$('#createVideo_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspDatabase error! Please consult administrator</p>');
			$('#createVideo_error').fadeTo(2000, 0.7);	
		  }
		  else if(recv === -1) {
			//Look over this error message. It used to be a placeholder and I don't think it can even be triggered right now
			$('#createVideo_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspLink incorrect!</p>');
			$('#createVideo_error').fadeTo(2000, 0.7);	
		  }
		  else if(recv === 1) {
			window.location.replace("http://localhost:8080/course.php?user="+user_id+"&course="+course_id);
		  }
		  else{
			$('#createVideo_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspSomething went terribly wrong</p>');
			$('#createVideo_error').fadeTo(2000, 0.7);	
		  }
	  },
	  error: function(xhr, desc, err) {
		console.log(xhr);
		console.log("Details: " + desc + "\nError:" + err);
	  }
	}); // end ajax call
  });
	 /* Function which extracts Youtube video id */
	function youtube_parser(url){
		var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
		var match = url.match(regExp);
		return (match&&match[7].length==11)? match[7] : false;
	}
})
