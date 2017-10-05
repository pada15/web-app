/* Belongs to index.php and is used when registering a new account */
$(document).ready(function(){
  $('#register-form').submit(function(e){
	console.log("JS entered");
    e.preventDefault();
	var username = $('input[name=username_reg]').val();
	var pwd = $('input[name=password_reg]').val();
	var pwd2 = $('input[name=password_confirm]').val();
	var firstname = $('input[name=firstname]').val();
	var lastname = $('input[name=lastname]').val();
	var school = $('input[name=school]').val();
	var programme = $('input[name=programme]').val();
	var email = $('input[name=email]').val();
	console.log(username);
	console.log(pwd);
    $.ajax({
      url: '/php/register.php', //PHP file you want to access
      type: 'POST',
	  contentType: "application/json; charset=utf-8", //Sets data you are sending as JSON
	  dataType: "json", //Tells AJAX to expect JSON data to be returned
      data: JSON.stringify({'username_reg' : username, 'password_reg' : pwd, 'password_confirm' : pwd2, 'firstname' : firstname, 'lastname' : lastname, 'school' : school, 'programme' : programme, 'email' : email}), //The data to send. Needs to turned into JSON compatible data
      success: function(data) { //Data is the returned variable with echo.
		  $('#register_error').html(""); 
		  $('#register_error').css('opacity', 1);
		  var recv = data["code"]; //data["code"] is set in the PHP file with array('code' => -1) e.g.
		  if(recv === -2) {
			$('#register_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspDatabase error! Please consult administrator</p>');  
			$('#register_error').fadeTo(2000, 0.7);
		  }
		  else if(recv === -1) {
			$('#register_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspPasswords do not match!</p>');  
			$('#register_error').fadeTo(2000, 0.7);
		  }
		  else if(recv === 0) {
			$('#register_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspUsername already exists!</p>');  
			$('#register_error').fadeTo(2000, 0.7);
		  }
		  else if(recv === -3) {
			$('#register_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspEmail already exists!</p>'); 
			$('#register_error').fadeTo(2000, 0.7);			
		  }
		  else if(recv === -4) {
			$('#register_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspUsername contains illegal characters!</p>');  
			$('#register_error').fadeTo(2000, 0.7);
		  }
		  else if(recv === 1) {
			window.location.replace("http://localhost:8080/start.php");
		  }
		  else{
			$('#register_error').append('<p><i class="fa fa-times" style="color: red"></i>&nbspSomething went terribly wrong</p>');
			$('#register_error').fadeTo(2000, 0.7);
		  }
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
  });
})
	