<?php
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
	$sql = "SELECT * FROM users";
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
?>
<a href="form.php">Add Data/</a>
<table border="1" width="50%">
  <tr>
     <td>First Name</td>
     <td>Last Name</td>
     <td>Address</td>
     <td>Action</td>
  </tr>
<?php
  for($i=0;$i<count($arr);$i++)
  {
?>
   <tr>
       <td><?=$arr[$i]['first_name']?></td>
       <td><?=$arr[$i]['last_name']?></td>
       <td><?=$arr[$i]['last_name']?></td>
       <td><a href="test.php?cmd=edit&id=<?=$arr[$i]['id']?>">Edit</a>|<a href="test.php?cmd=delete&id=<?=$arr[$i]['id']?>">Delete</a></td>
   </tr>
<?php
  }
?>
</table>