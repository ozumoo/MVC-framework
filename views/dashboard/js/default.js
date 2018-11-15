$(document).ready(function () {

	$.get('dashboard/xhrGetListings' , function(data) {
		console.log(data.length);
		for (var i =0 ; i <  data.length ; i++) {
			$('#listInsert').append('<div>' + data[i].text   + '<a class="del" rel="'+ data[i].id +'" href="#" > Remove </a></div>');
		}

		$('.del').live('click' , function() {
			delItem = $(this);
			var id = $(this).attr('rel');
			// alert(id);
			$.post('dashboard/xhrDeleteListing',{'id':id},function(o) {
				delItem.parent().remove();
			}, 'json');
			
			return false ; 
		});

	} , 'json');

	$('#randomInsert').submit(function() {
		var url  = $(this).attr('action');
		var data = $(this).serialize();

		$.post(url,data,function(o) {
			$('#listInsert').append('<div>' + o.text + '<a class="del" rel="'+ o.id + '" href="#" > a </a></div>');
		}, 'json');

		return false;
	});

});