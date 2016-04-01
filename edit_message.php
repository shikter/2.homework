<?php

	//require another php file
	// ../../../ means > 3 folders back
	require_once("../../../config.php");
	
	//the variable does not exists in the URL
	if(!isset($_GET["edit"])){
		
		//redirect user
		echo "redirect";
		
		header("Location: tables.php");
		exit(); //don't execute further
		
	}else{
		echo "User want to edit row: ".$_GET["edit"] ;
		
		//ask for latest data for single row
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
		
		// maybe user wants to update data after clicking the button
		//echo $_GET["who"];
		if(isset($_GET["who"]) && isset($_GET["message"]) && isset($_GET["from_who"])){
			
			echo "<br>User modified data, tries to save...";
			
			//should be validation
			
			$stmt = $mysql->prepare("UPDATE messages_sample SET recipient=?, message=?, sender=? WHERE id=?");
			
			echo $mysql->error;
			
			$stmt->bind_param("sssi", $_GET["who"], $_GET["message"], $_GET["from_who"], $_GET["edit"]);
			
			if($stmt->execute()){
				
				echo "<br><h4><strong><span style='color:green'>Saved successfully</span></strong></h4>";
				
				// option one - redirect:
				
				//header("Location: tables.php");
				//exit();
				
				// option two - update variables:
				
				echo "<br><strong><span style='color:red'>Changed to:</span></strong><br>";
				
				echo "<strong>Name of recipient: </strong>" .$recipient = $_GET["who"]."<br>";
				echo "<strong>Message: </strong>" .$message = $_GET["message"]."<br>";
				echo "<strong>Sender name: </strong>" .$sender = $_GET["from_who"]."<br>";
				$id = $_GET["edit"];
				
				
			}else{
				
				echo $stmt->error;
			}
			
			
		}else{
			
					//user did not click any buttons yet,
					//give user latest data from db
					
					$stmt = $mysql->prepare("SELECT id, recipient, message, sender, created FROM messages_sample WHERE id=?");
				
				echo $mysql->error;
				
				//replace the ? mark
				$stmt->bind_param("i", $_GET["edit"]);
				
				//bind result data
				$stmt->bind_result($id, $recipient, $message, $sender, $created);
				
				$stmt->execute();
				//we have only 1 row of data
				if($stmt->fetch()){
					
					//we had data
					echo $id." ".$recipient." ".$message." ".$sender." ".$created;
					
				}else{
					
					//smth went wrong
					echo $stmt->error;
				}
		
			}
		
		
	}
?>

<?php require_once("header.php");?>

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
      <a class="navbar-brand" href="#">Little Estonia</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      <ul class="nav navbar-nav">
	  
        <li class="active"><a href="app_message.php">Message APP</a></li>
		<li><a href="app_reservation.php">Order APP</a></li>
		<li><a href="tables.php">Tables</a></li>
		
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<?php
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s');
					   //.date("d.m.Y H:i:s");

	?>

<div class="container">
<section id="application_message">
	
	
		<h2>Form to send message:</h2>
		<br>
		
				<form method="get">
				<ul STYLE="list-style-image: url(http://www.tlu.ee/~shikter/ristmed2/images/bullet/tlu_bullet.png)">
				<!-- ../../../imgages/tlu_bullet.png -->

				
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<input hidden name="edit" value="<?=$id;?>"><br><br> 
								
								<li><label for="who">Name of recipient<span style="color: red;">*</span>: </label></li>
								<input name="who" id="who" type="text" class="form-control" value="<?=$recipient;?>">
								
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
								<li><label for="message">Message<span style="color: red;">*</span>: </label></li>
								<input name="message" id="message" type="text" class="form-control" style="height: 75px;" valign="top" value="<?=$message;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<li><label for="from_who">Your name<span style="color: red;">*</span>: </label></li>
									<input name="from_who" id="from_who" type="text" class="form-control" value="<?=$sender;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
						<!-- btn-lg   visible-xs-inline  hidden-xs-->
							<input class="btn btn-primary hidden-xs" type="submit" value="E d i t">
							<input class="btn btn-primary btn-block visible-xs-inline" type="submit" value="E d i t">
							
						</div>
					</div>
				</ul>
				</form>
	
			</div>
	
	<br>
	
			<hr />
		
	</section>
</div>


	<div class="container">
		<section id="CopyRights">

			<br>
			<dl class="dl-horizontal">
				<dt>Beta Version 1.0</dt>
				<dd>© Vadim Kozlov</dd>
				<dt>Folders of</dt>
				<dd><div class="bkt"><a href="http://localhost:5555/~shikter/homeworks" target="_blank">Homework</a></div>
			</dl>
			<br>

		</section>
	</div>

	</body>
</html>