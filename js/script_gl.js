// Add Record
function addRecord() {
    // get values
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    

    // Add record
    $.post("ajax/addRecord.php", {
        first_name: first_name,
        last_name: last_name,
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

       

        // clear fields from the popup
        $("#first_name").val("");
        $("#last_name").val("");
    });
};




function login() {
    // get values
    var login_name = $("#login_name").val();
    var password_name = $("#password_name").val();
   

    // Add record
    $.post("ajax/login.php", {
        login_name: login_name,
        password_name: password_name,
    }, function (data, status) {
        // close the popup
        $("#autorization_modal").modal("hide");

        // clear fields from the popup
        $("#login_name").val("");
        $("#password_name").val("");

        
    });
}


function readRecords() {
    $.get("ajax/login.php", {}, function (data, status) {
        $(".alert").html(alert);
    });
}



 