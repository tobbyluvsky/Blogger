@extends('admin.includes.admin_design')

@section('title') Categories- {{ config('app.name', 'Laravel') }}@endsection

@section('content')


    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">All Categories</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Categories</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('addCategory') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Category</a>
{{--                        <div class="view-icons">--}}
{{--                            <a href="clients.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>--}}
{{--                            <a href="clients-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <!-- /Page Header -->


            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>S/N/th>
                                <th>Category Name</th>
                                <th>Under Category</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>football</td>
                                <td>sport</td>
                                <td>
{{--                                    <div class="dropdown action-label">--}}
{{--                                        <a href="clients-list.html#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item" href="clients-list.html#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>--}}
{{--                                            <a class="dropdown-item" href="clients-list.html#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    active
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="clients-list.html#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="clients-list.html#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="clients-list.html#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->




    </div>
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->


@endsection

@section('js')
    <!-- Datatable JS -->
    <script src="{{ asset('public/adminpanel/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/adminpanel/assets/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection
