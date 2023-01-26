<?php include 'db_conn.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Insert Photo</title>
	<style> 
		body{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}


	</style>
</head>
<body>
	<form id="user_form" method="post" action="Upload.php" enctype="multipart/form-data">
		<div>
			<h2>Upload a Photo</h2>

			<input type="file" name="file">


			<button type="submit" name="submit">Upload</button>

		</div>
	</form>

	<h2> Whats in the database</h2>

	 <?php 
          $sql = "SELECT * FROM images ORDER BY id DESC";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<img src="uploads/<?=$images['img_url']?>">
             </div>
          		
    <?php } }?>






		

</body>
</html>