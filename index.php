<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			body {font-family: Arial;}

			* {box-sizing: border-box}

			/* Style the tab */
			.subm {
			display: block;
			  background-color: inherit;
			  color: black;
			  padding: 22px 16px;
			  width: 100%;
			  border: 1px solid #444444;
			  outline: none;
			  text-align: left;
			  cursor: pointer;
			  transition: 0.3s;
			  color:white;
			  font-weight: bold;
			  font-size: 15px;
			  background-color: #353535;
			  width: 15%;
			
			}

			.subm:hover {
			  background-color: #444444;
			}

			/* Create an active/current "tab button" class */
			.subm:active {
			  background-color: #282828;
			}
			.tab {
			  float: left;
			  border: 0px solid #282828;
			  background-color: #353535;
			  width: 15%;
			  height: 300px;
			}

			/* Style the buttons that are used to open the tab content */
			.tab button {
			  display: block;
			  background-color: inherit;
			  color: black;
			  padding: 22px 16px;
			  width: 100%;
			  border: 1px solid #444444;
			  outline: none;
			  text-align: left;
			  cursor: pointer;
			  transition: 0.3s;
			  color:white;
			  font-weight: bold;
			  font-size: 15px;
			}

			/* Change background color of buttons on hover */
			.tab button:hover {
			  background-color: #444444;
			}

			/* Create an active/current "tab button" class */
			.tab button.active {
			  background-color: #282828;
			}

			/* Style the tab content */
			.tabcontent {
			  float: left;
			  padding: 0px 50px;
			  border: 0px solid #282828;
			  width: 70%;
			  border-left: none;
			  height: 300px;
			  color:white;
			}
			.modal {
			  display: none; /* Hidden by default */
			  position: fixed; /* Stay in place */
			  z-index: 1; /* Sit on top */
			  padding-top: 100px; /* Location of the box */
			  left: 0;
			  top: 0;
			  width: 100%; /* Full width */
			  height: 100%; /* Full height */
			  overflow: auto; /* Enable scroll if needed */
			  background-color: #353535; /* Fallback color */
			  background-color: #353535; /* Black w/ opacity */
			}

			/* Modal Content */
			.modal-content {
			  background-color: rgba(0,0,0,0);;
			  margin: auto;
			  padding: 20px;
			  border: 0px solid #888;
			  width: 80%;
			}
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			  color:white;
			}

			td, th {
			  border: 1px solid #3d3d3d;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {
			  background-color: #3d3d3d;
			  
			}
		</style>
	</head>
<?php
function okparams(){
	$neededparams = array("db_ip", "db_user", "db_name", "cl_table", "cl_pass", "cl_alg");
	for($i = 0; $i < count($neededparams); $i++){
		if(isset($_POST[$neededparams[$i]]) && !empty($_POST[$neededparams[$i]])) continue;
		else{
			return 0;
			break;
			
		}
	}
	return 1;
}
?>
	<body bgcolor="#353535">
		<br><br><br><br>
		<center>
		<font color=white><h1>Mass database password encryptor</h1><h3>(c)Vennox 2019<br>Daca vr sa ma injuri: Discord - Vennox#0768</h3>
		</center><br><br><br>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(i) Util cand ai un server fara parole criptate si vrei sa le cripezi, nu mai e nevoie sa dai wipe la conturi.. alegi algoritmul de criptare si le cripteaza automat.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Este inca in beta. Codul este destul de simplu, n-ar trb sa fie erori dar se poate intampla. <b>Intotdeauna faceti backup la baza inainte sa folositi.</b></d><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De asemenea, s-ar putea ca unele hosturi (ex. gazduire) sa nu accepte conectarea la baza fara sa deschizi ticket in care sa zici ip-ul pe care e hostat fisierul care vrea sa acceseze baza (in cazu asta index.php)</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ar fii bine sa descarcati voi baza de pe host si sa o urcati pe local cu xampp si sa criptati cu datele de la local, dupa doar inlocuiti pe host. E mai sigur.</p></font>
		<?php
		if(!okparams()) echo("<p><font color=red><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Completeaza toti parametrii inainte sa incepi criptarea</b></font></p><br>");
		else echo"<p>&nbsp;<br></p>";
		 ?>
		<div class="tab">
		<?php
			if(okparams()){                   // Daca e prima data cand deschide pagina (n-a dat submit) sa deschida automat tabul de db conn, daca a dat submit si revine pe pagina sa se deshchida logs
				?>
				  <button class="tablinks" onclick="openOption(event, 'dbconn')">Database Connection</button> 
				  <button class="tablinks" onclick="openOption(event, 'columns')">General</button>

				  <button class="tablinks" onclick="openOption(event, 'logs')" id="defaultOpen">Logs</button>
		  		<?php
			}
			else{
				?>
				  <button class="tablinks" onclick="openOption(event, 'dbconn')" id="defaultOpen">Database Connection</button>
				  <button class="tablinks" onclick="openOption(event, 'columns')">General</button>
	
				  <button class="tablinks" onclick="openOption(event, 'logs')">Logs</button>
		  <?php
		}
		
		?>
		  
		</div>

		<form action="#" method="post">

		
		<div id="dbconn" class="tabcontent">
		  MySQL IP:<br><br>
		  <input type="text" name="db_ip" value="">
		  <br><br><br>
		  MySQL Username:<br><br>
		  <input type="text" name="db_user" value="">
		  <br><br><br>
		  MySQL Password:<br><br>
		  <input type="text" name="db_pass" value="">
		  <br><br><br>
		  MySQL Database name:<br><br>
		  <input type="text" name="db_name" value="">
		  <br><br><br>
		</div>

		<div id="columns" class="tabcontent">
		  <h3>General</h3>
		  Table name:<br><br>
		  <input type="text" name="cl_table" value="users">
		  <br><br><br>
		  Password column:<br><br>
		  <input type="text" name="cl_pass" value="password">
		  <br><br><br>
		  Crypting algorythm:<br><br>
		  <input type="radio" name="cl_alg" value="whirlpool"> Whirlpool<br>
		  
		  <input type="radio" name="cl_alg" value="md5"> MD5 <font size="1"> (Possibly vulnerable)</font><br>
		  <br><br><br>
		</div>

			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
			   
			    <br><br><br><br><br><br><br><font size=100 color=white><b><center>Loading...<br>Encryping passwords...</center></b></font>
			  </div>

			</div>

		<div id="logs" class="tabcontent">
		  <h3>Logs</h3>
		  Verifying params..<br>
		  <?php
		  if(okparams()){

			 	echo "Params ok<br>";
			 	$conn = mysqli_connect($_POST["db_ip"], $_POST["db_user"], $_POST["db_pass"], $_POST["db_name"]);
				if (!$conn) {
				    echo "<font color=red><b>Error: Unable to connect to MySQL.</b></font>" . PHP_EOL;
				    echo "<br>";
				    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
				    echo "<br>";
				    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
				    echo "<br>";
				   
				}
				else{
					echo "Success: A proper connection to MySQL was made." . PHP_EOL;
					echo "<br>";
					echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;
					echo "<br>";
					echo "Checking if the table is valid...<br>";
					echo "Executing query: <font color=yellow><b>";
					$exec = sprintf("SELECT * FROM %s WHERE 1", $_POST["cl_table"]);
					echo $exec;
					echo "</b></font><br>";
					if ($result = mysqli_query($conn, $exec)) {
					    echo "Rows found: <b>";
					    echo(mysqli_num_rows($result));
					    echo "<br></b>";
					    if(mysqli_num_rows($result) == 0){
					    	echo "<font color=red><b>Error: Table is empty</b></font>";
					    }
					    else{
					    	echo "Table is valid. Checking if the column is valid...<br>";
					    	echo "Executing query: <font color=yellow><b>";
					    	$exec2 = sprintf("SHOW COLUMNS FROM `%s` LIKE '%s'", $_POST["cl_table"], $_POST["cl_pass"]);
					    	echo $exec2;
							echo "</b></font><br>";
					    	$result2 = mysqli_query($conn, $exec2);
							$exists = (mysqli_num_rows($result2))?TRUE:FALSE;
							echo "MySQL response: ";
							if($exists){
								echo("Column is valid.<br><br><br>");
								?>
							   	<script>
							   		var modal = document.getElementById('myModal');
							   		modal.style.display = "block";
							   	</script>

							   	<?php
							   	echo("<table>
								  <tr>
								    <th>ID</th>
								    <th>Old Pass</th>
								    <th>New pass</th>
								  </tr>");
								for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
								    
								   $result3 = mysqli_query($conn, sprintf("SELECT %s FROM %s WHERE id = %d", $_POST["cl_pass"], $_POST["cl_table"], $i));
									while ($row = mysqli_fetch_array($result3)) 
									{	
										$hashed = hash($_POST["cl_alg"], $row[$_POST["cl_pass"]]);
										mysqli_query($conn, sprintf("UPDATE %s SET %s = '%s' WHERE id = %d", $_POST["cl_table"], $_POST["cl_pass"], $hashed, $i));
									    echo sprintf("<tr>
											    <td>%d</td>
											    <td>%s</td>
											    <td>%s</td>
											  </tr>", $i, $row[$_POST["cl_pass"]], $hashed);
									   
									}
									
								}
								echo "</table>";
								    ?>
								   	<script>
								   		var modal = document.getElementById('myModal');
								   		modal.style.display = "none";
								   	</script>
								   	<?php
								
							}
							
							else{
								echo "Column is invalid<br><font color=red><b>Error: The column does not exist</b></font><br>";
							}
					    }

					    /* free result set */
					    mysqli_free_result($result);
					}
					else echo "<font color=red><b>Error: Table does not exist</b></font>";

					//mysqli_close($conn);
					//echo "All the queries were sent and the connection was closed.";
				}
			}
			else echo "<font color=red><b>Error: Not all parameters specified<br></b></font>"
		?>

		</div>
		<input class="subm" type="submit" value="Start Encyption"><br>

</div>

	</form>

		<script>
			function openOption(evt, tabbbName) {
			  var i, tabcontent, tablinks;
			  tabcontent = document.getElementsByClassName("tabcontent");
			  for (i = 0; i < tabcontent.length; i++) {
			    tabcontent[i].style.display = "none";
			  }
			  tablinks = document.getElementsByClassName("tablinks");
			  for (i = 0; i < tablinks.length; i++) {
			    tablinks[i].className = tablinks[i].className.replace(" active", "");
			  }
			  document.getElementById(tabbbName).style.display = "block";
			  evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
		</script>

		

	</body>
</html>
