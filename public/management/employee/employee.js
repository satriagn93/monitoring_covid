

function createNew() {
    $(".AddEmployee").fadeIn();
    $(".myData").hide();
}

function closeCreate() {
    $(".AddEmployee").hide();
    $(".myData").show();

}

function ResetForm() {
    $('#form-create')[0].reset();
}

function deleteemployee(id) {
    $.ajax({
        type: "GET",
        url: "/employee/show_delete/" + id,
        success: function(data) {
            $("#modal-delete").modal('show');
            $("#delete_employee #delete-title").html("Delete (" + data.detail.name + ")?");
            $("#delete_employee input[name=id]").val(data.detail.id);
        }
    });
}

$("#btn-delete").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        url: '/employee/' + $("#delete_employee input[name=id]").val() + '/delete',
        dataType: 'json',
        beforeSend: function(){
            $('#btn-delete').addClass('btn-progress');
        },

        success: function(response) {
            if (response.success) {
                $('#btn-delete').removeClass('btn-progress');
                $("#modal-delete").modal('hide');
                setTimeout(function() {
                    location.reload();
                }, 1000);
                toastr.success(response.success);
            }
        }
    });
});

