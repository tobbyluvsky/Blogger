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
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Categories</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('category.index') }}" class="btn add-btn"><i class="fa fa-eye"></i> View Category</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="col-md-12">

                @include('admin.includes._message')

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="parent_id">Under Category</label>
                                            <select name="parent_id" id="parent_id" class="select form-control">
                                                <option value="0" >Main Category</option>

                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="order">Priority Order</label>
                                        <input type="number" class="form-control" id="order" name="order">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"  checked name="status">
                                    <label class="form-check-label" for="invalidCheck">
                                        Active
                                    </label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
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
@endsection
