<div class="modal fade" id="modal-article">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST" id="form-article">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Article Title">
                    </div>
                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Article Title">
                    </div>
                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Article Title">
                    </div>
                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Article Title">
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
