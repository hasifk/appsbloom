$(function () {
    $('.to_ck').each(function () {

        CKEDITOR.replace($(this).attr('id'));
    });

    var l = window.location;
    base_url = l.protocol + "//" + l.host;


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


    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive: true});

    /********************************************************************************/
});