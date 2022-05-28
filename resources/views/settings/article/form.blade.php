<div class="modal fade" id="modal-article">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST" id="form-article" enctype="multipart/form-data">
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
                        <label for="article_content">Article Content</label>
                        <textarea class="form-control" id="article_content" rows="3" name="article_content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="banner">Banner (Select file to change)</label>
                        <br>
                        <img class="sample-img" src="{{$article->banner}}" alt="banner" style="max-width: 100px;"
                             class="my-2">
                        <br>
                        <input type="file" class="form-control" id="banner" name="banner" placeholder="Banner">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Article Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
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
