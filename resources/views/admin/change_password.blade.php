@extends('admin.includes.admin_design')

@section('title') Change Password -  {{ config('app.name', 'Laravel') }} @endsection


@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Change Password</h3>
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

                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="current_password">Old Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" id="current_password" name="current_password">
                                </div>
                                <p id="correct_password"></p>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="password">New Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="pass">Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" id="pass" name="confirm_password">
                                </div>
                            </div>
                        </div>



                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->
@endsection

@section('js')

    <script>

        $("#current_password").keyup(function() {
            var current_password = $("#current_password").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '{{ route('checkPass') }}',
                data: {
                    current_password:current_password
                },
                success: function (resp){
                    if(resp=="true"){
                        $("#correct_password").text("Current password matches").css("color", "green");
                    } else if (resp == "false"){
                        $("#correct_password").text("Password does not matches").css("color", "red");

                    }
                }, error: function (resp){
                    alert("not working");
                }

            });

        });


    </script>

@endsection

