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