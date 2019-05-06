<?php
	session_start();
 
	
      
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ocean Group</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="../js/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"> 
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../js/DataTables/datatables.min.css"/>

<style>
.highlight {
  color: red;
}
.highlightsuccess{
  color: blue;
}
table.table-bordered.dataTable tbody td {
     padding-bottom: inherit;
    padding-top: 10px;
}

</style>
</head>

<body id="page-top">

<?php include '../common/navbar.php';?>

<div id="wrapper">

  <!-- Sidebar -->
  <?php include '../common/sidebar.php';?>

  <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <div >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Sales Executive</li>
            </ol>
        </div>  
        <div class="auto">
        <div class="mr-auto">
          <input class="btn btn-primary" type="button" id="addRow" name="addRow" data-toggle="modal" data-target="#addRowModal" value="Add Row">  
        </div>
        <!-- Page Content -->
        <div class="card mb-3">
        <div class="card-header">
        <div class="row" id="filter-panel">
					<div class="panel panel-default">
						  <div class="panel-body">
              <table id="masterSEtable" class="table table-bordered table-striped text-capitalize" width="100%" style="padding-bottom: 0px; padding-top: 10px;"
 ></table>		
                 
				      </div> 
				    </div>
				</div>
			</div>
    </div>
	</div>
</div>
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top"> <i
		class="fas fa-angle-up"></i>
	</a>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<!-- Add Modal-->
 <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" data-target="myModalLabel"  aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title float-right" id="myModalLabel">Add new record</h5>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  </div>
  <div class="modal-body">
    <form id="addMasterSEForm" method = "POST">
      <div class="form-inline form-row">
        <div class="form-group col-md-6">
            <label for="lblSECode">SalesExecutiveCode :</label>
            <input type="text" class="form-control" name="txtSECode" autocomplete="off" id="txtSECode" placeholder="Sales Executive Code" style="margin-left: 5px;">
        </div>
        <div class="form-group col-md-6">
            <label for="lblSEName">SalesExecutive Name :</label>
            <input type="text" class="form-control" name="txtSEname" autocomplete="off" id="txtSEname" placeholder="Sales Executive Name" style="margin-left: 5px;" >
        </div>
      </div><br>
      <div class="form-inline form-row">
        <div class="form-group col-md-6">
            <label for="lblAsm">Area Sales Manager :</label>
            <select name="sltAsm" id="sltAsm" class="form-control text-capitalize" style="width: 186px; margin-left: 5px; padding-left: 5px; padding-right: 5px;"> 
                    <option value="" selected>- Choose ASM -</option>
                   <?php $selectOption = "SalesExecutiveCode";
                      include "../common/fetchDropDown.php";
                    ?> 
                  </select>
        </div>
        <div class="form-group col-md-6">
            <label for="lblRsm">Regional S.Manager :</label>
            <select name="sltRsm" id="sltRsm" class="form-control text-capitalize" style="width: 192px;margin-left: 12px;padding-left: 5px;padding-right: 5px;"> 
                    <option value="" selected>- Choose RSM -</option>
                   <?php $selectOption = "SalesExecutiveCode";
                      include "../common/fetchDropDown.php";
                    ?> 
                  </select>
        </div>
      </div><br>
      <div class="form-inline form-row">
        <div class="form-group col-md-6">
            <label for="lblmobile">Mobile Number :</label>
            <input type="text" class="form-control" name="txtmobile" pattern="^[789]\d{9}$" autocomplete="off" id="txtmobile" placeholder="Mobile Number" style="margin-left: 33px;padding-left: 5px;padding-right: 5px;width: 187px;">
        </div>
        <div class="form-group col-md-6">
           <label for="lbljDate">Joining Date :</label>
            <div class="input-group date" id="dpjDate" data-provide="datepicker">
              <input type="text" class="form-control datepicker" name="txtjDate" autocomplete="off" id="txtjDate" placeholder="Choose Joining Date" aria-describedby="basic-addon2" style="width: 160px;margin-left: 63px;padding-left: 5px;padding-right: 5px;">
                <div class="input-group-addon text-pointer">
                  <i class=" btn btn-primary fas fa fa-calendar"></i>
                </div>
            </div>
        </div>
      </div><br>
  </div>
  <div class="modal-footer">
  <button type="submit"  class="btn btn-success" onclick="addSaleExe()" name="save">Insert</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
   
  </div>
  </form>
  </div> 
</div> 
</div> 
</div> 

  <!-- Update Modal-->
<div class="modal fade" id="updateRowModal" tabindex="-1" role="dialog" data-target="updateSEModal"  aria-labelledby="updateSEModal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title float-right" id="updateSEModal">Update record</h5>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  </div>
  <div class="modal-body">
    <form id="updateMasterSEForm" method = "POST">
      <div class="form-inline form-row">
        <div class="form-group col-md-6">
            <label for="lblSECode">SalesExecutiveCode :</label>
            <input type="text" class="form-control" name="updtxtSECode" readonly autocomplete="off" id="updtxtSECode" placeholder="Sales Executive Code" style="margin-left: 5px;">
        </div>
        <div class="form-group col-md-6">
            <label for="lblSEName">SalesExecutive Name :</label>
            <input type="text" class="form-control" name="updtxtSEname" readonly autocomplete="off" id="updtxtSEname" placeholder="Sales Executive Name" style="margin-left: 5px;" >
        </div>
      </div><br>
      <div class="form-inline form-row">
        <div class="form-group col-md-6">
            <label for="lblAsm">Area Sales Manager :</label>
            <select name="updsltAsm" id="updsltAsm" class="form-control text-capitalize" style="width: 186px; margin-left: 5px; padding-left: 5px; padding-right: 5px;"> 
                    <option value="" selected>- Choose ASM -</option>
                     <?php $selectOption = "SalesExecutiveCode";
                      include "../common/fetchDropDown.php";
                    ?> 
                  </select>
        </div>
        <div class="form-group col-md-6">
            <label for="lblRsm">Regional S.Manager :</label>
            <select name="updsltRsm" id="updsltRsm" class="form-control text-capitalize" style="width: 192px;margin-left: 12px;padding-left: 5px;padding-right: 5px;"> 
                    <option value="" selected>- Choose RSM -</option>
                   <?php $selectOption = "SalesExecutiveCode";
                      include "../common/fetchDropDown.php";
                    ?> 
                  </select>
        </div>
      </div><br>
      <div class="form-inline form-row">
        <div class="form-group col-md-6">
            <label for="lblmobile">Mobile Number :</label>
            <input type="text" class="form-control" name="updtxtmobile" autocomplete="off" id="updtxtmobile" placeholder="Mobile Number" style="margin-left: 33px;padding-left: 5px;padding-right: 5px;width: 187px;">
        </div>
        <div class="form-group col-md-6">
           <label for="lbljDate">Joining Date :</label>
            <div class="input-group date" id="upddpjDate" data-provide="datepicker">
              <input type="text" class="form-control datepicker" readonly name="updtxtjDate" autocomplete="off" id="updtxtjDate" placeholder="Choose Joining Date" aria-describedby="basic-addon2" style="width: 160px;margin-left: 63px;padding-left: 5px;padding-right: 5px;">
                <div class="input-group-addon text-pointer">
                  <i class=" btn btn-primary fas fa fa-calendar"></i>
                </div>
            </div>
        </div>
      </div><br>
  </div>
  <div class="modal-footer">
  <button type="submit"  class="btn btn-success" onclick="updateSaleExe()" name="save">Update</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
   
  </div>
  </form>
  </div> 
  </div> 
  </div> 
  </div> 
  

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../js/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script> 
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="../js/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.cellEdit.js"></script> 
<<script src="../js/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script src="../js/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="../js/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>

<script src="../js/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script src="../js/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js"></script>
<script src="../js/DataTables/Buttons-1.5.6/js/buttons.flash.min.js"></script>
<script src="../js/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script src="../js/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>

  

  <!-- Custom scripts for all pages-->
  <script src="../jsscripts/masterSaleExe.js"></script> 
  <script src="../js/sb-admin.min.js"></script>
 
</body>

</html>
