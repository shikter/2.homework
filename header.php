<!DOCTYPE html>
<meta charset="UTF-8">
<base target="_self"">
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Little Estonia - My Applications</title>
	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
		<!-- jQuery google -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
		
		 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<meta charset="UTF-8"> <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
		<base target="_self"">
		<!--<link rel="stylesheet" type="text/css" href="app.css">-->
		
		
		
		
		
		  <script>
		  $(function() {
			$( ".datepicker" ).datepicker();
				$( ".format" ).change(function("d MM, yy"){
					$( ".anim" ).change(function("blind") {
						$( ".datepicker" ).datepicker( "dateFormat", "option", "showAnim", $( this ).val() );
												});
													});
						});
		  </script>
		  
		  <!-- $( ".datepicker" ).datepicker( Дополнительные ФУНКЦИИ ПИСАТЬ СЮДА ); -->
		  
		  
		  
		  
				
		 <script type="text/javascript">
		
		    function validate(){
			    var Login_id = document.getElementById('Login_id').value;
				var name = document.getElementById('name').value;
				var date = document.getElementById('date').value;
				var genre = document.getElementById('genre').value;
				var error = '';
				var formIsValid = true;
				
				if(!name){
					error += "<br>Name field is required";
					formIsValid = false;
				}
				
				if(!Login_id){
					error += "<br>Login field is required";
					formIsValid = false;
				}
				
				if(!date){
					error += "<br>Please select date";
					formIsValid = false;
				}
				
				/*else{
					if(preg_match("^[0-3][0-9].[0-1][0-9].[0-9]{4}$",$date)){
						//true
					}else{
						formIsValid = false;
					}
				}*/
				
				if(!genre){
					error += "<br>Please select the type of shooting";
					formIsValid = false;
				}
				
				document.getElementById('errors').innerHTML = error;
				return formIsValid;
			}
			
		</script>		
		
	
  </head>
  
 
  <body>
	
