@extends ('agency.layout')

@section('styles')

@endsection

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Assigned Routes</h5>
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
					<h6 class="panel-title txt-dark">Routes with Buses Assigned</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-resoposive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Fair</th>
                                        <th>Bus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($assigned) == 0)
                                        <tr>
                                            <th class="text-center" colspan="10">
                                                <strong class="text-primary">
                                                    No Buses Assigned to any route
                                                </strong>
                                            </th>
                                        </tr>
                                    @else
                                    <?php $count = 1; ?>
                                        @foreach($assigned as $assign)
                                            <tr>
                                                <td> {{ $count++ }}</td>
                                                <td> {{ $assign->date }} </td>
                                                <td> {{ $assign->from_name }} </td>
                                                <td> {{ $assign->to_name }} </td>
                                                <td> {{ $assign->price }} </td>
                                                <td> {{ $assign->getBusNumber() }}</td>
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
@endsection

@section("scripts")

@endsection
