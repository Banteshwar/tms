$(function(){
	var site_url = "http://localhost/tms";

	$(document).on('keypress',".numericOnly", function (e) {
	    if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
	});

	var strHtml = '<div class="row ">'+
		'<div class="col-lg-3 col-md-12 col-sm-12">'+
			'<select name="deduction_type[]" class="form-control m-input m-input--square" id="exampleSelect1">'+
				'<option value="Additional Escrow">Additional Escrow</option>'+
				'<option value="Balance Owned">Balance Owned</option>'+
				'<option value="Cash Advance">Cash Advance</option>'+
				'<option value="Credit Card Charges">Credit Card Charges</option>'+
				'<option value="Escrow account">Escrow account</option>'+
				'<option value="Fuel Charges">Fuel Charges</option>'+
			'</select>'+
		'</div>'+
		'<div class="col-lg-3 col-md-12 col-sm-12">'+
			'<input name="deduction_amount[]" class="form-control m-input" id="vin_no" aria-describedby="emailHelp" placeholder="Amount" type="text">'+
		'</div>'+
		'<div class="col-lg-3 col-md-12 col-sm-12">'+
			'<input name="deduction_comment[]" class="form-control m-input" id="vin_no" aria-describedby="emailHelp" placeholder="Comment" type="text">'+
		'</div>	'+
		'<div class="col-lg-3 col-md-12 col-sm-12">'+
			'<a href="" class="remove"><i class="m-nav__link-icon fa fa-minus"></i></a>'+ 
		'</div>'+	
	'</div>';

	$('.add').click(function(event) {
		event.preventDefault();
		$('.deduction_type').append(strHtml);
	});

	$(document).on('click', '.remove', function(event) {
		event.preventDefault();
		$(this).closest('.row').remove();
	});



	var varContainerChassis = '<div class="row container_chassis">'+
				'<div class="col-lg-2">'+
					'<input class="form-control m-input" id="container" placeholder="Container" name="container_chassis[container][]" type="text">'+
				'</div>'+
				'<div class="col-lg-1">'+
					'<select class="form-control m-input m-input--square" name="container_chassis[size][]"><option value="20">20</option><option value="40">40</option></select>'+
				'</div>'+						
				'<div class="col-lg-1">'+
					'<select class="form-control m-input m-input--square" name="container_chassis[standard_dry][]"><option value="Standard(Dry)">Standard(Dry)</option><option value="USA">USA</option></select>'+												
				'</div>'+
				'<div class="col-lg-1">'+
					'<input class="form-control m-input" id="le" placeholder="L/E" name="container_chassis[le][]" type="text">'+							
				'</div>'+
				'<div class="col-lg-2">'+
					'<input class="form-control m-input" id="chassis" placeholder="Chassis" name="container_chassis[chassis][]" type="text">'+
				'</div>'+
				'<div class="col-lg-2">'+
					'<input class="form-control m-input" id="chassis_vendor" placeholder="Chassis Vendor" name="container_chassis[chassis_vendor][]" type="text">'+
				'</div>'+
				'<div class="col-lg-2">'+
					'<input class="form-control m-input" id="company_chassis" placeholder="Company Chassis" name="container_chassis[company_chassis][]" type="text">'+
				'</div>'+
				'<div class="col-lg-1">'+
					'<a href="" class="remove_chassis"><i class="m-nav__link-icon fa fa-minus"></i></a>'+
				'</div>'+
			'</div>';

	$('.add_chassis').click(function(event) {
		event.preventDefault();
		$('#container_chassis').append(varContainerChassis);
	});

	$(document).on('click', '.remove_chassis', function(event) {
		event.preventDefault();
		$(this).closest('.row.container_chassis').remove();
	});


	$(document).on('click', '.truck_model', function(event) {
		var truckId = $(this).data('truckid');
		var status = $(this).data('status');
		var txt = $(this).text();
		if(txt.trim() == "Active") {
			txt = 'Deactive';
		} else {
			txt = 'Active';
		}

		$('#truck_id').val(truckId);
		$('#truck_status').val(status);
		$('.status_truck').text(txt);
		$("#m_modal").modal('show');
	});

	$(document).on('click', '.driver_model', function(event) {
		var driverId = $(this).data('driverid');
		var status = $(this).data('status');
		var txt = $(this).text();
		if(txt.trim() == "Active") {
			txt = 'Deactive';
		} else {
			txt = 'Active';
		}

		$('#driver_id').val(driverId);
		$('#driver_status').val(status);
		$('.status_driver').text(txt);
		$("#m_modal").modal('show');
	});

	$(document).on('click', '.customer_model', function(event) {
		var customerId = $(this).data('customerid');
		var status = $(this).data('status');
		var txt = $(this).text();
		if(txt.trim() == "Active") {
			txt = 'Deactive';
		} else {
			txt = 'Active';
		}

		$('#customer_id').val(customerId);
		$('#customer_status').val(status);
		$('.status_customer').text(txt);
		$("#m_modal").modal('show');
	});


	$("#type input").change(function(event) {
		if(($(this).val() == "Other") || $(this).val() == "Bobtail"){
			$("input[name='type_other']").show();
			$("input#otherorbobtaildata").show();
		} else {
			$("input[name='type_other']").hide();
			$("input#otherorbobtaildata").hide();
		}	
	});

	$(document).on('click', '.cust_bill_adrs', function(event) {
		if ($("input.cust_bill_adrs").is(':checked')) {
			var strCustId = $("input[name='customer_id']").val();
			var token = $("input[name='_token']").val();
			var dataString = '_token='+token+'&strCustId='+strCustId;
			if(strCustId != '') {
				$.ajax({
		           type:'POST',
		           url: site_url+"/customer/get_address_detail",
		           data:dataString,
		           success:function(result){
		              var objCustomDetails = $.parseJSON(result);
		              $("input[name='address1']").val(objCustomDetails.address1);
		              $("input[name='address2']").val(objCustomDetails.address2);
		              $("input[name='city']").val(objCustomDetails.city);
		              $("input[name='state']").val(objCustomDetails.state);
		              $("input[name='zip']").val(objCustomDetails.zip);
		           }
		        });
			}
		} else {
			$("input[name='address1']").val('');
	        $("input[name='address2']").val('');
	        $("input[name='city']").val('');
	        $("input[name='state']").val('');
	        $("input[name='zip']").val('');
		}
	});
	

	$(document).on('click', '.cust_bill_contact', function(event) {
		if ($("input.cust_bill_contact").is(':checked')) {
			var strCustId = $("input[name='customer_id']").val();
			var token = $("input[name='_token']").val();
			var dataString = '_token='+token+'&strCustId='+strCustId;
			if(strCustId != '') {
				$.ajax({
		           type:'POST',
		           url: site_url+"/customer/get_address_detail",
		           data:dataString,
		           success:function(result){
		              var objCustomDetails = $.parseJSON(result);
		              console.log(objCustomDetails);
		              $("input[name='same_contact_no']").val(objCustomDetails.contact_number);
		              $("input[name='same_fax']").val(objCustomDetails.fax);
		              $("input[name='same_email']").val(objCustomDetails.email);
		              $("textarea[name='other_contact']").text(objCustomDetails.other_contact);
		              $("textarea[name='notes']").text(objCustomDetails.notes);
		           }
		        });
			}
		} else {
			$("input[name='same_contact_no']").val('');
            $("input[name='same_fax']").val('');
            $("input[name='same_email']").val('');
            $("textarea[name='other_contact']").val('');
            $("textarea[name='notes']").val('');
		}
	});

	$("#rates,#units").change(function(){
       total = $("#units").val() * $("#rates").val();
       $("#amounts").val(total);
    });

    $(document).on("change" ,".deliver_point", function(){
    	var closest = $(this).closest('.trip_location');
    	var strId = parseInt($(this).val());
		var arrWorkYardId = [4,5,6,7,8,9,10,11,14,15,16,17,18,19];
    	if($.inArray(strId, arrWorkYardId) != -1) {
    		strId = 4;
    	} 
    	var token = $("input[name='_token']").val();
		var dataString = '_token='+token+'&strId='+strId;
		$.ajax({
           type: 'POST',
           url: site_url+"/order/get_deliver_location",
           data: dataString,
           success: function(result){
            var strOPtion = '';
            strOPtion += '<option value=""> Select One </option>';
           	$.each($.parseJSON(result), function(index, val) {
              	  strOPtion += '<option value="'+index+'">'+ val + '</option>';
           	});
              closest.find('.trip_loct').html(strOPtion);
           }
        });
    });

    var strTripDetlHtml = '<div class="row trip_pay_count">'+
                '<div class="col-4">'+
                    '<select class="trip_pay_type" id="trip_pay_type" style="width: 100%" name="payment_details[pay_type][]">'+
                        '<option value="Additional Dray">Additional Dray</option>'+
                        '<option value="Attempted Pickup">Attempted Pickup</option>'+
                        '<option value="Bobtail">Bobtail</option>'+
                        '<option value="Chassis Reposition">Chassis Reposition</option>'+
                        '<option value="Chassis Split">Chassis Split</option>'+
                        '<option value="Detention">Detention</option>'+
                        '<option value="Dry Run">Dry Run</option>'+
                        '<option value="Fuel Surcharge">Fuel Surcharge</option>'+
                        '<option value="Hauling Refrigerated Cargo">Hauling Refrigerated Cargo</option>'+
                        '<option value="Hazardous Materials">Hazardous Materials</option>'+
                        '<option value="Heavy">Heavy</option>'+
                        '<option value="Local Move">Local Move</option>'+
                        '<option value="Miscellaneous">Miscellaneous</option>'+
                        '<option value="Other">Other</option>'+
                        '<option value="Scale">Scale</option>'+
                        '<option value="Stop Off">Stop Off</option>'+
                        '<option value="Toll">Toll</option>'+
                        '<option value="Triaxle">Triaxle</option><option value="Trip Pay">Trip Pay</option>'+
                    '</select>'+
                '</div>'+
                '<div class="col-2">'+                                    
                    '<input class="form-control numericOnly" id="trip_units" placeholder="Units" name="payment_details[units][]" type="text">'+
                '</div>'+
                '<div class="col-2">'+
                    '<input class="form-control numericOnly" id="trip_rates" placeholder="Rates" name="payment_details[rates][]" type="text">'+
                '</div>'+

                '<div class="col-3">'+
                    '<input class="form-control numericOnly" id="trip_amount" placeholder="Amounts" name="payment_details[amount][]" type="text">'+
                '</div>'+
                                
                '<div class="col-lg-1 col-md-12 col-sm-12">'+
                    '<a href="" class="remove"><i class="m-nav__link-icon fa fa-minus"></i></a>'+  
                '</div>'+
                                        
            '</div>';

	$(document).on('click', '.trip_pay_add', function(event) {
        event.preventDefault();
        $('.trip_pay').append(strTripDetlHtml);
    });

    $(document).on('click', '.remove', function(event) {
        event.preventDefault();
        $(this).closest('.row').remove();
        
    });

$(document).on('change', "#trip_units,#trip_rates", function(){

    var closest = $(this).closest('.trip_pay_count');
    var strUnit = closest.find('#trip_units').val();
    var strRate = closest.find('#trip_rates').val();
    var total = strUnit * strRate;
    closest.find("#trip_amount").val(total);

});

$(document).on('click', '.add_trip_location', function(event) {
	event.preventDefault();
	var closest = $(this).closest('.trip_location');
	var strHtml = '<tr class="trip_location">'+
		   '<td><select class="deliver_point" name="trip_work[]"><option value="1" selected="selected">Pickup - loaded</option><option value="2">Deliver</option><option value="3">Return - empty</option><option value="4">Bring to Yard- Loaded</option><option value="5">Pickup from Yard- Loaded</option><option value="6">Bring to Yard - Empty</option><option value="7">Pickup from Yard - Empty</option><option value="8">Bobtail From</option><option value="9">Bobtail To</option><option value="10">Bring Chassis to Yard</option><option value="11">Pickup Chassis from Yard</option><option value="12">Pickup Chassis</option><option value="13">Return Chassis</option><option value="14">Pickup Third-Party Container</option><option value="15">Bring Third-Party Container to Yard</option><option value="16">Pickup Third-Party Container from Yard</option><option value="17">Return Third-Party Container</option><option value="18">Street Turn</option><option value="19">Close Move</option></select></td>'+
		   '<td>at</td>'+
		   '<td><select class="trip_loct" name="trip_location[]"><option value="">-----------</option></select></td>'+
		   '<td><input type="hidden" name="trip_id[]"><a href="" class="add_trip_location"><i class="m-nav__link-icon fa fa-plus"></i></a></td>'+
			'<td><a href="" class="remove_trip_location"><i class="m-nav__link-icon fa fa-minus"></i></a></td>'+
			'<td><a class="add_details" data-id="1" href="#">Add Details</a></td>'+
		'</tr>';
	closest.after(strHtml);
});
/*

$(document).on('click', '.remove_trip_location', function(event) {
	event.preventDefault();
	var closest = $(this).closest('.trip_location');
	var strOrderId = $(this).data('orderid');	
	var token = $("input[name='_token']").val();
	var dataString = '_token='+token+'&strOrderId='+strOrderId;
	if(strOrderId != '') {
		$.ajax({
           type:'get',
           url: site_url+"/order/delete_order_trip_details/"+strOrderId,
           data:dataString,
           success:function(result){
            	console.log(result) ;
           }
        });
	}

	// closest.remove();
});*/

$(document).on('change', '#trip_driver', function(event) {
    $('#trip_truck').html('<opton>select</opton>');
	var driverId = $(this).val();
	var token = $("input[name='_token']").val();
	var dataString = '_token='+token+'&driverId='+driverId;
	if(driverId != '') {
		$.ajax({
           type:'POST',
           url: site_url+"/order/get_truck_by_driver",
           data:dataString,
           success:function(result){
              	var strOPtion;
                $.each(result, function(index, val) {

                	// console.log(val);
              	    strOPtion += '<option value="'+val.id+'">'+ val.license_plate_no + '</option>';
                });
                $('#trip_truck').html(strOPtion);
           }
        });
	}
});

	$(document).on('click', '.add_details', function(event) {
		event.preventDefault();
		var strTripId = $(this).data('id');
		var token = $("input[name='_token']").val();
		var dataString = "strTripId="+strTripId+"&_token="+token;
		if(strTripId != '') {
			$('#add_trip_detail').show();
			$('input[name="trip_no"]').val(strTripId);
			$.ajax({
	           type: 'POST',
	           url: site_url+"/order/get_order_trip_detail",
	           data: dataString,
	           success: function(objTripDetails) {

	           		$("#trip_driver").val('0');
	           		$("#start_trip_date").val('');
	                $("#completed_trip_date").val('');
	                $("#comments").val('');
	                $("#trip_truck").html('<option>Select One</option>');

	                $(".trip_pay .trip_pay_count").remove();

	                if($.isEmptyObject(objTripDetails)) {
	           			$('.trip_pay').append(strTripDetlHtml);
	           		}

	           		$( ".trip_pay_count .remove" ).replaceWith( '<a href="" class="trip_pay_add"><i class="m-nav__link-icon fa fa-plus"></i></a>' );

	                if( objTripDetails !=  "" ) {
		               $("#trip_driver").val(objTripDetails.driver_id);
		               $("#start_trip_date").val(objTripDetails.start_trip_date);
		               $("#completed_trip_date").val(objTripDetails.completed_trip_date);
		               $("#comments").val(objTripDetails.comments);

		               var objTrucks = $.parseJSON(objTripDetails.trucks);
		               	var truckOption;
		               $.each(objTrucks, function(index, strResult) {
		               	 truckOption = "<option value="+ strResult.id +">"+ strResult.license_plate_no +"</option>";
		               });
		               $('#trip_truck').html(truckOption);
		                
		               var strPaymntDetl = $.parseJSON(objTripDetails.payment_details);

		               $.each(strPaymntDetl, function(index, val) {
		               	console.log(val.pay_type);
		               		// $('#trip_pay_type').val(val.pay_type);
		               	 	var strPaymentDetl = '<div class="row trip_pay_count">'+
                                    '<div class="col-4">'+
                                        '<select class="trip_pay_type'+index+'" id="trip_pay_type" style="width: 100%" name="payment_details[pay_type][]"><option value="Additional Dray">Additional Dray</option><option value="Attempted Pickup">Attempted Pickup</option><option value="Bobtail">Bobtail</option><option value="Chassis Reposition">Chassis Reposition</option><option value="Chassis Split">Chassis Split</option><option value="Detention">Detention</option><option value="Dry Run">Dry Run</option><option value="Fuel Surcharge">Fuel Surcharge</option><option value="Hauling Refrigerated Cargo">Hauling Refrigerated Cargo</option><option value="Hazardous Materials">Hazardous Materials</option><option value="Heavy">Heavy</option><option value="Local Move">Local Move</option><option value="Miscellaneous">Miscellaneous</option><option value="Other">Other</option><option value="Scale">Scale</option><option value="Stop Off">Stop Off</option><option value="Toll">Toll</option><option value="Triaxle">Triaxle</option><option value="Trip Pay">Trip Pay</option></select>'+
                                    '</div>'+
                                    '<div class="col-2"><input class="form-control numericOnly" id="trip_units" placeholder="Units" name="payment_details[units][]" type="text" value="'+ val.units +'"></div>'+
                                    '<div class="col-2"><input class="form-control numericOnly" id="trip_rates" placeholder="Rates" name="payment_details[rates][]" type="text" value="'+val.rates+'"></div>'+
                                    '<div class="col-3"><input class="form-control numericOnly" id="trip_amount" placeholder="Amounts" name="payment_details[amount][]" type="text" value="'+val.amount+'"></div>'+
                                    '<div class="col-lg-1 col-md-12 col-sm-12">';
                                    if(index == 0) {
                                    strPaymentDetl += '<a href="" class="trip_pay_add"><i class="m-nav__link-icon fa fa-plus"></i></a>';
                                    } else {
                                    strPaymentDetl += '<a href="" class="remove"><i class="m-nav__link-icon fa fa-minus"></i></a>';
                                    }
                                    strPaymentDetl += '</div>'+
                                '</div>';
                            $('.trip_pay').append(strPaymentDetl);
                            $(".trip_pay_type"+index+" option[value='"+val.pay_type+"']").attr("selected","selected");
		               });
	                }
	           	}
	        });
		}
	});

	$(document).on('change', '.trip_loct', function(event) {
		event.preventDefault();
		$.ajax({
	      method: "POST",
	      url: site_url+"/order/save_trip_order_data",
	      data: $('#tripDetails').serialize(),
	      success: function( result ){
	      	$('.msg').text('Trip has been Added Successfully');
	      }
	    })

	});

	$(document).on('click', ".remove_trip_location", function(event) {
		event.preventDefault();
	    var id = $(this).data("orderid");
	    var closest = $(this).closest('.trip_location');
	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	    if(confirm('Are you sure want to delete this trip? ')){
		    $.ajax({
		        url: site_url+"/order/delete_order_trip_details/"+id,
		        type: 'delete',
		        data: { "id": id },
		        success: function (result) {
		            if( result == 1 ) {
		            	console.log(1);
		            	$('.msg').text('Trip has been deleted');
		            	closest.remove();
		            } else {
		            	console.log(2);
		            	$('.msg').text('Something went wrong please try Again');
		            }
		        }
		    });
		}
	});

	
// dispatch_submit
$(document).on('click', '.dispatch_submit', function(event) {
	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
		event.preventDefault();
		var url = "/order/dispatchsave";
        var task_id = $(this).data('tripid');
       	var closest = $(this).closest('.trip_disptch_row');
       	var dispatch_by = $(this).closest('selector');
        var dispatch_date = closest.find("#dispatch_date").val();

        if(!dispatch_date){
        	alert("Please Enter Date");
        	event.stopPropogation() ;

        }
        $.ajax({
           type:'POST',
           url: site_url+url,
           data:'id='+task_id+'&dispatch_date='+dispatch_date,
           success:function(result){
              $('.dispatch_message').text('Value Update Successful');
              closest.find('#show_dispatch_date').text(dispatch_date);
              closest.find('.dispatch_submit').attr("disabled", true);
              closest.find('.dispatch_submit').removeClass("dispatch_submit");
              closest.find('.btn-detail').addClass("dispatch_diabled");
              closest.find('#m_datepicker_3').hide();
           }
        });
});

// complete_submit
$(document).on('click', '.completed_submit', function(event) {
	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
		event.preventDefault();
		var url = "/order/completesave";
        var task_id = $(this).data('tripid');
       	var closest = $(this).closest('.trip_completed_row');
        var completed_date = closest.find("#completed_date").val();

        if(!completed_date){
        	alert("Please Enter Date");
        	event.stopPropogation() ;

        }
        $.ajax({
           type:'POST',
           url: site_url+url,
           data:'id='+task_id+'&completed_date='+completed_date,
           success:function(result){
              $('.completed_message').text('Value Update Successful');
              closest.find('#show_completed_date').text(completed_date);
              closest.find('.completed_submit').attr("disabled", true);
              closest.find('.completed_submit').removeClass("completed_submit");
              closest.find('.btn-detail').addClass("completed_diabled");
              closest.find('#m_datepicker_3').hide();
           }
        });
});

// Billing Ready

$(document).on('click', '.ready', function(event) {
        var orderId = $(this).val();
        $('#order_id').val(orderId);
        $("#ready_modal").modal('show');
    });

    $(document).on('click', '.cls_ready, .close', function(event) {
        var orderId = $('#order_id').val();
        $('input:checkbox[value='+orderId+']').prop('checked', false);
    });

    $('input[type="file"]').change(function(e){
       var fileName = e.target.files[0].name;
       $(".custom-file .custom-file-control").text(fileName);
   });

});