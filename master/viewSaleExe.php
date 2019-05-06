<?php

// $inputVal = file_get_contents('php://input');
// $results = json_decode($inputVal, true);
//  echo $results; 
include '../common/SqlConnection.php';
$sql = "SELECT * from oceangroup.mas_salesexecutivedetails where SalesExecCode= '".$_POST['SalesExecCode']."'";
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
    array_push( $records, "Code does'nt match" );
} 

$conn->close();
  

?>