var formdata;
var formdatadet;

$(function () {
    formdata = $("#form_data");
    formdatadet = $("#form_datadet");

    $("#form_data input,#form_data textarea, #form_data select").change(function () {
        id = $(this).attr("name");
        validate(id);
    });

     $("[data-type='save']").click(function () {
        if (cekRequired(formdata)) {
            bootbox.confirm("Apakah anda yakin akan menyimpan data ini?", function (result) {
                if (result) {
                    goSubmit(formdata, "save");
                }
            });
        }
    });

});