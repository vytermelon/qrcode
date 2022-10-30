<?php
	$host = "localhost";
	$dbUsername = "id19785843_vytermelon";
	$dbPassword = "mH-b*)WLR\%5x<N|";
	$dbName = "id19785843_qrcode";
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

	    if ($conn->connect_error) {
	        echo "<script>alert(\"Could not connect to the database.\")</script>";
	    }
	    else {

	        //select url
		$sql = "SELECT ID,URL FROM URL_TABLE where Pointer=1;";
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		  $URL = $row["URL"];
		  $ID=$row["ID"] + 1;
		}
		  
		} else {
		  echo "0 results";
		}
		//Scanned, next iteration
		$sql = "SELECT max(ID) as maxi FROM URL_TABLE;";
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		  $max = $row["maxi"];
		}
		}
		
		if ($max >= $ID){
		$sql = "UPDATE URL_TABLE SET Pointer=1 WHERE ID = $ID;";

    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error updating record: " . $conn->error;
    }
	$sql = "UPDATE URL_TABLE SET Pointer=0 WHERE ID = $ID-1;";

    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
		}
	else{
	  $sql = "UPDATE URL_TABLE SET Pointer=1 WHERE ID = 1;";

    if ($conn->query($sql) === TRUE) {
        
    } else {
      echo "Error updating record: " . $conn->error;
    }
    		$sql = "UPDATE URL_TABLE SET Pointer=0 WHERE ID = $ID -1;";

    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error updating record: " . $conn->error;
    }
	}
		
		
		
		$conn->close();

	    header("Location: $URL ");
	    exit();  
	   }

?>