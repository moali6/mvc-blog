<h1>Main Index</h1>
<p>This is the main page that is also the default.</p>

<a href="//www.google.ca">Google</a>

<?php

	function OpenConnection() {
		$dbhost = "localhost";
 		$dbusername = "test_user";
 		$dbpassword = "12345";
 		$db = "blog-database";
 		$connection = new mysqli($dbhost, $dbusername, $dbpassword, $db) or die("Failed to connect: %s\n". $connection -> error);
	 
 		return $connection;
	}
	 
	function CloseConnection($connection)
 	{
 		$connection -> close();
 	}

  	$connection = OpenConnection();

	query_list($connection);

	query_by_pk($connection, 31);

	insert_into_table($connection);

	CloseConnection($connection);

	//Query for list
	function query_list($connection) {
		$query = "SELECT * FROM BlogsTable";
  		$sql = mysqli_query($connection, $query);

  		echo "<table>
		  		<tr>
		    		<th>Blog Id</th>
		    		<th>Title</th>
		    		<th>Blog</th>
		  		</tr>";

		while($row = mysqli_fetch_array($sql)) {
			echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>";
		}

		echo "</table>";
	}

	//Query by PK
	function query_by_pk($connection, $id, $success="Success") {
		$query = "SELECT * FROM BlogsTable WHERE BlogId=".$id;
  		$sql = mysqli_query($connection, $query);

  		if($sql) {
  			$row   = mysqli_fetch_row($sql);
  			echo "<p>".$row[1]."</p>";
  			echo "<p>".$success."</p>";
		} else {
			echo "Fail";
		}
	}

	//Insert
	function insert_into_table($connection) {
  		$query = "INSERT INTO BlogsTable (BlogTitle, Blog)
			VALUES ('Test Title 1', 'Test Blog 1'), ('Test Title 2', 'Test Blog 2'), ('Test Title 3', 'Test Blog 3')";

  		$sql = mysqli_query($connection, $query);

  		if($sql) {
  			echo "<p>Insert Data 1</p>";
		} else {
			echo "Fail";
		}
	}

?>