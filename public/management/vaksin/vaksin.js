$(document).ready(function () {
    $("tbody.order-list").on("click", ".delrow", function(event) {
        $(this).closest("tr").remove();
        counter -= 1;
    });
    $("#tb_vaksin").DataTable({
        ajax:true,
        columns : [
            { data: 'DT_RowIndex', 'searchable': false, class: 'text-center' },
            { data: 'karyawan', name: 'karyawan' ,class: 'text-center'},
            { data: 'vaksin1', name: 'vaksin1' ,class: 'text-center'},
            { data: 'vaksin2', name: 'vaksin2' ,class: 'text-center'},
            { data: 'vaksin_boosting', name: 'vaksin_boosting' ,class: 'text-center'},
            { data: "action", name: "action", class: "text-center" },
        ],
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tb_vaksin .col-md-6:eq(0)');

    var counter = 2;
    $("#add_vaksin").on("click", function() {
        var newRow = $("<tr>");
        var cols = "";
        cols +=
            // '<td>' + counter + '</td>' +
            '<td hidden> <input type="text" class="form-control " name="id[]" readonly /></td>' +
            '<td> <input type="text" class="form-control " name="fam_name[]" required/></td>' +
            '<td> <input type="text" class="form-control " name="relationship[]" required/></td>' +
            '<td> <select class="form-control select2" name="vaksin1_kel[]" required> <option value="Belum Vaksin"> Belum Vaksin</option><option value="Sudah Vaksin"> Sudah Vaksin</option>  </select></td>' +
            '<td> <select class="form-control select2" name="vaksin2_kel[]" required> <option value="Belum Vaksin"> Belum Vaksin</option><option value="Sudah Vaksin"> Sudah Vaksin</option>  </select></td>' +
            '<td> <select class="form-control select2" name="vaksin_boosting_kel[]" required> <option value="Belum Vaksin"> Belum Vaksin</option><option value="Sudah Vaksin"> Sudah Vaksin</option>  </select></td>' +
            '<td style="text-align:center" style="vertical-align: middle;"><a type="button" class="delrow btn btn-sm btn-danger"><i class="fa fa-trash color-white"></i></a></td>';

        newRow.append(cols);
        $("tbody.vaksin").append(newRow);
        $(".select2bs4").select2({
            theme: "bootstrap4",
            allowClear: true,
        });

        counter++;

        $("tbody.vaksin").on("click", ".delrow", function(event) {
            $(this).closest("tr").remove();
            counter -= 1;
        });
    });
    
});

function Modalchecking()
{
    $("#edit-Items").modal('show');
}

function Closechecking(){
    $("#form-edit")[0];
}


function createNew() {
    $(".AddVaksin").fadeIn();
    $(".myData").hide();
}

function closeCreate() {
    $(".AddVaksin").hide();
    $(".myData").show();

}

function ResetForm() {
    $('#form-create')[0].reset();
}

function deletevaksin(id) {
    $.ajax({
        type: "GET",
        url: "/vaksin/show_delete/" + id,
        success: function(data) {
            $("#modal-delete").modal('show');
            $("#delete_vaksin #delete-title").html("Delete (" + data.detail.employee_id + ")?");
            $("#delete_vaksin input[name=id]").val(data.detail.id);
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
        url: '/vaksin/' + $("#delete_vaksin input[name=id]").val() + '/delete',
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

