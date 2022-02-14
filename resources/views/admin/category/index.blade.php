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
                        <table class="datatable table table-striped custom-table id">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Category Name</th>
                                <th>Under Category</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    @if($category->parent_id == 0)
                                        Main Category
                                    @else
                                        {{$category->subCategory->category_name}}
                                    @endif
                                </td>
                                <td>{{$category->order}}</td>
                                <td>
                                    @if($category->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button class=" btn btn-info btn-sm" data-toggle="modal" data-target="#view_category{{$category->id}}">
                                        <i class="fa fa-eye"></i>
                                    </button>

                                    <a href="{{route('category.edit',$category->id)}}">
                                    <button class=" btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    </a>
                                    <a class="btn btn-danger btn-sm deleteRecord" href="javascript:" rel="{{$category->id}}" rel1="delete-category" style="color: white; cursor: pointer;">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>




                            <!-- Add Department Modal -->
                            <div id="view_category{{$category->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title"><strong>{{$category->category_name}} Details</strong></p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{$category->category_name}}</p>
                                            <p>
                                                @if($category->parent_id == 0)
                                                    Main Category
                                                @else
                                                    {{$category->subCategory->category_name}}
                                                @endif
                                            </p>
                                            <p>
                                                @if($category->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </p>
                                            <p>{{ $category->order }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Add Department Modal -->
                            @endforeach
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

    //sweetalert
    <script src="{{asset('public/adminpanel/assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/adminpanel/assets/js/jquery.sweet-alert.custom.js')}}"></script>

    <script>
        $(".deleteRecord").click(function () {
            var SITEURL = '{{URL::to('')}}';
           var id = $(this).attr('rel');
           var deleteFunction = $(this).attr('rel1');
           swal({
              title: "Are You Sure?",
              text: "You will not be able to recover this record again?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, Delete it!",
           },
               function (){
               window.location.href = SITEURL + "/admin/category/" + deleteFunction + "/" + id;
           });
        });
    </script>








    {{--    <script>--}}
{{--       $('.category-datatable').DataTable({--}}
{{--           processing: true,--}}
{{--           serverSide: true,--}}
{{--           sorting: true,--}}
{{--           searchable: true,--}}
{{--           responsiveness:true,--}}
{{--           ajax: "{{ route('category.table') }}",--}}
{{--           columns: [--}}
{{--               {data: 'DT_RowIndex', name: 'DT_RowIndex'},--}}
{{--               {data: 'category_name', name: 'category_name'},--}}
{{--               {data: 'parent_id', name: 'parent_id'},--}}
{{--               {data: 'action', name: 'action',--}}
{{--                   orderable: false--}}
{{--               },--}}
{{--               ]--}}
{{--       });--}}
{{--    </script>--}}
@endsection
