$(function () {
    $('.js-basic-example').DataTable();

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
            "decimal":        "",
            "emptyTable":     "Không có dữ liệu hiển thị",
            "info":           "Hiển thị từ _START_ đến _END_ trong _TOTAL_ dữ liệu",
            "infoEmpty":      "Không có dữ liệu hiển thị",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Hiển thị _MENU_ dữ liệu",
            "loadingRecords": "Đang tải...",
            "processing":     "Đang thực hiện...",
            "search":         "Tìm kiếm:",
            "zeroRecords":    "Không tìm thấy dữ liệu",
            "paginate": {
                "first":      "Trang đầu",
                "last":       "Trang cuối",
                "next":       "Trang tiếp",
                "previous":   "Trang trước"
            },
            "aria": {
                "sortAscending":  ": Tăng dần",
                "sortDescending": ": Giảm dần"
            }
        }
    });
});