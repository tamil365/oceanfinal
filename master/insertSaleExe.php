<?php
//AltMobileNo: null
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

$jsonInputdata = file_get_contents('php://input');
$inputdata = json_decode($jsonInputdata, true);

include '../common/SqlConnection.php';

$sql ="INSERT INTO  mas_salesexecutivedetails (SalesExecCode,SalesExecutiveName,AsmName,RsmName,MobileNo,JoinDate) VALUES ('".$inputdata["SalesExecCode"]."','".$inputdata["SalesExecutiveName"]."','".$inputdata["AsmName"]."','".$inputdata["RsmName"]."','".$inputdata["MobileNo"]."','".$inputdata["JoinDate"]."')";
$result = $conn->query($sql);
if ($result === TRUE) {
    $seCode= .$inputdata["SalesExecCode"];
    echo "$seCode";
} else {
    echo "Not Inserted"; //no row 
}
$conn->close();

  
?>