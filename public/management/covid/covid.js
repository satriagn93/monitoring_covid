$(document).ready(function () {
    $("tbody.order-list").on("click", ".delrow", function(event) {
        $(this).closest("tr").remove();
        counter -= 1;
    });
    $("#tb_covid").DataTable({
        ajax:true,
        columns : [
            { data: 'DT_RowIndex', 'searchable': false, class: 'text-center' },
            { data: 'covid_name', name: 'covid_name' ,class: 'text-left'  },
            { data: 'karyawan', name: 'karyawan' ,class: 'text-center'  },
            { data: 'date', name: 'date' ,class: 'text-center'  },
            { data: 'description', name: 'description' ,class: 'text-center'  },
            { data: "action", name: "action", class: "text-center" },
        ],
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tb_covid .col-md-6:eq(0)');
    
});

function Modalchecking()
{
    $("#edit-Items").modal('show');
}

function Closechecking(){
    $("#form-edit")[0];
}


function createNew() {
    $(".AddCovid").fadeIn();
    $(".myData").hide();
}

function closeCreate() {
    $(".AddCovid").hide();
    $(".myData").show();

}

function ResetForm() {
    $('#form-create')[0].reset();
}

function deletecovid(id) {
    $.ajax({
        type: "GET",
        url: "/covid/show_delete/" + id,
        success: function(data) {
            $("#modal-delete").modal('show');
            $("#delete_covid #delete-title").html("Delete (" + data.detail.covid_name + ")?");
            $("#delete_covid input[name=id]").val(data.detail.id);
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
        url: '/covid/' + $("#delete_covid input[name=id]").val() + '/delete',
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

