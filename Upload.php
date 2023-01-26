<?php

include'db_conn.php';

if (isset($_POST['submit']) && isset($_FILES['file'])){

	echo "<pre>";
	print_r($_FILES['file']);
	echo"<pre>";

	$img_name = $_FILES['file']['name'];
    $img_size = $_FILES['file']['size'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    		if ($error === 0){
    			if ($img_size > 125000) {

    				$em = "Sorry! File is too large.";

				header("Location: PictureForm.php?error = $em");
    			}
    			else{$img_ex = pathinfo($img_name, PATHINFO_EXTENSION); 
    				$img_ex_lc = strtolower($img_ex);
    					$allowed_exs = array("jpg", "jpeg", "png");
    				if (in_array($img_ex_lc ,$allowed_exs)){

    					$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
						$img_upload_path = 'uploads/'.$new_img_name;
						move_uploaded_file($tmp_name, $img_upload_path);

						//insert into database
						$sql = "INSERT INTO images(img_url) 
				        VALUES('$new_img_name')";
				       mysqli_query($conn, $sql);


    				}else{$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");}

    			

    			}
			}
			else{header("Location: PictureForm.php");}
			header("Location: PictureForm.php?=path = $tmp_name");
		}

?>