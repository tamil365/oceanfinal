<?php


//$inputVal = file_get_contents('php://input');AltMobileNo: null
// AsmName: "Renjith Philip"
// ExitDate: null
// JoinDate: "2015-07-09"
// MobileNo: "9388987734"
// MonthlySalesTarget: null
// QuarterlySalesTarget: null
// RsmName: "Renjith Philip"
// SalesExecCode: "Aby/Shanavas"
// SalesExecutiveName: "Aby"
// Status: null
// UpdatedBy: null
// UpdatedOn: "2019-05-03 10:26:14"
// YearlySalesTarget: null
//$results = json_decode($inputVal, true);

include '../common/SqlConnection.php';

$sql ="UPDATE mas_salesexecutivedetails SET AsmName='".$_POST["AsmName"]."', RsmName='".$_POST["RsmName"]."', MobileNo='".$_POST["MobileNo"]."' WHERE SalesExecCode ='".$_POST["SalesExecCode"]."'";
$result = $conn->query($sql);
if ($result === TRUE) {
   
     echo "Updated";
} else {
    echo "Not Updated"; //no row 
}
$conn->close();

  
?>