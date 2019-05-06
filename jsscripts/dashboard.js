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
});