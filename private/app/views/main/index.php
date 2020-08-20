<h1>Welcome to my blogs!</h1>

<table style="width:100%">
  <tr>
  	<th>Blog No.</th>
    <th>Blog</th>
    <th>Date Published</th>
  </tr>

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

  	$query = "SELECT * FROM BlogsTable";

  	$sql = mysqli_query($connection, $query);

	while($row = mysqli_fetch_array($sql)) {
		echo "<tr><td>" . $row[0] . "</td><td><button onclick=\"readBlog(".$row[0].")\">" . $row[1] . "</button></td><td>" . $row[3] . "</td></tr>";
	}

	CloseConnection($connection);

  ?>

</table>

<div>
	<button onclick="createBlog()">Create Blog</button> 
</div>

<div id="read_div" style="display:none">
	<p id="blog_para"></p>
</div>

<div hidden="true" id="create_div">

	<form name="new_blog" action="/mvc-blog/create.php" method="post">
		<p>Title:</p>
		<input type="text" name="blog_title">
		<p>Blog:</p>
		<textarea id="blog_content" name="name_blog_content" rows="10" cols="50">
		</textarea>
		<p></p>
		<input type="submit" value="Submit">
	</form> 

</div>

<?php

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		function OpenConnection_2() {
			$dbhost = "localhost";
	 		$dbusername = "test_user";
	 		$dbpassword = "12345";
	 		$db = "blog-database";
	 		$connection = new mysqli($dbhost, $dbusername, $dbpassword, $db) or die("Failed to connect: %s\n". $connection -> error);
	 
	 		return $connection;
	 	}
	 
		function CloseConnection_2($connection)
	 	{
	 		$connection -> close();
	 	}

	 	$sql = "INSERT INTO BlogsTable (BlogTitle, Blog)
				VALUES ('".$_POST['blog_title']."', '".$_POST['name_blog_content']."')";

		$connection = OpenConnection_2();

		if ($connection->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $connection->error;
		}

		CloseConnection_2($connection);
	}

?>