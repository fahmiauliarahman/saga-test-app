const base_url = `${window.location.origin}`;

$(document).ready(function () {
    $(document).on('click', '#btn-logout', function (e) {
        e.preventDefault();
        $("#form-logout").submit();
    });
});

function resetForm(formid, file_label = '.custom-file-label') {
    const form = $(formid);
    form.trigger("reset");
    $(file_label).text("Pilih File");
}
