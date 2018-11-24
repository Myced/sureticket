@extends ('agency.layout')

@section('styles')

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
					<h6 class="panel-title txt-dark">Manage Routes</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th class="txt-dark">S/N</th>
                                    <th class="txt-dark">From</th>
                                    <th class="txt-dark">To</th>
                                    <th class="txt-dark">Price</th>
                                    <th class="txt-dark">Status</th>
                                    <th class="txt-dark">Action</th>
                                </tr>

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
                                                <a href="{{ route('route.edit', ['id' => $route->id ]) }}"
                                                    class="btn btn-primary btn-icon-anim btn-square btn-xs"
                                                    title="Edit Route">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <a href="#" data-bus="{{ $route->id }}"
                                                    class="btn btn-danger btn-xs delete btn-icon-anim btn-square"
                                                    title="Delete this bus">
                                                    <i class=" fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

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
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete').click(function(){
            var id = $(this).data('bus');

            if(confirm("Do You want to delete this route ?"))
            {
                url = '/agency/route/' + id + '/destroy';
                window.location.href = url;
            }
        })
    })
</script>
@endsection
