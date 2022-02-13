@extends('admin.includes.admin_design')

@section('content')

    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Admin Profile Settings</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{route('profileUpdate',$admin->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{$admin->name}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control " value="{{$admin->email}}" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" value="{{$admin->phone}}" type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" value="{{$admin->address}}" type="text" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Profile Image</label>
                                    <input type="hidden" name="current_image" value="{{$admin->image}}">
                                    <input class="form-control" value="" type="file" id="image" name="image" accept="image/*" onchange="readURL(this);" >
                                </div>

                                <img src="{{asset('public/upload/admin/'.$admin->image)}}" style="width: 100px" id="one" alt="">
                            </div>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>

@endsection

@section('js')
    <script>
        function readURL(input){
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#one')
                    .attr('src',e.target.result)
                    .width(100)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
