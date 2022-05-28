@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="/themes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/themes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/themes/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title">Showing all categories</h3>

                        </div>
                        <div class="col text-right">
                            <a href="#" class="btn btn-sm btn-primary add-category">Add New</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable_table" class="table table-bordered table-striped datatable_table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="#" class="btn btn-success">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Data Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('settings.category.form')
@endsection

@section('js')
    <script src="/themes/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/themes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/themes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/themes/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/themes/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/themes/plugins/jszip/jszip.min.js"></script>
    <script src="/themes/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/themes/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/themes/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/themes/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/themes/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/js/datatable_init.js"></script>
    <script src="/js/settings/category.js"></script>
@endsection
