var ajaxtimeout = 20000;

(function ($) {
    $(document).ajaxError(function (event, request, settings, error) {
        bootbox.alert("Terjadi kesalahan dalam pengambilan data");
    });

    // untuk mendapatakan option select
    $.fn.xhrSetOption = function (param, empty, callback) {
        var ajaxurl = xhrfGetURL(param);

        if (!empty)
            empty = false;

        return $(this).each(function () {
            var jqelem = $(this);

            var jqxhr = $.ajax({
                dataType: "json",
                url: ajaxurl,
                timeout: ajaxtimeout
            });
            jqxhr.done(function (data) {
                if (empty === false)
                    jqelem.empty();
                else if (empty === true)
                    jqelem.html('<option value=""></option>');
                else
                    jqelem.html('<option value="">-- Pilih ' + empty + ' --</option>');

                jQuery.each(data.options, function (k, v) {
                    jqelem.append('<option value="' + v.key + '">' + v.value + '</option>');
                });

                // panggil fungsi callback
                if (typeof (callback) == "function")
                    callback();
            });
        });
    }
})(jQuery);

// mendapatkan data
function xhrfGetURL(param) {
    var ajaxurl = g_abs_url + "ajax/";
    if (typeof (param) == "object")
        ajaxurl += param.join("/");
    else
        ajaxurl += param;

    return ajaxurl;
}

function xhrfGetStr(param, callback) {
    var ajaxurl = xhrfGetURL(param);

    var jqxhr = $.ajax({
        url: ajaxurl,
        timeout: ajaxtimeout
    });
    jqxhr.done(function (data) {
        // panggil fungsi callback
        if (typeof (callback) == "function")
            callback(data);
    });
}

function xhrfGetData(param, callback) {
    var ajaxurl = xhrfGetURL(param);

    var jqxhr = $.ajax({
        dataType: "json",
        url: ajaxurl,
        timeout: ajaxtimeout
    });
    jqxhr.done(function (data) {
        // panggil fungsi callback
        if (typeof (callback) == "function")
            callback(data);
    });
}