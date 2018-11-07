@extends ('admin.layout')

@section('styles')

@endsection

@section("content")
    <!-- title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Add Agency</h5>
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
    <form class="form-horizontal" action="{{ route("agency.update", ['id' => $agency->id]) }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Agency Information</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Agency Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="name" required value="{{ $agency->name }}"
                                            class="form-control .input-lg" placeholder="Agency Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"
                                        for="example-input-small">
                                        Status
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="radio radio-info">
											<input type="radio" name=status id="active" value="1"
                                            @if($agency->status == 1)
                                                {{ __('checked') }}
                                            @endif
                                            >
											<label for="active">
												Active
											</label>
										</div>

                                        <div class="radio radio-info">
											<input type="radio" name="status" id="suspended" value="-1"
                                                @if($agency->status == -1)
                                                {{ __('checked') }}
                                                @endif
                                            >
											<label for="suspended">
												Suspended
											</label>
										</div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                        Logo
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="file"  name="logo" id="image"
                                            class="form-control .input-lg" placeholder="Logo">

                                        <br>
                                        <div class="priview">
                                            <img src="{{ asset($agency->logo) }}"
                                            alt="" id="img" width="150px" height="150px" style="border: 2px solid blue;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label "
                                        for="example-input-small">
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="submit" name="sumbit" value="Add Agency"
                                        class="btn btn-primary">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!-- body end -->
@endsection

@section("scripts")
<script type="text/javascript">
    $(document).ready(function(){
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
    });
</script>

@endsection
