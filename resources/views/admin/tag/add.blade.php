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
                        <h3 class="page-title">Create Tags</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Tags</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('tag.index') }}" class="btn add-btn"><i class="fa fa-eye"></i> View Tag</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="col-md-12">

                @include('admin.includes._message')

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('tag.store') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="tag_name">Tag Name</label>
                                        <input type="text" class="form-control" id="tag_name" name="tag_name">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
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
