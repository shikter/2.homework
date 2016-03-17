<!DOCTYPE html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title of the website</title>
	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
		<!-- jQuery google -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
		
		<meta charset="UTF-8"> <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
		<base target="_self"">
		<link rel="stylesheet" type="text/css" href="app.css">
		
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
		
	<!-- <style>
		
   table {
	border:1px solid;
    width: 1000px; 		
	border-collapse: collapse;
    margin: auto;		 
   }
   th { 
    text-align: left; 		 /* Выравнивание по левому краю */
    background: #ccc; 		 /* Цвет фона ячеек */
    padding: 5px; 			 /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
   td { 
    padding: 5px; 			 /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
	text-align: center; 
 
	</style> -->
	
  </head>
  
 
  <body>
	
