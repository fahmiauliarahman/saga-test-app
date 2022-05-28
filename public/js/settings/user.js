let method;
const wrapper = $(".detail_item_wrapper");

$(document).ready(function () {
    $(document).on("click", ".add-user", e => {
        e.preventDefault();
        const formid = "#form-user";
        const modal = $("#modal-user");
        resetForm(formid);
        $(`${formid} input[name=_method]`).val("POST");
        $(formid).attr("action", `${base_url}/settings/user`);
        $(`#modal-user .modal-title`).text('Add User');
        $(".passwd-inp").show();

        modal.modal("show");
    });

    $(document).on("click", ".edit-user", function (e) {
        e.preventDefault();
        const formid = "#form-user";
        const me = $(this);
        const modal = $("#modal-user");
        const id = me.data("id");
        const name = me.data("name");
        const email = me.data("email");
        const role_id = me.data("role");

        resetForm(formid);
        $(`${formid} input[name=_method]`).val("PUT");
        $(formid).attr("action", `${base_url}/settings/user/${id}`);
        $(`#modal-user .modal-title`).text(`Edit User: ${name}`);
        $(".passwd-inp").hide();
        $("#name").val(name);
        $("#email").val(email);
        $("#role_id").val(role_id);
        modal.modal("show");
    });

    $(document).on("click", ".delete-user", function (e) {
        e.preventDefault();
        const me = $(this);
        const id = me.data("id");
        const name = me.data("name");
        swal({
            title: `Do you really want to delete ${name}?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                const data = {
                    _token: token,
                    _method: 'DELETE',
                };
                $.post(`${base_url}/settings/user/${id}`, data).done(function () {
                    swal("Deleted!", "Item deleted successfully!", "success");
                    location.reload();
                });
            }
        });
    });
});
