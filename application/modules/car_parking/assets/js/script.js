//all js 
function editcarParking(id){
	'use strict';
	   var geturl=$("#url_"+id).val();
	   var myurl =geturl+'/'+id;
	    var dataString = "id="+id;
		 $.ajax({
		 type: "GET",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('.editinfo').html(data);
			 $('#edit').modal('show');
			  $('.datepicker').bootstrapMaterialDatePicker({
				format: 'YYYY-MM-DD',
				shortTime: false,
				date: true,
				time: false,
				monthPicker: false,
				year: false,
				switchOnClick: true,
			});
			//Edit book parking
			$(".basic-single").select2();
			$('.datetimepickers').bootstrapMaterialDatePicker({
				format: 'YYYY-MM-DD HH:mm',
				startDate: new Date(),
				shortTime: false,
				date: true,
				time: true,
				monthPicker: false,
				year: false,
				switchOnClick: true,
			}); 
		 } 
	});
	}