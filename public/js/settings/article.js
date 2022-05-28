let method;
const wrapper = $(".detail_item_wrapper");

$(document).ready(function () {
    $(document).on("click", ".add-article", e => {
        e.preventDefault();
        const formid = "#form-article";
        const modal = $("#modal-article");
        resetForm(formid);
        $(`${formid} input[name=_method]`).val("POST");
        $(formid).attr("action", `${base_url}/settings/article`);
        $(`#modal-article .modal-title`).text('Add Article');
        modal.modal("show");
    });

    $(document).on("click", ".edit-article", function (e) {
        e.preventDefault();
        const formid = "#form-article";
        const me = $(this);
        const modal = $("#modal-article");
        const id = me.data("id");
        const name = me.data("title");
        const slug = me.data("slug");
        const content = me.data("content");
        const banner = me.data("banner");
        const category = me.data("category");

        resetForm(formid);
        $(`${formid} input[name=_method]`).val("PUT");
        $(formid).attr("action", `${base_url}/settings/article/${id}`);
        $(`#modal-article .modal-title`).text(`Edit Article: ${name}`);
        $("#title").val(name);
        modal.modal("show");
    });

    $(document).on("click", ".delete-article", function (e) {
        e.preventDefault();
        const me = $(this);
        const id = me.data("id");
        const name = me.data("title");
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
                $.post(`${base_url}/settings/article/${id}`, data).done(function () {
                    swal("Deleted!", "Item deleted successfully!", "success");
                    location.reload();
                });
            }
        });
    });
});
