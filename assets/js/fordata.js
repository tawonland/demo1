var formdata;

var btnclick;

$(document).ready(function () {
    formdata = $("#form_data");

    $("[data-type='save']").click(function () {
        if (cekRequired(formdata)) {
            goSubmit(formdata, "save");
        }
    });

    // disable button jika diclick
    $("button:not(.close)").bind("click", function () {
        btnclick = $(this);
    });

});

function cekRequired(elem, tag) {
    var error = false;
    var target;

    if (tag)
        target = $(elem).parents(tag).eq(0);
    else
        target = getForm(elem);

    target.find(".required:not([readonly])").each(function () {
        var val = $(this).val();

        if (val != null) {
            val = val.trim();

            if (val.length == 0) {
                if (!error)
                    error = $(this);
                $(this).parent().addClass("has-error");
            } else
                $(this).parent().removeClass("has-error");
        }
    });

    if (error) {
        bootbox.alert("Mohon mengisi isian yang bergaris merah");
        error.focus();

        return false;
    } else
        return true;
}

function goSubmit(elem, act) {

    // simpan nilai scroll dulu
    localStorage.setItem("scroll", $(window).scrollTop());

    elem = $(elem); // diperlukan di bawah
    var form = getForm(elem);

    if (act)
        form.find("#act").val(act);

    // cek format laporan
    if ($("#format").length == 0 || $("#format").val() == "html") {
        if (elem.is("button") && !elem.is("[data-active]"))
            elem.prop("disabled", true);
        else if (btnclick && !btnclick.is("[data-active]"))
            btnclick.prop("disabled", true);
    }

    form.submit();
    
}

function getForm(elem) {
    elem = $(elem);

    if (elem.is("form"))
        return elem;
    else
        return elem.parents("form").eq(0);
}