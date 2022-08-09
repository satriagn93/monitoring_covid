$(document).ready(function () {
    $("#tb_member").DataTable({
        ajax:true,
        columns : [
            { data: 'DT_RowIndex', 'searchable': false, class: 'text-center' },
            { data: 'name', name: 'name' ,class: 'text-left'  },
            { data: 'gender', name: 'gender' ,class: 'text-center'  },
            { data: "action", name: "action", class: "text-center" },
        ],
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tb_member .col-md-6:eq(0)');
});
