"use strict"

document.addEventListener("DOMContentLoaded", function () {
    var blackoutYes = document.getElementById("blackout_yes");
    var blackoutNo = document.getElementById("blackout_no");
    var blackoutDateGroup = document.getElementById("blackout_date_group");
    var blackoutDate = document.getElementById("blackout_date");
    var startDate = document.getElementById("start_date");
    var endDate = document.getElementById("end_date");

    // Function to show/hide blackout date input
    function toggleBlackoutDate() {
        if (blackoutYes.checked) {
            blackoutDateGroup.style.display = "";
        } else {
            blackoutDateGroup.style.display = "none";
            blackoutDate.value = ""; // Clear the input when hidden
        }
    }

    // Function to validate blackout date range
    function validateBlackoutDate() {
        var start = new Date(startDate.value);
        var end = new Date(endDate.value);
        var blackout = new Date(blackoutDate.value);

        if (blackout < start || blackout > end) {
            alert("Blackout date must be between Start Date and End Date!");
            blackoutDate.value = ""; // Clear invalid input
        }
    }

    // Attach event listeners
    blackoutYes.addEventListener("change", toggleBlackoutDate);
    blackoutNo.addEventListener("change", toggleBlackoutDate);
    blackoutDate.addEventListener("change", validateBlackoutDate);
});
function year() {
    "use strict";
    var start = $("#start_date").val();
    var end = $("#end_date").val();
    var start_year = start.split("-");
    var end_year = end.split("-");
    if (start_year[0] <= end_year[0]) {
        $("#title").val(start_year[0] + "-" + end_year[0]);
    } else {
        swal({
            title: "Failed",
            text: "End year can not greater than start year",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        $("#start_date").val(end);
        $("#start_date,#end_date").trigger("change");
    }
}

    document.getElementById("no_end_date").addEventListener("change", function () {
        var endDateGroup = document.getElementById("end_date_group");
        if (this.checked) {
            endDateGroup.style.display = "none";  // Hide End Date
        } else {
            endDateGroup.style.display = ""; // Show End Date
        }
    });

$("#start_date,#end_date").trigger("change");
function editfinyear(id){
    "use strict";
    var title = $('#title_'+id).text();
    var start = $('#start_'+id).text();
    var end = $('#end_'+id).text();
    var status = $('#status_'+id).text();
    if(status=="Active"){
        $("input[name=status][value='2']").prop("checked",true);
        $("input[name=status][value='0']").prop("checked",false);
    }else{
        $("input[name=status][value='2']").prop("checked",false);
        $("input[name=status][value='0']").prop("checked",true);
    }
    $("#finid").val(id);
    $("#title").val(title);
    $("#start_date").val(start);
    $("#end_date").val(end);
    $("#start_date,#end_date").trigger("change");
    $("#finsubmit").attr('hidden', false);
    $("#submit").attr("hidden", true);
    $("#finsubmit").attr("onclick", "updatefinyear()");
}
var base_url = $("#base_url").val();
function fileValueOne(value) {
    'use strict';
    var path = value.value;
    var extenstion = path.split('.').pop();
    if (extenstion == "jpg" || extenstion == "svg" || extenstion == "jpeg" || extenstion == "png" || extenstion == "gif") {
        document.getElementById('image-preview').src = window.URL.createObjectURL(value.files[0]);
        var filename = path.replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
        document.getElementById("filename").innerHTML = filename;
        var fd = new FormData();
        var CSRF_TOKEN = $('#csrf_token').val();
        fd.append('img', $('#imgfront')[0].files[0]);
        fd.append('csrf_test_name', CSRF_TOKEN);
        $.ajax({
            url: base_url + "room_reservation/room_reservation/imageupload",
            type: "POST",
            data: fd,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function (r) {
                $("#imgffront").val(r);
            }
        });
    } else {
        swal({
            title: "Failed",
            text: "File not supported. Kindly Upload the Image of below given extension",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
    }
}
function fileValuesTwo(value) {
    'use strict';
    var path = value.value;
    var extenstion = path.split('.').pop();
    if (extenstion == "jpg" || extenstion == "svg" || extenstion == "jpeg" || extenstion == "png" || extenstion == "gif") {
        document.getElementById('image-preview2').src = window.URL.createObjectURL(value.files[0]);
        var filename = path.replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
        document.getElementById("filename2").innerHTML = filename;
        var fd = new FormData();
        var CSRF_TOKEN = $('#csrf_token').val();
        fd.append('img', $('#imgback')[0].files[0]);
        fd.append('csrf_test_name', CSRF_TOKEN);
        $.ajax({
            url: base_url + "room_reservation/room_reservation/imageupload",
            type: "POST",
            data: fd,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function (r) {
                $("#imgbback").val(r);
            }
        });
    } else {
        swal({
            title: "Failed",
            text: "File not supported. Kindly Upload the Image of below given extension",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
    }
}
function fileValuesThree(value) {
    'use strict';
    var path = value.value;
    var extenstion = path.split('.').pop();
    if (extenstion == "jpg" || extenstion == "svg" || extenstion == "jpeg" || extenstion == "png" || extenstion == "gif") {
        document.getElementById('image-preview3').src = window.URL.createObjectURL(value.files[0]);
        var filename = path.replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
        document.getElementById("filename3").innerHTML = filename;
        var fd = new FormData();
        var CSRF_TOKEN = $('#csrf_token').val();
        fd.append('img', $('#imgguest')[0].files[0]);
        fd.append('csrf_test_name', CSRF_TOKEN);
        $.ajax({
            url: base_url + "room_reservation/room_reservation/imageupload",
            type: "POST",
            data: fd,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function (r) {
                $("#imggguest").val(r);
            }
        });
    } else {
        swal({
            title: "Failed",
            text: "File not supported. Kindly Upload the Image of below given extension",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
    }
}
$(document).ready(function () {
    "use strict";
    $('.selectpicker').selectpicker();
    $('.testselect2').SumoSelect({
        search: true,
        placeholder: 'Room Select',
        csvDispCount: 5
    });

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
    var intime = $("#intime").val();
    var out = $("#outtime").val();
    var utime =  new Date(out);
    utime.setDate(utime.getDate()+1);
    var tt =  new Date(out).toTimeString().substr(0,9);
    var dd = utime.getDate();
    var mm = utime.getMonth() + 1;
    var y = utime.getFullYear();
    var outtime = y+'-'+mm+'-'+dd+' '+tt;
    var findate = $("#findate").val();
    $('.datefilter').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "timePicker": true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        'minDate': today,
        'maxDate': findate,
        locale: {
            format: 'YYYY-MM-DD HH:mm'
        }
    });
    $("#datefilter1").val(intime);
    $("#datefilter2").val(outtime);
    $('.datefilter2').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear',
          format: 'YYYY-MM-DD'
      }
    });
    $('.datefilter2').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD'));
    });
  
    $('.datefilter2').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
    var start = $("#datefilter1").val();
    var end = $("#datefilter2").val();
    $("#datefilter1").on("change", function(){
        start = $("#datefilter1").val();
        $('.datefilter3').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            'minDate': start,
            'maxDate': end,
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        });
        $('.datefilter4').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            'minDate': start,
            'maxDate': end,
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        });
        $(".datefilter4").val(end);
    });
    $("#datefilter2").on("change", function(){
        end = $("#datefilter2").val();
        $('.datefilter4').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            'minDate': start,
            'maxDate': end,
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        });
        $('.datefilter3').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            'minDate': start,
            'maxDate': end,
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        });
        $(".datefilter4").val(end);
    });
    $('.datefilter3').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "timePicker": true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        'minDate': start,
        'maxDate': end,
        locale: {
            format: 'YYYY-MM-DD HH:mm'
        }
    });
    $('.datefilter4').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "timePicker": true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        'minDate': start,
        'maxDate': end,
        locale: {
            format: 'YYYY-MM-DD HH:mm'
        }
    });
    $("#from_date1").val(intime);
    $("#to_date1").val(outtime);
    $("#from_date2").val(intime);
    $("#to_date2").val(outtime);

    //Table Add row

    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td class="border-0 pl-0"><input type="text" class="form-control form-control-xs datefilter2"/></td>';
        cols += '<td class="border-0"><input type="text" class="form-control form-control-xs datefilter2"/></td>';
        cols += '<td class="border-0"><div class="d-flex"> <input type="number" class="form-control form-control-xs" value="0"><div class="dropdown dropdown-custom ml-1"> <button class="btn btn-inverse-soft btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Tariff </button><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><table class="table table-sm table-borderless mb-0"><tbody><tr><td class="border-0">Base Rent</td><td class="border-0">0</td></tr><tr><td class="border-0">Net Rent</td><td class="border-0">0</td></tr></tbody></table></div></div></div></td>';

        cols += '<td class="border-0 pr-0 text-right"><button type="button" class="ibtnDel btn btn-danger-soft btn-xs"><i class="far fa-times-circle"></i></button></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });

    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        counter -= 1;
    });


    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();

    }

    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function () {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }

    document.addEventListener("DOMContentLoaded", function () {
        initToggleEndDate();
        initBlackoutDate();
    });
    
    // Function to toggle end date visibility
    function initToggleEndDate() {
        var checkbox = document.getElementById("no_end_date");
        var endDateGroup = document.getElementById("end_date_group");
    
        if (!checkbox || !endDateGroup) return; // Prevent errors if elements are missing
    
        checkbox.addEventListener("change", function () {
            endDateGroup.style.display = checkbox.checked ? "none" : "block";
        });
    }
    
    // Function to manage blackout date visibility and validation
    function initBlackoutDate() {
        var blackoutYes = document.getElementById("blackout_yes");
        var blackoutNo = document.getElementById("blackout_no");
        var blackoutDateGroup = document.getElementById("blackout_date_group");
        var blackoutDate = document.getElementById("blackout_date");
        var startDate = document.getElementById("start_date");
        var endDate = document.getElementById("end_date");
    
        if (!blackoutYes || !blackoutNo || !blackoutDateGroup || !blackoutDate || !startDate || !endDate) return;
    
        function toggleBlackoutDate() {
            blackoutDateGroup.style.display = blackoutYes.checked ? "block" : "none";
            if (!blackoutYes.checked) blackoutDate.value = "";
        }
    
        function validateBlackoutDate() {
            var start = new Date(startDate.value);
            var end = new Date(endDate.value);
            var blackout = new Date(blackoutDate.value);
    
            if (blackout < start || blackout > end) {
                alert("Blackout date must be between Start Date and End Date!");
                blackoutDate.value = "";
            }
        }
    
        blackoutYes.addEventListener("change", toggleBlackoutDate);
        blackoutNo.addEventListener("change", toggleBlackoutDate);
        blackoutDate.addEventListener("change", validateBlackoutDate);
    }
    
    

});