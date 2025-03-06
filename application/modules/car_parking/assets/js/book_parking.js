"use strict";
function getZone() {
    'use strict';
    $('#zone :nth-child(1)').prop('selected', true);
    $("#zone").trigger('change');
    var vehicle_type = $("#vehicle_type").find(":selected").val();
    var zone = $("#zone").find(":selected").val();
    if (vehicle_type == "") {
        $("#vehicle_type").removeClass("is-valid").addClass("is-invalid");
        return false;
    } else {
        $("#vehicle_type").removeClass("is-invalid");
    }
    var csrf = $('#csrf_token').val();
    var myurl = baseurl + "car_parking/car_parking/getZone";
    if ($('#zone')[0].options.length > 1)
        $('#zone').find('option').not(':first').remove();
    $.ajax({
        url: myurl,
        type: "POST",
        data: {
            csrf_test_name: csrf,
            vehicle_type: vehicle_type,
            zone: zone,
        },
        success: function(data) {
            var obj = JSON.parse(data);
            var len = obj.length;
            for (var i = 0; i < len; i++) {
                $('#zone').append('<option value="' + obj[i].zone_id + '">' + obj[i].zone_type +
                    '</option>');
            }
        }
    });
}

function getTime() {
    'use strict';
    $('#time :nth-child(1)').prop('selected', true);
    $("#time").trigger('change');
    var zone = $("#zone").find(":selected").val();
    if (zone == "") {
        $("#zone").removeClass("is-valid").addClass("is-invalid");
        return false;
    } else {
        $("#zone").removeClass("is-invalid");
        $("#b_zone").text($("#zone").find(":selected").text());
    }
    var vehicle_type = $("#vehicle_type").find(":selected").val();
    if (vehicle_type == "") {
        $("#vehicle_type").removeClass("is-valid").addClass("is-invalid");
        return false;
    } else {
        $("#vehicle_type").removeClass("is-invalid");
    }
    var csrf = $('#csrf_token').val();
    var myurl = baseurl + "car_parking/car_parking/getTime";
    if ($('#time')[0].options.length > 1)
        $('#time').find('option').not(':first').remove();
    $.ajax({
        url: myurl,
        type: "POST",
        data: {
            csrf_test_name: csrf,
            vehicle_id: vehicle_type,
            zone: zone,
        },
        success: function(data) {
            var obj = JSON.parse(data);
            var len = obj.length;
            for (var i = 0; i < len; i++) {
                $('#time').append('<option value="' + obj[i].parkingSetting_id + '">' + obj[i].time +
                    ' Hours</option>');
            }
        }
    });
}

function bill() {
    var time = $("#time").find(":selected").val();
    if (time == "") {
        $("#time").removeClass("is-valid").addClass("is-invalid");
        $("#checkin_date").attr("disabled", true);
        $("#checkout_date").attr("disabled", true);
        return false;
    } else {
        $("#time").removeClass("is-invalid");
        $("#checkin_date").attr("disabled", false);
        $("#checkout_date").attr("disabled", false);
        $("#b_time").text($("#time").find(":selected").text());
    }
    var csrf = $('#csrf_token').val();
    var myurl = baseurl + "car_parking/car_parking/getBill";
    $.ajax({
        url: myurl,
        type: "POST",
        data: {
            csrf_test_name: csrf,
            parkingSetting_id: time,
        },
        success: function(data) {
            var obj = JSON.parse(data);
            $("#b_price").text(obj.price);
            $("#b_subtotal").text(obj.price);
            $("#b_percent").text(obj.vat);
            var percent = (obj.price * obj.vat) / 100;
            $("#b_vat").text(percent);
            var grandTotal = parseFloat(obj.price) + parseFloat(percent);
            $("#b_grandTotal").text(grandTotal);
        }
    });
}
$(document).ready(function() {
    "use strict";
    $("#time").on("change", function() {
        $("#checkin_date").val("");
        $("#checkout_date").val("");
        $("#b_slot").text("");
        $("#b_price").text("");
        $("#b_time").text("");
        $("#b_subtotal").text("");
        $("#b_percent").text("");
        $("#b_vat").text("");
        $("#b_grandTotal").text("");
        $("#slot").empty();
        $("#b_submit").attr("disabled", true);
    });
    $("#checkin_date").on("change", function() {
        var checkin_date = this.value;
        var stime = new Date(checkin_date);
        var hour = $("#time").find(":selected").text();
        var h = $.trim(hour).split(" ");
        hour = parseInt(h[0]);
        stime.setHours(stime.getHours() + hour);
        var checkoutTime = stime.toISOString().slice(0, 10) + " " + stime.getHours() + ":" + stime
            .getMinutes()
        $("#checkout_date").val(checkoutTime);
        getSlot(checkin_date, checkoutTime);
    });
    $("#checkout_date").on("change", function() {
        var checkout_date = this.value;
        var stime = new Date(checkout_date);
        var hour = $("#time").find(":selected").text();
        var h = $.trim(hour).split(" ");
        hour = parseInt(h[0]);
        stime.setHours(stime.getHours() - hour);
        var checkinTime = stime.toISOString().slice(0, 10) + " " + stime.getHours() + ":" + stime
            .getMinutes()
        $("#checkin_date").val(checkinTime);
        getSlot(checkinTime, checkout_date);
    });
});

function getSlot(checkinTime, checkoutTime) {
    var zone = $("#zone").find(":selected").val();
    var parkingId = $("#parkingId").val();
    if (zone == "") {
        $("#zone").removeClass("is-valid").addClass("is-invalid");
        return false;
    } else {
        $("#zone").removeClass("is-invalid");
    }
    var csrf = $('#csrf_token').val();
    var myurl = baseurl + "car_parking/car_parking/getSlot";
    $('#slot').empty();
    $.ajax({
        url: myurl,
        type: "POST",
        data: {
            csrf_test_name: csrf,
            zone: zone,
            checkinTime: checkinTime,
            checkoutTime: checkoutTime,
            parkingId: parkingId,
        },
        success: function(data) {
            var obj = JSON.parse(data);
            var len = obj.slot;
            var len = len.length;
            if (obj.slot == '') {
                slot = '<div class="col-md-4 col-lg-4 col-xl-4 mb-3">' +
                    '<div class="bg-danger p-4 text-white text-center rounded-lg">' +
                    '<h5 class="fs-18 font-weight-bold">' + "No Slot Available" + '</h5>' +
                    '<i class="hvr-buzz-out fas fa-car fs-23 font-weight-bold"></i>' +
                    '</div>' +
                    '</div>';
                $('#slot').append(slot);
            }
            var price = $("#b_price").text();
            for (var i = 0; i < len; i++) {
                var slot = '<div class="col-md-4 col-lg-3 col-xl-2 mb-3 c_pointer" id="slot_' + i +
                    '" onclick="getParking(' + i + ','+ price +')">' +
                    '<div class="bg-dark p-4 text-white text-center rounded-lg">' +
                    '<h5 id="'+obj.slot[i].slot_type+'" class="fs-18 font-weight-bold">' + obj.slot[i].slot_type + '</h5>' +
                    '<i class="hvr-buzz-out fas fa-car fs-23 font-weight-bold"></i>' +
                    '</div>' +
                    '</div>';
                $('#slot').append(slot);
            }
            $("#b_submit").attr("disabled", true);
        }
    });
}

function getParking(key,price) {
    var slot = $("#slot_" + key + ">div>h5").text();
    $("#b_slot").text(slot);
    $("#b_submit").attr("disabled", false);
    if($("#slot_"+key+ ">div").hasClass('bg-dark')) {
        $("#slot_"+key+ ">div").removeClass("bg-dark");
    }else{
        $("#slot_"+key+ ">div").addClass("bg-dark");
    }
    $("#slot_"+key+ ">div").toggleClass("bg-danger");
    var allSlot = $("div.bg-danger>h5").get();
    var totalPrice = parseFloat(price)*allSlot.length;
    var all = "";
    for(var i=0; i<allSlot.length; i++){
        var single = allSlot[i].id;
        all += single.concat(",");
    }
    all = all.replace(/,\s*$/, "");
    $("#b_slot").text(all);
    $("#b_price").text(totalPrice);
    $("#b_subtotal").text(totalPrice);
    var vat = $("#b_percent").text();
    var totalVat = (parseFloat(vat)*totalPrice)/100; 
    var grandTotal = totalVat+totalPrice; 
    $("#b_vat").text(totalVat);
    $("#b_grandTotal").text(grandTotal);
    if($("#b_slot").text()==""){
        $("#b_submit").attr("disabled", true);
    }
}

$("#b_submit").on("click", function() {
    var zone = $("#zone").find(":selected").val();
    var vehicle_type = $("#vehicle_type").find(":selected").val();
    var time = $("#time").find(":selected").val();
    var booking_number = $("#booking_number").find(":selected").val();
    var checkin = $("#checkin_date").val();
    var checkout = $("#checkout_date").val();
    var slot = $("#b_slot").text();
    var total_price = $("#b_grandTotal").text();
    var parking_note = $("#parking_note").val();
    var parkingId = $("#parkingId").val();
    if (zone == "" | vehicle_type == "" | time == "" | booking_number == "" | checkin == "" | slot == "") {
        swal({
            title: "Failed",
            text: "Please fillup all required field",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        return false;
    }
    var csrf = $('#csrf_token').val();
    var myurl = baseurl + "car_parking/car_parking/submitParking";
    $.ajax({
        url: myurl,
        type: "POST",
        data: {
            csrf_test_name: csrf,
            booking_number: booking_number,
            parkingSetting_id: time,
            zone_id: zone,
            slot_id: slot,
            total_price: total_price,
            checkin: checkin,
            checkout: checkout,
            comment: parking_note,
            parkingId: parkingId,
        },
        success: function(data) {
            $("#b_submit").attr("disabled", true);
            location.reload();
        }
    });
});