<!DOCTYPE html>
<script type="text/javascript">
    var create_blog = false;
    var read_blog = false;

    function createBlog() {
        if (create_blog == true) {
            var create_div = document.getElementById("create_div");
            create_div.style.display = "none";
            create_blog = false;
        } else {
            var create_div = document.getElementById("create_div");
            create_div.style.display = "block";
            create_blog = true;
        }
    }

    function readBlog(blog_id) {
        <?php
            $dbhost = "localhost";
            $dbusername = "test_user";
            $dbpassword = "12345";
            $db = "blog-database";
            $connection = new mysqli($dbhost, $dbusername, $dbpassword, $db) or die("Failed to connect: %s\n". $connection -> error);

            $query = "SELECT * FROM BlogsTable";

            $rows = array();
            
            $sql = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($sql)) {
                $rows[] = $row[2];
            }

            echo("var result = " . json_encode($rows) . ";" );
        ?>

        if (read_blog == false) {
            var read_div = document.getElementById("read_div");
            read_div.style.display = "block";
            var para = document.getElementById("blog_para");
            para.innerHTML = result[blog_id-1];    
            read_blog = true;
        } else {
            var read_div = document.getElementById("read_div");
            read_div.style.display = "none";
            read_blog = false;
        }
    }
</script>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo($title); ?></title>
        <link rel="stylesheet" href="/mvc-blog/public/css/app.css">
    </head>
    <body>
    	<table style="width:100%">
  			<tr>
    			<th><a href="/mvc-blog/main/index.php">Home</a></th>
    			<th><a href="/mvc-blog/list/index.php">List All</a></th>
    			<th><a href="#">About</a></th>
 			</tr>
		</table>
