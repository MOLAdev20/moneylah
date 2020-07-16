$(document).ready(function(){

	$("#simpan").click(function() {
		// Ajax Action
		var data = [ $("[ name='pemasukan' ]").val() , $("[ name='nominal' ]").val(), $("[ name='keterangan' ]").val() ];

		$.ajax({
			url: "<?= base_url('Home/create') ?>",
			type: "POST",
			data: { pemasukan:data[0], nominal:data[1], keterangan:data[2] },
			dataType: "json",
			success: function(msg){
				alert(msg);
			}
		});
	});

	$(".alert").delay(1500).slideUp(500);

});