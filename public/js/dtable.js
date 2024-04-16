$(document).ready( function () {
    $('.table_dtable').DataTable({
		"aLengthMenu": [[5,10,25, 50, 75, -1], [5,10,25, 50, 75, "Semua"]],
		"iDisplayLength": 5,
		// "ordering": false,		
        searching: true,		
		responsive: true,
        lengthChange: false,
        info: false,
        border: true,
        scrollY: '100%',         
        "language": {
            "emptyTable": "Tidak ada data"
        },
	});
} );