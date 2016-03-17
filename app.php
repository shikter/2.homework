<?php require_once("header.php");?>

<?php

	//require another php file
	// ../../../ means > 3 folders back
	require_once("../../../config.php");
	

	$everything_was_okay = true;

	//********************
	//To field validation
	//********************

	//check if there is variable in the URL
	//if ther is ?to= in the URL
	
	/* 
	Thanks, I added new code function here:
	function generateIdea(){

	}
	*/
	

	if(isset($_GET["who"])){ 
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty ($_GET["who"])){
			//its empty
			$everything_was_okay = false;
			echo "Please enter the name to who you address <br>"; 
			
		}else{
			//its not empty
			echo "To: ".$_GET["who"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
		
	}	
// -------------------------------------------------------------------
		
	
	
		if(isset($_GET["message"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty ($_GET["message"])){
			//its empty
			$everything_was_okay = false;
			echo "Please enter the message <br>";
			
		}else{
			//its not empty
			echo "The message: ".$_GET["message"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
	
// -------------------------------------------------------------------

		if(isset($_GET["from_who"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty ($_GET["from_who"])){
			//its empty
		$everything_was_okay = false;
			echo "Please type your name <br>";
			
		}else{
			//its not empty
			echo "From: ".$_GET["from_who"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
	
// -------------------------------------------------------------------

	//Getting the message from address
	// if there is ?name=... then $_get["name"]
	
	//$my_message = $_GET["message"];
	//$who = $_GET["who"];
	//$from_who = $_GET["from_who"];
	
	
	//echo "Message from ".$from_who. " to ".$who. " - " .$my_message;

	
	/****************************
	*********SAVE TO DB**********
	*****************************/

	// ? was everthing okay
	if($everything_was_okay == true){
		
		echo "Saving to database ...";
		
		//connection with the username and password
		//access username from config
		
		//echo $db_username;
		
		
		
		//1 servername
		//2 username
		//3 password
		//4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
		
		$stmt = $mysql->prepare("INSERT INTO messages_sample(recipient, message, sender) VALUES(?,?,?)");
		
		//echo error
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s -string, date or smth that is based on characters and numbers.
		// i - integer, number
		// d - decimal, floatval
		
		// for each question mark its type with one letter
		$stmt->bind_param("sss", $_GET["who"], $_GET["message"], $_GET["from_who"]);
		
		//save
		if($stmt->execute()){
			echo "saved sucessfully";
		}else{
			echo $stmt->error;
		}
		
	}
?>



<figure id="tlu_logo"><img border=none src="http://www.tlu.ee/~shikter/ristmed2/images/TLU_logo.jpg" alt="TLU" width="200"></figure>
<br>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      <ul class="nav navbar-nav">
	  
        <li class="active"><a href="app_b.php">App page</a></li>
		<li><a href="app_reservation.php">Make a reservation</a></li>
		<li><a href="table_b.php">Table</a></li>
		
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<section id="application_message">

        <h3>Form to send message:</h3>
		<form method="get">
			<ul STYLE="list-style-image: url(http://www.tlu.ee/~shikter/ristmed2/images/bullet/tlu_bullet.png)">

				<li> 	<label for="who">Name of recipient*: <label><br>
						<input type="text" name="who"><br>
				</li>
						
				<li> 	<label for="message">Message*: <label><br>
						<input type="text" style="width: 173px; height: 45px;" valign="top" name="message"><br>
				</li>
				<li> 	<label for="from_who">Your name*: <label><br>
						<input type="text" name="from_who"><br><br>
				</li>
						<input type="submit" value="Send"><br>
			</ul>
		</form>	
		
		
			<div class="container">
	
	
	
				<form>
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="to">To: </label>
								<input name="who" id="to" type="text" class="form-control">
								
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-1 col-sm-1">
								<label for="message">Message: </label>
							</div>
							<div class="col-md-2 col-sm-5">
								<input name="message" id="message" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<label for="message">From Who: </label>
									<input name="from_who" id="message" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
						<!-- btn-lg   visible-xs-inline  hidden-xs-->
							<input class="btn btn-primary hidden-xs" type="submit" value="Save data 1">
							<input class="btn btn-primary btn-block visible-xs-inline" type="submit" value="Save data 2">
							
						</div>
					</div>
				</form>
	
			</div>
	
	<br>
	<?php
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s');
					   //.date("d.m.Y H:i:s");

	?>
		
</section>
</div>


<!--  
<section id="Terms">
<h2>Description:</h2>
<p> Course: "<strong>Web Programming</strong>".</p>
<p> Teacher: "<strong>Romil Robtsenkov</strong>".</p>
<p>This topic about my learning "<strong><small>PHP</small></strong>" & "<strong><small>MySQL</small></strong>" and also "<strong><small>HTML</small></strong>" & "<strong><small>CSS</small></strong>". </p>
<p>You can see how I develop my skills.
You can find here my first messanger application. Which is on the head of page.
</p>
<center><img src="../../homeworks/1.homework/img/php-mysql-html-css.png" alt="PHP + MySQL & HTML5 + CSS3" width="325";></center>
</section>
-->

<br>
<hr />
</section>
</div>


<section id="address">

<br>

<address>Tallinn, Narva Rd 29</address>

<div class="bkt"><a href="http://localhost:5555/~shikter/homeworks" target="_blank">1.Homework - Folder</a></div>

<br>

</section>

</body>
</html>