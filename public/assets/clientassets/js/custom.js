$(document).ready(function () {
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

    $(".room_focus").on("mouseover", function () {
        var cursel = $(this);
        var parent = cursel.parent('tr');
        var id = parent.attr('id');
        parent.siblings("tr.others").hide();
        if (parent.siblings("tr#" + id).length == 1) {
            parent.siblings("tr#" + id).show();
        }
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
        var status,cursel = $(this),values = this.value;
        if(values==-1)
            status="Are sure want to delete";
        else
            status="Are sure want to change the status";
        
        if (confirm(status))
        {   
            var ids = this.id;
            $.ajax({
                type: "GET",
                url: base_url + '/feedback_status',
                data: "id=" + ids + "&value=" + values,
                cache: false,
                success: function (data) {
                    if(values == -1)
                    $('div#accordion').html(data);
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
});
$(function () {
    $('.ck_edit').each(function () {
        CKEDITOR.replace($(this).attr('id'));
    });
});