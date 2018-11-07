@extends ('agency.layout')

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Locations</h5>
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
					<h6 class="panel-title txt-dark">Add Location</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('locations.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Location Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text"  name="name" required
                                        class="form-control .input-lg" placeholder="e.g. Baffoussam">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                </label>
                                <div class="col-sm-8">
                                    <input type="submit" name="save" value="Save"
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
