@extends ('agency.layout')

@section('styles')

@endsection

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Assigned Busses for Today</h5>
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
					<h6 class="panel-title txt-dark">List of Routes</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Is Assigned</th>
                                        <th>Bus Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($routes) == 0)
                                    <tr>
                                        <th colspan="7" class="text-center">
                                            <strong>
                                                You don't have any routes defined
                                            </strong>
                                        </th>
                                    </tr>
                                    @else
                                        <?php $count = 1; ?>
                                        @foreach($routes as $route)
                                            <tr>
                                                <td> {{ $count++ }} </td>
                                                <td> {{ $route::getLocationName($route->from) }} </td>
                                                <td> {{ $route::getLocationName($route->to) }} </td>
                                                <td> {{ number_format($route->price) }} </td>
                                                <td>
                                                    @if($route->status == 1)
                                                    <div class="badge badge-success">
                                                        Active
                                                    </div>
                                                    @else
                                                    <div class="badge badge-danger">
                                                        Suspended
                                                    </div>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if( $true = $route->isAssigned($date))
                                                    <div class="badge badge-success">
                                                        Assigned
                                                    </div>
                                                    @else
                                                    <div class="badge badge-warning">
                                                        Pending
                                                    </div>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($true)
                                                        @foreach($route->getAssignedBus($date) as $r)
                                                            {{ $r->getBusNumber() }}
                                                        @endforeach
                                                    @endif
                                                </td>

                                                <td>
                                                    <button type="button" name="button"
                                                     data-toggle="modal" data-target=".assign"
                                                     class="btn btn-primary assign_btn"
                                                     data-id1="{{ $route->id }}">
                                                         <i class="fa fa-send"></i>
                                                         Assign
                                                     </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- body end -->

<!-- sample modal content -->
<div class="modal fade assign" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" style="display: none;" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="form-horizontal" action="{{ route('assigned-routes.today.store') }}" method="post">
                @csrf
                <div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    				<h5 class="modal-title" id="myLargeModalLabel">Assign A Bus to this Route</h5>
    			</div>
    			<div class="modal-body">
    				<h5 class="mb-15">Select a Bus from the list of Buses to Assign to this route</h5>

                    <div class="row">
                        <div class="col-md-12">

                            <!-- //hidden form fields -->
                            <input type="hidden" name="route_id" value="" id="route_id">

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Busses
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="bus" >
                                        @foreach($busses as $bus)
                                            <option value="{{ $bus->id }}">
                                                {{ $bus->number }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
    			</div>
    			<div class="modal-footer">
                    <input type="submit" name="save" value="Assign" class="btn btn-primary">
    				<button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
    			</div>
            </form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section("scripts")
<script src="/adminn/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.select2').select2();

        //assign btn
        $(".assign_btn").click(function(){
            var route = $(this).data('id1');
            $('#route_id').val(route);
        });
    });
</script>
@endsection
