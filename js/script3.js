function addRecordDate() {
    // get values
    var date_record = $("#date_record").val();
    var time_record = $("#time_record").val();
   

    // Add record
    $.post("http://localhost/kyrsovaya/ajax/addRecord_doctor.php", {
        date_record: date_record,
        time_record: time_record,
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#date_record").val("");
        $("#time_record").val("");
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecords_doctor.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete record?");
    if (conf == true) {
        $.post("ajax/deleteUser_doctor.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails_doctor.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_date").val(user.date_record);
            $("#update_time").val(user.time_record);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}



$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});


















/*function GetUserDetails_visitor(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails_visitor.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_date").val(user.date_record);
            $("#update_date").val(user.date_record);
            $("#update_date").val(user.date_record);
            $("#update_date").val(user.date_record);
            $("#update_time").val(user.time_record);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}*/



$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});



