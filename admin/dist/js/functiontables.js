$(function () {
	$("#blog_posts").DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"info": true,
		"autoWidth": false,
	 "pageLength": 25,
	 "columnDefs": [{ "orderable": false, "targets": [2,3] }]
	});
	$("#blog_cats").DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"info": true,
		"autoWidth": false,
	 "pageLength": 25,
	 "columnDefs": [
	{ "orderable": false, "targets": [1,2] }]
	});
	$("#recetas").DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"info": true,
		"autoWidth": false,
	 "pageLength": 25,
	 "columnDefs": [
	{ "orderable": false, "targets": [2,3] }]
	});
	$("#galeria").DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"info": true,
		"autoWidth": false,
	 "pageLength": 25,
	 "columnDefs": [
	{ "orderable": false, "targets": [1,2,3] }]
	});
	$("#categoria").DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"info": true,
		"autoWidth": false,
	 "pageLength": 25,
	 "columnDefs": [
	{ "orderable": false, "targets": [2,3] }]
	});


	var checkAll = $('input[type="checkbox"].all');
	 var checkboxes = $('input[type="checkbox"].minimal');

	$('input[type="checkbox"].minimal').iCheck({
		 checkboxClass: 'icheckbox_minimal-blue'
	 });

	 checkAll.on('ifChecked ifUnchecked', function(event) {
			 if (event.type == 'ifChecked') {
					 checkboxes.iCheck('check');
					$("#delBtn").removeClass('disabled');
			 } else {
					 checkboxes.iCheck('uncheck');
			 }
	 });

	 checkboxes.on('ifChanged', function(event){
			 if(checkboxes.filter(':checked').length == checkboxes.length  ) {
					 checkAll.prop('checked', 'checked');
			 } else if  (checkboxes.filter(':checked').length > 0){
				 $("#delBtn").removeClass('disabled');
			 } else {
					 checkAll.removeProp('checked');
					$("#delBtn").addClass('disabled');
			 }
			 checkAll.iCheck('update');
	 });




});
