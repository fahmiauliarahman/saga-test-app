$(document).ready(function () {
    $(document).on('click', '#btn-logout', function (e) {
        e.preventDefault();
        $("#form-logout").submit();
    });
});
