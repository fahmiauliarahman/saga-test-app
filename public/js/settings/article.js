let method;
const wrapper = $(".detail_item_wrapper");

$(document).ready(function () {
    $(document).on("click", ".add-category", e => {
        e.preventDefault();
        const formid = "#form-category";
        const modal = $("#modal-category");
        resetForm(formid);
        $(`${formid} input[name=_method]`).val("POST");
        $(formid).attr("action", `${base_url}/settings/category`);
        $(`#modal-category .modal-title`).text('Add Category');
        modal.modal("show");
    });

    $(document).on("click", ".edit-category", function (e) {
        e.preventDefault();
        const formid = "#form-category";
        const me = $(this);
        const modal = $("#modal-category");
        const id = me.data("id");
        const name = me.data("name");

        resetForm(formid);
        $(`${formid} input[name=_method]`).val("PUT");
        $(formid).attr("action", `${base_url}/settings/category/${id}`);
        $(`#modal-category .modal-title`).text(`Edit Category: ${name}`);
        $("#category_name").val(name);
        modal.modal("show");
    });

    $(document).on("click", ".delete-category", function (e) {
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
                $.post(`${base_url}/settings/category/${id}`, data).done(function () {
                    swal("Deleted!", "Item deleted successfully!", "success");
                    location.reload();
                });
            }
        });
    });
});
