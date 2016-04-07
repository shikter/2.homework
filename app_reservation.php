<?php

			require_once("../../../config.php");


				$dataExists = false;
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					$Login_id = $_POST["Login_id"];
					$name = $_POST["name"];
					$date = $_POST["date"];
					$genre = $_POST["genre"];
					$description = $_POST["description"];
						
					if($name && $Login_id && $date && $genre){
						$dataExists = true;
						$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
						
						$stmt = $mysql->prepare("INSERT INTO Reservation(Login, Name, reserv_date, label_genre, description) VALUES(?,?,?,?,?)");
						
						//echo error
						echo $mysql->error;
						
						// for each question mark its type with one letter
						$stmt->bind_param("sssss", $_POST["Login_id"], $_POST["name"], $_POST["date"], $_POST["genre"], $_POST["description"]);
						
						//save
						if($stmt->execute()){
							echo "saved sucessfully";
						}else{
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
	  
        <li><a href="app_message.php">Message APP</a></li>
		<li class="active"><a href="app_reservation.php">Order APP</a></li>
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
	<section id="application_reservation">
		
	<?php
		if($dataExists){
			echo 
			
			"<div>
			
			<br>Login: $Login_id
			<br>Name: $name
			<br>Date: $date
			<br>Type of shooting: $genre
			<br>Description: $description
			
			<br><br>Sent to database ... <span style='color: red;'>saved sucessfully</span>
			</div>
			<br>
			";
		}
		
	?>
		
	<h2>Reservation form:</h2>
	<div id="errors" style="color: red;"></div>
	
	
	<form id="dataForm" method="post" onsubmit="return validate();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
		<br>
		<table border="0">
			<tr>
				<td width="185">
		<p />Login<span style="color: red;">*</span>: 
				</td>
				
				<td>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
		<input type="text" name="Login_id" id="Login_id" class="form-control" style="width: 300px;" placeholder="User name">
							</div>
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td width="185">
		<p />Name<span style="color: red;">*</span>: 
				</td>
				
				<td>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
		<input type="text"  name="name" id="name" class="form-control" style="width: 300px;" placeholder="Your full name">
							</div>
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td width="185">
		<p /><span title="Issue date">Issue date<span style="color: red;">*</span>: </span>
				</td>
				
				<td>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
		<input type="text" name="date" id="datepicker" size="30" class="form-control datepicker" style="width: 300px;" placeholder="31.12.2016">
							</div>
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td width="185">
		<p />What kind of movie<span style="color: red;">*</span>: 			
				</td>
				
				<td>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
								<select id="genre" name="genre" class="form-control" style="width: 300px;" placeholder="Genre">
									<!-- <option value="notselected">Pick a category:</option>  NOT WORKING > without IF and ELSE. -->
									<option></option>
									<option>Clip movie</option>
									<option>Advertisement</option>
									<option>TV production (procedural, broadcasting...)</option>
									<option>Home movie (travel, wedding...)</option>
									<option>Documentary</option>
									<option>Short movie</option>
									<option>Feature film</option>
									<option>Silent film</option>
									<option>Blue movie (+18)</option>
									<option>Animation</option>
									<option>Other</option>
								</select>
							</div>
						</div>
					</div>		
				</td>
			</tr>
		
			<tr>
				<td width="185">
								<p />Description:
				</td>

				<td>
				<div class="row">
						<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<textarea name="description" type="text" class="form-control" style="width: 300px; height: 120px;"></textarea>
							</div>
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td width="185">
				&nbsp;
				</td>
				
				<td>	
	<br>	<div class="row">
						<div class="col-md-1 col-sm-4">
						<!-- btn-lg   visible-xs-inline  hidden-xs-->
							<input class="btn btn-primary hidden-xs" type="submit" value="Make a reservation">
							<input class="btn btn-primary btn-block visible-xs-inline" type="submit" value="Make a reservation">
							
						</div>
			</div>
				</td>
			</tr>
			
			
			
			
		</table>	
	</form>


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