<?php
  
   include("file1.php");
   
  /* $first_name  = $_REQUEST['first_name'];
   $last_name =  $_REQUEST['last_name'];
   $address = $_REQUEST['address'];
   
   	 ////mysql datbase connection
	$servername = "localhost";
	$username = "root";
	$password = "secret";
	$db = "test";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	///Insertion
	$sql = "INSERT INTO `users` (`first_name`, `last_name`, `address`)
	     VALUES ('".$first_name."', '".$last_name."', '".$address."');";
		 
	$result = $conn->query($sql);
	
	
	//retrive data
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		$i=-1;
		while($row = $result->fetch_assoc()) {
			$i++;
			$arr[$i]['first_name'] = $row["first_name"];
			$arr[$i]['last_name'] = $row["last_name"];
			$arr[$i]['address'] = $row["address"];
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	///////////////////////////////	
    debug($arr);*/
	
	$cmd = $_REQUEST['cmd'];
	switch($cmd){
		case "add":
		       $first_name  = $_REQUEST['first_name'];
			   $last_name =  $_REQUEST['last_name'];
			   $address = $_REQUEST['address'];
			   
				 ////mysql datbase connection
				$servername = "localhost";
				$username = "root";
				$password = "secret";
				$db = "test";
				
				// Create connection
				$conn = new mysqli($servername, $username, $password,$db);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				
				if(empty($_REQUEST['id']))
				{
				///Insertion
				$sql = "INSERT INTO `users` (`first_name`, `last_name`, `address`)
					 VALUES ('".$first_name."', '".$last_name."', '".$address."');";
				}
				else
				{
					$sql = "update `users` set `first_name`='".$first_name."', 
							`last_name`='".$last_name."', 
							`address`='".$address."' WHERE id='".$_REQUEST['id']."'";
				}
					 
				$result = $conn->query($sql);
			   include("list.php");	
		       break;
			   
		case "delete": 	
		      ////mysql datbase connection
				$servername = "localhost";
				$username = "root";
				$password = "secret";
				$db = "test";
				
				// Create connection
				$conn = new mysqli($servername, $username, $password,$db);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
			   
			   //retrive data
				$sql = "Delete FROM users where id='".$_REQUEST['id']."'";
				$result = $conn->query($sql);				
				$conn->close();
				///////////////////////////////  
	     include("list.php"); 
		    break;   
			
	     case "edit":
		       ////mysql datbase connection
	$servername = "localhost";
	$username = "root";
	$password = "secret";
	$db = "test";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
   
   //retrive data
	$sql = "SELECT * FROM users where id='".$_REQUEST['id']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		$i=-1;
		while($row = $result->fetch_assoc()) {
			$i++;
			$arr[$i]['id'] = $row["id"];
			$arr[$i]['first_name'] = $row["first_name"];
			$arr[$i]['last_name'] = $row["last_name"];
			$arr[$i]['address'] = $row["address"];
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	///////////////////////////////   
		     include("form.php");
		    break;		
		default:
		   include("list.php");
		
	}
?>