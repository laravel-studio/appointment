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
            console.log(ajax_url);
            $.get(ajax_url, function (data) {
                console.log(data);
                $('#emplist_label').show();
                $('.emplist').html(data);
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
                   console.log(data)
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
            });
        }
    });

    $(document).on('click', '.service-list .emp', function (e) {
        $("#datepicker").datepicker("destroy");

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

        $("#datepicker").datepicker({
            beforeShowDay:
                function (dt) {
                    return [dt.getDay() != d ? false : true];
                }
        });

        $('#init_time').on('blur', function(){
            var valueStart = $("#init_time").val().split(":");
            var theHour = parseInt(valueStart[0]);
            var theMintute = parseInt(valueStart[1]);
            var valueDuration = $('#duration').val();
            var numDuration = parseInt(valueDuration);
            var newMinutes = theMintute + numDuration;

            if (newMinutes.toString().length == 1) {
                var updatedMinute = "0" + newMinutes;
                var newTime = theHour + ":" + updatedMinute;
            }
            else if (newMinutes.toString().length >= 2) {
                console.log(newMinutes);
                var newTime = theHour + ":" + newMinutes;
            }
            $('#ending_time').val(newTime);
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
            });
        }
    });
    /***************** Booking History AJAX Dropdown Ends **************/

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
                    className: 'reorder',
                    // targets: 4
                }]
            });
        }
    /************ Datatable for customer booking history ends **********/

    /****************** Booking Report AJAX Dropdown Starts ***********/
    $('.report_by').on('change', function () {
        // var customer_id = '';
        var ajax_url = route_url;

        if ($(this).val() != '') {
            customer_id = $(this).val();
            ajax_url = ajax_url + '/appointments/booking-reports/view-reports'; // + customer_id
            $.get(ajax_url, function (data) {
                $('.report-details').html(data.html);
            });
        }
    });
    /***************** Booking Report AJAX Dropdown Ends **************/

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
