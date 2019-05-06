<?php

 
include '../common/SqlConnection.php';
$sql = "SELECT * from oceangroup.mas_salesexecutivedetails";
$result = $conn->query($sql);
$records = [];
if ($result->num_rows > 0) {
     while($row = mysqli_fetch_assoc($result)){
        array_push( $records, $row );
        }
        echo json_encode($records);
    
  } 
else {
    // echo "nothing"; //no row 
    array_push( $records, 'No data' );
} 

$conn->close();

?>