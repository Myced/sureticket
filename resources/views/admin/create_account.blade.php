@extends ('admin.layout')

@section('styles')
<!-- select2 CSS -->
<link href="/agency/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Accounts</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
        </ol>
    </div>
<!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- body  -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
					<h6 class="panel-title txt-dark">Create New User Account</h6>
				</div>
                <div class="clearfix"></div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('account.store') }}"
                        method="post" enctype="multipart/form-data" id="form">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Full Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="name"  value="{{ old('name') }}"
                                            class="form-control .input-lg" placeholder="Full Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block text-danger">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Username
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="username" required id="username"
                                            class="form-control .input-lg" placeholder="username"
                                            value="{{ old('username') }}">
                                        @if ($errors->has('username'))
                                            <span class="help-block text-danger">
                                                {{ $errors->first('username') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Telephone
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="tel" required value="{{ old('tel') }}"
                                            class="form-control .input-lg" placeholder="670 096 095">

                                        @if ($errors->has('tel'))
                                            <span class="help-block text-danger">
                                                {{ $errors->first('tel') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Email
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="email" required value="{{ old('email') }}"
                                            class="form-control .input-lg" placeholder="example@email.com">
                                        @if ($errors->has('email'))
                                            <span class="help-block text-danger">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Password
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="password"  name="password" required id="password" value="{{ old('password') }}"
                                            class="form-control .input-lg" placeholder="At least 6 characters">
                                        @if ($errors->has('password'))
                                            <span class="help-block text-danger">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Repeat Password
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="password"  name="password_confirmation" required id="rpassword"
                                            class="form-control .input-lg" placeholder="Repeat password"
                                            value="{{ old('password-confirm')  }}">


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Account Type:
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="radio radio-info">
											<input type="radio" name="type" id="site_admin" value="1" checked>
											<label for="site_admin" class="txt-dark">
												Site Administrator
											</label>
										</div>

                                        <div class="radio radio-info">
											<input type="radio" name="type" id="agency_admin" value="10" >
											<label for="agency_admin" class="txt-dark">
												Agency Administrator
											</label>
										</div>

                                        <div class="radio radio-info">
											<input type="radio" name="type" id="normal_user" value="100" >
											<label for="normal_user" class="txt-dark">
												Normal User
											</label>
										</div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="agency_layer">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Agency
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <select class=" select2" name="agency">
                                            @foreach($agencies as $agency)
                                            <option value="{{$agency->id}}">
                                                {{ $agency->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Picture
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="profile" value=""
                                        class="form-control" id="image">

                                        <br>
                                        <img src="/uploads/users/avatars/user.png" alt="Profile Picture"
                                        width="150px" height="150px" id="img">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" name="button"
                                    class="btn btn-primary" id="submitbtn">
                                        Create Account
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- body end -->
@endsection

@section("scripts")
<!-- Select2 JavaScript -->
<script src="/agency/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
    $('.select2').select2();

    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#img').attr('src', e.target.result);

          $('#img').hide();
          $('#img').fadeIn(650);

        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#image").change(function() {
      readURL(this);
    });

    //validate usernames and password
    $password = $("#password");
    $rpassword = $("#rpassword");
    $username = $("#username");
    $agency_layer = $("#agency_layer");

    //layouts fields
    $passwordLayout = ("#passwordLayout");
    $rpasswordLayout = $("#rpasswordLayout");
    $usernameLayout = $("#usernameLayout");
</script>
@endsection
