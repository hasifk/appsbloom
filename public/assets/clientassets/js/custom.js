$(document).ready(function () {
    $('.to_ck').each(function () {

        CKEDITOR.replace($(this).attr('id'));
    });
    $('#datetimepicker').datepicker({format: "dd/mm/yyyy"});

    var l = window.location;
    base_url = l.protocol + "//" + l.host;
    $(".img_delete").on("click", function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/gallery_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    cursel.parent('div').remove();
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
    $(".vid_delete").on("click", function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/video_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    cursel.parent('div').remove();
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
    $(".place_delete").on("click", function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/findus_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    cursel.parents('tr').remove();
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
    $(document).on("click", '.room_delete', function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/room_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    $('#rooms').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });

    $(document).on("click", '.user_delete', function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/user_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });

    $(document).on("click", '.news_delete', function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/news_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    $('div#accordion').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });

    $(document).on("click", '.schedule_time', function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/schedule_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });


    $(document).on("click", '.booking_delete,.mbooking_delete', function () {
        var cursel = this;
        var value = new Array();
        var j = 0;
        if (cursel.className == 'booking_delete')
        {
            var ids = cursel.id;
            $(".checkbox").each(function () {
                if ($(this).is(":checked"))
                    $(this).removeAttr("checked");
            });
            $("#selectall").removeAttr("checked");
            $("#" + ids).prop("checked", true);
        }
        if ($(".checkbox:checked").length > 0)
        {
            $(".checkbox:checked").each(function () {
                value[j++] = $(this).val();
            });
            if (confirm("Are sure want to delete"))
            {
                $.ajax({
                    type: "GET",
                    url: base_url + '/booking_delete',
                    data: "id=" + value,
                    cache: false,
                    success: function (data) {
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        alert(error);
                    }
                });
            }
        } else
            alert("Please select atleast one")
    });


    $(document).on("change", '.booking_status', function () {
        var cursel = $(this);
        if (confirm("Are sure want to change"))
        {
            var ids = this.id.trim();
            var values = this.value;
            //alert(ids);
            $.ajax({
                type: "GET",
                url: base_url + '/booking_status',
                data: "id=" + ids + "&value=" + values,
                cache: false,
                success: function (data) {
                    alert("Successfully Changed" + data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });

    $(".room_focus").on("mouseover", function () {
        var cursel = $(this);
        var parent = cursel.parent('tr');
        var id = parent.attr('id');
        parent.siblings("tr.others").hide();
        if (parent.siblings("tr#" + id).length == 1) {
            parent.siblings("tr#" + id).show();
        }
    });

    $(document).on("click", '.notification_delete,.mnotification_delete', function () {
        var cursel = this;
        var value = new Array();
        var j = 0;
        if (cursel.className.split(' ')[0] == 'notification_delete')
        {
            var ids = cursel.id;
            $(".checkbox").each(function () {
                if ($(this).is(":checked"))
                {
                    $(this).removeAttr("checked");

                }
            });
            $("#selectall").removeAttr("checked");
            $("#" + ids).prop("checked", true);
        }

        if ($(".checkbox:checked").length > 0)
        {
            $(".checkbox:checked").each(function () {
                value[j++] = $(this).val();
            });
            if (confirm("Are sure want to delete"))
            {
                $.ajax({
                    type: "GET",
                    url: base_url + '/notification_delete',
                    data: "id=" + value,
                    cache: false,
                    success: function (data) {
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        alert(error);
                    }
                });
            }
        } else
            alert("Please select atleast one")
    });




    $(document).on("click", '.coupons_delete', function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/coupon_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    $('div#accordion').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
    $(document).on("click", '.offers_delete', function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/offer_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    $('div#accordion').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });

    $(document).on("click", '.message_delete', function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/message_delete',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    $('div#accordion').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
    $(document).on("click", '.teams_delete', function () {
        var cursel = $(this);
        if (confirm("Are sure want to delete"))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/ourteam_status',
                data: "id=" + ids,
                cache: false,
                success: function (data) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
    $(document).on("change", '.fanwall_status', function () {
        var cursel = $(this);
        if (confirm("Are sure want to change"))
        {
            var ids = this.id;
            var values = this.value;
            $.ajax({
                type: "GET",
                url: base_url + '/fanwall_status',
                data: "id=" + ids + "&value=" + values,
                cache: false,
                success: function (data) {
                    if (values == -1)
                        $('div#accordion').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
    $(document).on("change", '.feedback_status', function () {
        var status, cursel = $(this), values = this.value;
        if (values == -1)
            status = "Are sure want to delete";
        else
            status = "Are sure want to change the status";

        if (confirm(status))
        {
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/feedback_status',
                data: "id=" + ids + "&value=" + values,
                cache: false,
                success: function (data) {
                    if (values == -1)
                        $('div#accordion').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });

    $(document).on("click", '#search,#reset', function () {
        var name, date,section;
        if (this.id == 'search')
        {
            name = $('#name').val().trim();
            date = $('#datetimepicker').val().trim();
            section = $('#section').val();
            $.ajax({
                type: "GET",
                url: base_url + '/sorting',
                data: "name=" + name + "&date=" + date + "&section=" + section,
                cache: false,
                success: function (data) {
                    $('#sorted_result').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });



        } else {
            $('#name').val('');
            $('#datetimepicker').val('');
            location.reload();
        }

    });
//$(document).on("click", '#reset', function () {
//        $('#name').val('');
//        $('#datetimepicker').val('');
//        });
    /********************************************************************************/
    $(document).on('click', '.service_delete', function ()
    {
        if (confirm("Are you sure?"))
        {
            var sr_id = $(this).attr('name');

            var sr_delete = $.get(base_url + "/deleteservice/" + sr_id);
            sr_delete.done(function (data) {
                $('#show_service_list').html(data);
            });
        }
    });

    $(document).on('click', '.service_edit', function ()
    {
        var sr_id_edit = $(this).attr('name');

        var sr_edit = $.get(base_url + "/editservice/" + sr_id_edit);
        sr_edit.done(function (data) {
            $('#show_service_list').hide();
            $('#show_service_list_edit').html(data);
        });
    });

    /********************************************************************************/

    $(document).on('click', '.loyalty_delete', function ()
    {
        if (confirm("Are you sure?"))
        {
            var lt_id = $(this).attr('name');

            var lt_delete = $.get(base_url + "/deleteloyalty/" + lt_id);
            lt_delete.done(function (data) {
                //window.location.href = "manageloyalty";
                // window.location.hash ="manageloyalty";
                $('#show_loyalty_list').html(data);

            });
        }
    });

    $(document).on('click', '.loyalty_edit', function ()
    {
        var lt_id_edit = $(this).attr('name');

        var lt_edit = $.get(base_url + "/editloyalty/" + lt_id_edit);
        lt_edit.done(function (data) {
            $('#show_loyalty_list').hide();
            $('#show_loyalty_list_edit').html(data);
        });
    });
    /********************************************************************************/
    $(document).on('click', '.event_delete', function ()
    {
        if (confirm("Are you sure?"))
        {
            var ev_id = $(this).attr('name');

            var ev_delete = $.get(base_url + "/deleteevent/" + ev_id);
            ev_delete.done(function (data) {
                $('#show_event_list').html(data);
            });
        }
    });
    $(document).on('click', '.event_edit', function ()

    {
        var ev_id_edit = $(this).attr('name');

        var ev_edit = $.get(base_url + "/editevent/" + ev_id_edit);
        ev_edit.done(function (data) {
            $('#show_event_list').hide();
            $('#show_event_list_edit').html(data);
        });
    });
    /********************************************************************************/
    $(document).on('click', '.language_delete', function ()
    {
        if (confirm("Are you sure?"))
        {
            var lang_id = $(this).attr('name');

            var lang_delete = $.get(base_url + "/deletelanguage/" + lang_id);
            lang_delete.done(function (data) {
                $('#show_language_list').html(data);
            });
        }

    });
    $(document).on('click', '.language_edit', function ()

    {
        var lang_id_edit = $(this).attr('name');

        var lang_edit = $.get(base_url + "/editlanguage/" + lang_id_edit);
        lang_edit.done(function (data) {
            $('#show_language_list').hide();
            $('#show_language_list_edit').html(data);
        });


    });
    /********************************************************************************/
    $(document).on('click', '.langkey_delete', function ()
    {

        if (confirm("Are you sure?"))
        {
            var langkey_id = $(this).attr('name');

            var langkey_delete = $.get(base_url + "/deletelangkey/" + langkey_id);
            langkey_delete.done(function (data) {
                $('#show_langKey_list').html(data);
            });
        }

    });
    $(document).on('click', '.langkey_edit', function ()
    {


        var langkey_id_edit = $(this).attr('name');

        var langkey_edit = $.get(base_url + "/editlangkey/" + langkey_id_edit);
        langkey_edit.done(function (data) {
            $('#show_langKey_list').hide();
            $('#show_langKey_list_edit').html(data);
        });


    });
    /********************************************************************************/
    var id = $("#lang_selected").children(":selected").attr("id");
    $("#lang_selected_id").val(id);
    $("#lang_selected").change(function () {
        var id = $(this).children(":selected").attr("id");
        $("#lang_selected_id").val(id);
    });
    /********************************************************************************/
    $('#event_reservation').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm:ss'});
    /********************************************************************************/
    var doughnutData = [
        {
            value: 1,
            label: "One"
        },
        {
            value: 2,
            label: "Two"
        },
        {
            value: 3,
            label: "Three"
        },
        {
            value: 4,
            label: "Four"
        },
        {
            value: 5,
            label: "Five"
        }

    ];
    $(document).on("click", '#selectall', function () {
        if (this.checked) { // check select status
            $('.checkbox').each(function () { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        } else {
            $('.checkbox').each(function () { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });
        }
    });
    $(document).on("change", '#selectall', function () {
        $(".checkbox").prop('checked', $(this).prop("checked"));
    });

    $(document).on("click", '.checkbox', function () {
        // alert($(".checkbox").length + "----" + $(".checkbox:checked").length);
        if ($(".checkbox").length == $(".checkbox:checked").length) {
            $("#selectall").prop("checked", true);
        } else {
            $("#selectall").removeAttr("checked");
        }
    });
});