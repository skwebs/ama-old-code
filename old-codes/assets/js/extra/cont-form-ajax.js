"use strict";
$(document).ready(function() {

	// process the form
	$('form').submit(function(event) {
	//	$(".process-msg").fadeOut();
		
		$('.form-group .form-control').removeClass('border-danger'); // remove the error class
		$('.text-danger').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
		var formData = {
			'name' 	: $('input[name=name]').val(),
			'mob' 	: $('input[name=mob]').val(),
			'email'	: $('input[name=email]').val(),
			'sub' 	: $('input[name=sub]').val(),
			'msg' 	: $('textarea[name=msg]').val()
		};

		// server side form validation
		$.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: 'validate.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true,
			beforeSend	: ()=>{
				$(".process-msg").html("Data validating ...").parent().css("display","flex");
			}/*,
			error		: (err)=>{alert("error : \n\n"+JSON.stringify(err))},
			success		: (suc)=>{alert("success : \n\n"+JSON.stringify(suc))},
			complete	: (comp)=>{alert("complete : \n\n"+JSON.stringify(comp))}*/
		})
		//(1)
		.done(function(data) {
			if ( data.success){
				//alert("done1 : \n\n"+JSON.stringify(data));
				// log data to the console so we can see
				//console.log(JSON.stringify(data)); 
				//$(".process-msg").html("Data validated ...").parent().css("display","flex");
				//$(".process-msg").append("<p>Data validated ...</p>").parent().css("display","flex");
				process({show:true,msg:"Data validated!"});
				
				// send mail after validation
				$.ajax({
					type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
					url 		: 'send-mail.php', // the url where we want to POST
					data 		: formData, // our data object
					dataType 	: 'json', // what type of data do we expect back from the server
					encode 		: true,
					beforeSend	: ()=>{
						//$(".process-msg").html("Mail sending ...").parent().css("display","flex");
						//$(".process-msg").append("<p>Mail sending ...</p>").parent().css("display","flex");
						process({show:true,msg:"Mail sending..."});
					}/*,
					error		: (err)=>{alert("error : \n\n"+JSON.stringify(err))},
					success		: (suc)=>{alert("success : \n\n"+JSON.stringify(suc))},
					complete	: (comp)=>{alert("complete : \n\n"+JSON.stringify(comp))}*/
				})
				//(2)
				.done(function(data) {
					
					if (data.user.success) {
					//user email successful
						//$(".process-msg").append("<p>User mail sent !</p>").parent().css("display","flex");
						//$(".process-msg").html("User mail sent !").parent().css("display","flex");
						process({show:true,msg:"User mail sent!"});
						if (data.admin.success) {
						//admin email successful
						process({show:false});
						//$(".process-msg").html("").parent().css("display","none");
						//$(".process-msg").html("Admin mail sent !").parent().css("display","flex").delay(1200).css("display","none");
							alert("Process completed...")
							$("form")[0].reset();
						}else{
						//admin email failure
							process({show:false});
							//$(".process-msg").html("").parent().css("display","none");
							alert(data.admin.message)
						}
					}else{
					//user email failure
						process({show:false});
						//$(".process-msg").html("").parent().css("display","none");
						alert(data.user.message)
					}
					//alert("done2 : \n\n"+JSON.stringify(data));
					// log data to the console so we can see
					//console.log(JSON.stringify(data)); 
				});
				
			// here we will handle errors and validation messages
			}else {
				process({show:false});
				//$(".process-msg").html("").parent().css("display","none");
				
				// handle errors for name ---------------
				if (data.errors.name) {
					$('#name-group input').addClass('border-danger'); // add the error class to show red input
					$('#name-group').append('<div class="text-danger">' + data.errors.name + '</div>'); // add the actual error message under our input
				}

				// handle errors for mob ---------------
				if (data.errors.mob) {
					$('#mob-group input').addClass('border-danger'); // add the error class to show red input
					$('#mob-group').append('<div class="text-danger">' + data.errors.mob + '</div>'); // add the actual error message under our input
				}

				// handle errors for email ---------------
				if (data.errors.email) {
					$('#email-group input').addClass('border-danger'); // add the error class to show red input
					$('#email-group').append('<div class="text-danger">' + data.errors.email + '</div>'); // add the actual error message under our input
				}

				// handle errors for sub ---------------
				if (data.errors.sub) {
					$('#sub-group input').addClass('border-danger'); // add the error class to show red input
					$('#sub-group').append('<div class="text-danger">' + data.errors.sub + '</div>'); // add the actual error message under our input
				}
				// handle errors for msg ---------------
				if (data.errors.msg) {
					$('#msg-group textarea').addClass('border-danger'); // add the error class to show red input
					$('#msg-group').append('<div class="text-danger">' + data.errors.msg + '</div>'); // add the actual error message under our input
				}

			} /*else {

				// ALL GOOD! just show the success message!
				$('form').append('<div class="alert alert-success">' + data.message + '</div>');

				// usually after form submission, you'll want to redirect
				// window.location = '/thank-you'; // redirect a user to another page

			}*/
		})

			// using the fail promise callback
			.fail(function(data) {
				alert("fail :\n\n"+JSON.stringify(data));
				process({show:false});
				//$(".process-msg").html("").parent().css("display","none");
				// show any errors
				// best to remove for production
				console.log(data);
			})
			/*.always(function(data) {
			alert("always :\n\n"+JSON.stringify(data));
			// show any errors
			// best to remove for production
			console.log(data);
			})
			*/;

		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});

var process=(data)=>{
	if(data.show){
		$(".process-msg").html(data.msg).parent().css("display","flex");
	}else{
		$(".process-msg").html("").parent().css("display","none");
	}
}

});
























