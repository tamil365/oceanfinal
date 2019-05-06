$( document ).ready(function() {
    var userType= $('#txtuserType').val();
    if(userType =="datauser"){
        $('#reportMenu').hide();
        $('#reportDropdown').prop('disabled', true);
        $('#mapMenu').show();
        $('#mapDropdown').prop('disabled', false);
        $('#masterMenu').show();
        $('#masterDropdown').prop('disabled', false);
    }
    else if(userType =="acctuser"){
        $('#reportMenu').show();
        $('#reportDropdown').prop('disabled', false);
        $('#mapMenu').show();
        $('#mapDropdown').prop('disabled', false);
        $('#masterMenu').show();
        $('#masterDropdown').prop('disabled', false);
     }
    else if(userType =="cxouser"){
        $('#reportMenu').show();
        $('#reportDropdown').prop('disabled', false);
        $('#mapMenu').hide();
        $('#mapDropdown').prop('disabled', true);
        $('#masterMenu').hide();
        $('#masterDropdown').prop('disabled', true);
    }

    $('#upddpjDate').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true,
        Default: true,
        pickDate: true,
      //  startDate: new Date(((new Date).getFullYear()- 1),3, 1),
        endDate : '+0d',
       
    });
    
    $('#dpjDate').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true,
        Default: true,
        pickDate: true,
      //  startDate: new Date(((new Date).getFullYear()- 1),3, 1),
        endDate : '+0d',
       
    });


   var table;
        $.ajax({
            url:"fetchSaleExeMaster.php", //the page containing php script to check
            type: "post", //request type,
            success: function(data) { 
               
                 if (!data.includes("No data")){
                    var response= $.parseJSON(data);
                    console.log(response);
                    var SEreport =[];
                    for(var i=0; i< response.length; i++){
                        var report = [];
                        var seCode = response[i].SalesExecCode;
                        var name = response[i].SalesExecutiveName;
                        var asm = response[i].AsmName;
                        var rsm = response[i].RsmName;
                        var mobile=  response[i].MobileNo;
                        if((response[i].JoinDate)!= null){
                        var jdate= (response[i].JoinDate).split("-").reverse().join("-");
                            }
                        else{
                            var jdate= response[i].JoinDate;
                        }
                        var status= response[i].Status;
                        report = [seCode,name,asm,rsm,mobile,jdate,status,i]; 
                        SEreport.push(report);
                    } 
                    $('#masterSEtable').empty();
                     table = $('#masterSEtable').DataTable( {
                               data: SEreport,
                               pageLength: 50,
                               searching: true,
                               bDestroy:true, 
                               ordering:false,  
                               responsive:true,
                               processing: true,
                               dom: 'Blfrtip',
                               buttons: ['csv', 'excel'], 
                               columns: [
                                          { title: "SaleExecutive Code"},
                                          { title: "Executive Name"},
                                          { title: "ASM" }, 
                                          { title: "RSM "},
                                          { title: "Mobile"},
                                          { title: "Join Date"},
                                          { title: "Status"},
                                          { title: "Action",
                                            "render": function (row, data, type, meta) {
                                            var result="";
                                            //  result='<input class="btn btn-sm btn-success" type="button" onclick= "viewSaleExe("'+type[0]+'" \'' + type[0] + '\')" id="viewRow '+type[7]+'" name="viewRow '+type[7]+'" data-toggle="modal" data-target="#updateRowModal" value="View"> '
                                            result = '<input class="btn btn-sm btn-success moveEvent" type="button" onclick= "viewSaleExe(this)" id="btnView'+type[7]+'" name="btnView'+type[7]+'" value="View">'; //update Sale Executive
                                            return result;
                                            }
                                         },
                                        
                                         ],
                            
                    });
                                   
                }
                else{
                     alert("No Records");
                    }
            }
        });
      

});
// view the sales executive detail in modal popup to edit
function viewSaleExe(param){
   var table = $(param).closest("table").DataTable().table();
   row = table.row($(param).parents('tr'));
   $('#masterSEtable').find('.highlight').removeClass('highlight');
   $('#masterSEtable').find('.highlightsuccess').removeClass('highlightsuccess');
   //row.nodes().to$().addClass('highlight');
   var code= row.data()[0];
     $.ajax ({
                url: "viewSaleExe.php",
                type: 'POST',
                data: {SalesExecCode:code},
                success: function(result) { 
                    if (!result.includes("Code does'nt match")){
                       var data =$.parseJSON(result);
                       console.log(data);
                       $('#updtxtSECode').val(data[0].SalesExecCode);
                       $('#updtxtSEname').val(data[0].SalesExecutiveName);
                       $("#updsltAsm option:selected").text(data[0].AsmName);
                       $("#updsltRsm option:selected").text(data[0].AsmName);
                       $('#updtxtmobile').val(data[0].MobileNo);
                       $('#updtxtjDate').val((data[0].JoinDate).split("-").reverse().join("-"));
                       $('#updateRowModal').modal('show');
                    }else{
                        alert("No such Sales Executive");
                    }
                }
                
            });
 }

 //update the sales executive detail.
 function updateSaleExe(){
   var seCode=$('#updtxtSECode').val(); 
   var asm = $("#updsltAsm option:selected").text();
   var rsm =$("#updsltRsm option:selected").text();
   var mobile =$('#updtxtmobile').val();
   $.ajax ({
                url: "updateSaleExe.php",
                type: 'POST',
                data: {SalesExecCode:seCode, AsmName:asm, RsmName:rsm, MobileNo:mobile},
                success: function(result) { 
                    if (!result.includes("Not Updated")){
                      console.log(result);
                     
                     }else{
                        alert("Sales Executive's details Not updated");
                    }
                }
                
            });
           
}
$("#updateRowModal").on("hidden.bs.modal", function () {
    row.nodes().to$().addClass('highlight');
 });

 // add new sales executive
  function addSaleExe(){
    var seCode=$('#txtSECode').val();
    var seName=$('#txtSEname').val(); 
    var asm = $("#sltAsm option:selected").text();
    var rsm =$("#sltRsm option:selected").text();
    var mobile =$('#txtmobile').val();
    var jdate = ($('#txtjDate').val()).split("-").reverse().join("-");
    $.ajax ({
                 url: "insertSaleExe.php",
                 type: 'POST',
                 data: JSON.stringify({SalesExecCode:seCode, SalesExecutiveName:seName, AsmName:asm, RsmName:rsm, MobileNo:mobile,JoinDate:jdate}),
                 success: function(result) { 
                     if (!result.includes("Not Updated")){
                        alert(result);
                     }else{
                         alert("Sales Executive's details Not updated");
                     }
                 }
                 
             });
  }