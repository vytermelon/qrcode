<?php
if (isset($_POST['update'])) {
        $host = "localhost";
        $dbUsername = "id19785843_vytermelon";
        $dbPassword = "mH-b*)WLR\%5x<N|";
        $dbName = "id19785843_qrcode";
        $u_name = $_POST['u_name'];
        $url = $_POST['URL'];
        $date = date("Y.m.d");
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if ($conn->connect_error) {
                echo "<script>alert(\"Could not connect to the database.\")</script>";
            }
            else {

                //insert
                $Insert = "INSERT INTO URL_TABLE(URL, NAME, Time, Pointer) values(?, ?, ?, ?)";
                $stmt = $conn->prepare($Insert);
                $pointer = 0;
                $stmt->bind_param("sssi", $url, $u_name, $date, $pointer);

                if (!$stmt->execute()) {
                //    echo "<script>alert(\"New record inserted sucessfully.\")</script>";
                    echo $stmt->error;
                }

            
            $stmt->close();
  //close connection
            $conn->close();
            header("Location: https://yfkfyi.000webhostapp.com/queue/");
            exit();  
           }
}
?>