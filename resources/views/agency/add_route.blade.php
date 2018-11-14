@extends ('agency.layout')

@section('styles')
<!-- select2 CSS -->
<link href="/agency/vendors/bower_components/select2/dist/css/select2.min.css"
    rel="stylesheet" type="text/css"/>
@endsection

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Routes</h5>
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
					<h6 class="panel-title txt-dark">Add New Route</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('route.store') }}" method="post"
                id="form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    From
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="from" id="from">
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">
                                                {{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    To
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="to" id="to">
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">
                                                {{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Price (Fair)
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text"  name="price" required
                                        class="form-control .input-lg" placeholder="e.g. 5000">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Status
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <div class="radio radio-info">
                                        <input type="radio" name=status id="active" value="1" checked>
                                        <label for="active">
                                            Active
                                        </label>
                                    </div>

                                    <div class="radio radio-info">
                                        <input type="radio" name="status" id="suspended" value="-1" >
                                        <label for="suspended">
                                            Suspended
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Create Reverse Route ?
                                </label>
                                <div class="col-sm-8">
                                    <div class="checkbox checkbox-primary">
										<input id="reverse" type="checkbox" checked="checked"
                                            name="reverse">
										<label for="reverse">
											Yes
										</label>
									</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                </label>
                                <div class="col-sm-8">
                                    <input type="submit" name="" value="Update Route"
                                    class="btn btn-primary">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
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
    $(document).ready(function(){
        $('.select2').select2();

        $("#form").submit(function(e){
            var from = $("#from").val();
            var to = $("#to").val();

            if(from === to)
            {
                alert ("From and to cannot be the same");
                e.preventDefault();
            }
        });
    })
</script>
@endsection
