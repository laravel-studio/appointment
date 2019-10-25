$(function () {

    /**************Roles List****************/
    if($('#rolelist').length)
    {

         $('#rolelist').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            columnDefs: [{
                  orderable: false,
                  className: 'reorder',
                  targets: 2
              }
            ]
        });

    }
    /**************Roles end****************/
    /**
     * Data Table for Employee List Table
     */
    $(function() {
        window.fs_test = $('.permission_dd').fSelect();
    });
    if($('#emplist').length)
    {
      $('#emplist').DataTable({
          'paging': true,
          'lengthChange': false,
          'searching': true,
          'ordering': true,
          'info': true,
          'autoWidth': true,
          columnDefs: [{
              orderable: false,
              className: 'reorder',
              targets: 2
          }
          ]
      });
    }

    /**************Customer List****************/
    if($('#custlist').length)
    {
         $('#custlist').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            columnDefs: [{
                orderable: false,
                className: 'reorder',
                targets: 2
            }
            ]
        });
    }
    /**************Customer End****************/
    /**************Services List****************/
    if($('#serviceslist').length)
    {
        $('#serviceslist').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            columnDefs: [{
                orderable: false,
                className: 'reorder',
                targets: 4
            }
            ]
        });
    }
    /***************  DELETE *******************/


    if($('#employeeservicelist').length)
    {
        $('#employeeservicelist').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            columnDefs: [{
                orderable: false,
                className: 'reorder',
                targets: 3
            }]
        });
    }
    /**
     * Employees multiselect for EmployeeServices Table
     */

    $(function () {
        window.fs_test = $('.employees_dd').fSelect();
    });

    if($('#slotlist').length)
    {
        $('#slotlist').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            columnDefs: [{
                orderable: false,
                className: 'reorder',
                targets: 6
            }]
        });
    }

    if ($('#appointmentlist').length) {
        $('#appointmentlist').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            columnDefs: [{
                orderable: false,
                className: 'reorder',
                targets: 6
            }]
        });
    }
    /**************Services End*********************/
    $('.service_dd').on('change',function()
    {
        var service_id='';
        var ajax_url = route_url;
        if ($(this).val()!='')
        {
            service_id = $(this).val();
            ajax_url = ajax_url+'/slots/emplist/'+service_id;
            $.get(ajax_url, function (data) {
                $('#emplist_label').show();
                $('.emplist').html(data.html);
            });
        }


    });
    $('.submit-settings-frm').on('click',function(e){
        e.preventDefault();

        // console.log($("#settings_form"));
        var ele_id='';
        var setval={};
        $($('#settings_form').prop('elements')).each(function(){
            var t=$(this);
            var ttype=t.attr('type');
           if(ttype!='hidden' && ttype!='button' && ttype!='label')
           {
              ele_id="#"+t.attr('id');
              if(t.val()!=t.data('old'))
              {
                setval[t.attr('id')]=t.val();
              }
           }
            // console.info($(this).attr('type'));
        });
        setval['_token']=$('#settings_form').find("input[name=_token]").val();
        var ajax_url = route_url;
        console.log(ajax_url)
        console.log(setval);
        var request_data=JSON.stringify(setval);
        console.log(Object.keys(setval).length);
        console.log(request_data);
        ajax_url = ajax_url+'/settings/save';
        console.log(ajax_url);
        console.log($('#settings_form').serialize());
        // $.post(ajax_url).done( function(data){
        //     console.log(data);
        //     // $('#emplist_label').show();
        //     // $('.emplist').html(data);
        // });
        $.ajax({
            type: "POST",
            url: ajax_url,
            data:$('#settings_form').serialize(),
            dataType: 'json',
                success: function (data) {
                   console.log('test load');
                    window.location.reload();
                },
                error: function (data) {
                    console.log('error',data)
                }
        });


    });


    $('.service_book').on('change', function(){
        var service_id = '';
        var ajax_url = route_url;

        if ($(this).val() != '') {
            service_id = $(this).val();
            ajax_url = ajax_url + '/service/emplist/' + service_id;
            $.get(ajax_url, function (data) {
                $('.service-provider-list').show();
                $('.serviceemplist').html(data.html);
                // fSelect for appointments bookings starts
                $(function () {
                    window.fs_test = $('.available_customers').fSelect();
                });
                // fSelect for appointments bookings ends
            });
        }
    });

    $(document).on('click', '.service-list .emp', function (e) {
        $("#appointment_date").datepicker("destroy");
        var slotStartTime = $('#start_time ').val();

        $('.service-list .emp').removeClass('emp-selected');
        $(this).addClass('emp-selected');
        $('.service-details').show();
        $('.service-details #slot_day').val($(this).data('slot-day'));
        $('.service-details #appointment_price').val($(this).data('service-price'));
        $('.service-details #start_time').val($(this).data('service-start'));
        $('.service-details #duration').val($(this).data('service-duration'));
        $('.service-details #slot_id').val($(this).data('slot-id'));
        var day = $(this).data('slot-day');
        var d=0;
        switch(day)
        {
            case 'Monday' : d=1; break;
            case 'Tuesday' : d=2; break;
            case 'Wednesday' : d=3; break;
            case 'Thrusday' : d=4; break;
            case 'Friday' : d=5; break;
            case 'Saturday' : d=6; break;
            case 'Sunday' : d=0; break;

        }

        $("#appointment_date").datepicker({
            beforeShowDay:
                function (dt) {
                    return [dt.getDay() != d ? false : true];
                },
            minDate: 0
        });

        /**************** jQuery Time Picker for Book Appointments starts ***********/
        $('#init_time').timepicker({
            'minTime': slotStartTime,
            'disableTimeRanges': [
                ['12am', slotStartTime ]
            ]
        });
        /*************** jQuery Time Picker for Book Appointments ends **************/
        $('#init_time').on('change', function(){
            var valueStart = $("#init_time").val().split(":");
            var theHour = parseInt(valueStart[0]);
            var theMintute = parseInt(valueStart[1]);
            var valueDuration = $('#duration').val();
            var numDuration = parseInt(valueDuration);
            var newMinutes = theMintute + numDuration;

            if(newMinutes >= 60) {
                var updatedNewMinute = (newMinutes%60);
                var newHours = (newMinutes/60);
                if( newHours%1 != 0 )
                {
                    var updatedNewHour = newHours.toString().split(".")[0];
                    var covertedNewHour = parseInt(updatedNewHour);
                    var timeHours = parseInt(updatedNewHour) + parseInt(theHour);
                }
                else if (newHours%1 == 0 )
                {
                    var updatedNewHour = newHours;
                    var convertedNewHour = updatedNewHour;
                    var timeHours = parseInt(updatedNewHour) + parseInt(theHour);
                }

                if (updatedNewMinute.toString().length == 1)
                {
                    var updatedMinute = "0" + updatedNewMinute;
                    var newTime = timeHours + ":" + updatedMinute;
                }
                else if (updatedNewMinute.toString().length == 2)
                {
                    var newTime = timeHours + ":" + updatedNewMinute;
                }
                $('#ending_time').val(newTime);

            }
            else if (newMinutes < 60)
            {
                var updatedNewMinute = newMinutes;
                var convertedNewHour = theHour;

                if (updatedNewMinute.toString().length == 1)
                {
                    var updatedMinute = "0" + updatedNewMinute;
                    var newTime = convertedNewHour + ":" + updatedMinute;
                }
                else if (updatedNewMinute.toString().length == 2)
                {
                    var newTime = convertedNewHour + ":" + updatedNewMinute;
                }
                $('#ending_time').val(newTime);
            }


        })

    });

    /****************** Booking History AJAX Dropdown Starts ***********/
    $('.customer_applist').on('change', function () {
        var customer_id = '';
        var ajax_url = route_url;

        if ($(this).val() != '') {
            customer_id = $(this).val();
            ajax_url = ajax_url + '/appointments/history/' + customer_id;
            $.get(ajax_url, function (data) {
                $('.customer_bookinglist').html(data.html);
        /************ Datatable for customer booking history starts ********/
        if ($('#customerbookingss').length) {
            $('#customerbookingss').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                columnDefs: [{
                    orderable: false,
                    className: 'reorder'
                }]
            });
        }
        /************ Datatable for customer booking history ends **********/
        });
        }
    });
    /***************** Booking History AJAX Dropdown Ends **************/

    /***************** Date range picker report details starts ***************/

    $('#reportRangeDetails').daterangepicker();

    /***************** Date range picker report details ends *******************/



    /****************** Booking Report AJAX Dropdown Starts ***********/
    $('#reportRangeDetails').on('change', function () {
        var currentParameter = $(this).val();
        var ajax_url = route_url;

        if ($(this).val() != '') {
            ajax_url = ajax_url + '/appointments/booking-reports/view-reports/' + currentParameter;
            $.get(ajax_url, function (data) {
                $('.report-details').html(data.html);
                /************ Datatable for customer booking history starts ********/
                if ($('#reportdetailstable').length) {
                    $('#reportdetailstable').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': true,
                        'ordering': true,
                        'info': true,
                        'autoWidth': true,
                        columnDefs: [{
                            orderable: false,
                            className: 'reorder'
                        }]
                    });
                }
                /************ Datatable for customer booking history ends **********/
            });
        }
    });
    /***************** Booking Report AJAX Dropdown Ends **************/


    // fSelect for appointments history starts
    $(function () {
        window.fs_test = $('.service_book').fSelect();
    });
    // fSelect for appointments history ends

    // fSelect for appointments bookings starts
    $(function () {
        window.fs_test = $('.customer_applist').fSelect();
    });
    // fSelect for appointments bookings ends

    // Employee Services assignments starts
    $(function () {
        window.fs_test = $('#service_name').fSelect();
    });
    // Employee Services assignments ends

    // Slots Service fSelect starts
    $(function () {
        window.fs_test = $('#service').fSelect();
    });
    // Slots Service fSelect ends

    // Slots Service fSelect starts
    $(function () {
        window.fs_test = $('#days').fSelect();
    });
    // Slots Service fSelect ends

    // Slots timepicker for start time starts
    $('#starttime').timepicker();
    // Slots timepicker for start time ends

    // Slots timepicker for end time starts
    $('#endtime').timepicker();
    // Slots timepicker for end time ends

    // Employee Services edit employee dropdown fSelect starts
    $(function () {
        window.fs_test = $('#employees_name').fSelect();
    });
    // Employee Services edit employee dropdown fSelect ends


    /*** SUMMERNOTE PLUGIN FOR ADD SERVICES TEXTAREA STARTS ***/
    $('#service_description').summernote({
        placeholder: 'Enter Service Description',
        tabsize: 2,
        height: 200
    });
    /**** SUMMERNOTE PLUGIN FOR ADD SERVICES TEXTAREA ENDS ****/


    /*** SUMMERNOTE PLUGIN FOR ADD SERVICES TEXTAREA STARTS ***/
    $('#service_terms').summernote({
        placeholder: 'Enter Service Terms',
        tabsize: 2,
        height: 200
    });
    /**** SUMMERNOTE PLUGIN FOR ADD SERVICES TEXTAREA ENDS ****/


    /*** SUMMERNOTE PLUGIN FOR EDIT SERVICES TEXTAREA STARTS ***/
    $('#editServiceDescription').summernote({
        placeholder: 'Enter Service Description',
        tabsize: 2,
        height: 200
    });
    /**** SUMMERNOTE PLUGIN FOR EDIT SERVICES TEXTAREA ENDS ****/

    /*** SUMMERNOTE PLUGIN FOR ADD SERVICES TEXTAREA STARTS ***/
    $('#editServiceTerms').summernote({
        placeholder: 'Enter Service Terms',
        tabsize: 2,
        height: 200
    });
    /**** SUMMERNOTE PLUGIN FOR ADD SERVICES TEXTAREA ENDS ****/

        /******|   Dashboard Bookings Data Tables  |**********/
        if ($('#dashboard_bookingss').length) {
            $('#dashboard_bookingss').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                columnDefs: [{
                    orderable: false,
                    className: 'reorder'
                }]
            });
        }
    /******|   Dashboard Bookings Data Tables Ends |*********/


    /******|   fSelect for General Settings View   |*********/
    $(function () {
        window.fs_test = $('#language').fSelect();
    });


    $(function () {
        window.fs_test = $('#timezone').fSelect();
    });

    $(function () {
        window.fs_test = $('#currency').fSelect();
    });

    /** Appointment Status Change AJAX Starts */
    $('.appointment-status').change(function () {
        var ajax_url = route_url;
        var appointmentId = $(this).data('appointmentid');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: ajax_url +"/appointments/change-status/" + appointmentId,
                method: "POST",
                data: {
                    cat_id: appointmentId,
                },
                success: function (data) {
                    // console.log(data);
                    window.location.reload();
                }
            });
        // window.location.reload();
    });
    /** Appointment Status Change AJAX Ends */
})
/***************Delete Cinfirmation Model JS *******************/
    function deleteData(route,id)
    {
        var delete_route='';
        delete_route=route_url+'/'+route+'/'+id;
        $('#DeleteModal').modal();
        $("#deleteForm").attr('action', delete_route);
    }
    function formSubmit()
    {
        $("#deleteForm").submit();
    }
/***************Delete Cinfirmation Model JS End ***************/
