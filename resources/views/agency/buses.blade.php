@extends ('agency.layout')

@section('styles')

@endsection

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Buses</h5>
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
					<h6 class="panel-title txt-dark">Our Buses</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th class="txt-dark">S/N</th>
                                    <th class="txt-dark">Bus Number</th>
                                    <th class="txt-dark">Seats</th>
                                    <th class="txt-dark">Region</th>
                                    <th class="txt-dark">VIP </th>
                                    <th class="txt-dark">WIFI</th>
                                    <th class="txt-dark">Bus State</th>
                                    <th class="txt-dark">Action</th>
                                </tr>

                                @if(count($buses) == 0)
                                <tr>
                                    <th colspan="9" class="text-primary txt-dark">
                                        <strong>No Buses</strong>
                                    </th>
                                </tr>
                                @else
                                <?php $count = 1; ?>
                                    @foreach($buses as $bus)
                                        <tr>
                                            <td class="txt-dark"> {{ $count++ }} </td>
                                            <td class="txt-dark"> {{ $bus->number }} </td>
                                            <td class="txt-dark"> {{ $bus->seats }} </td>
                                            <td class="txt-dark"> {{ $bus->region }} </td>
                                            <td>
                                                @if($bus->vip == true)
                                                <div class="badge badge-success">
                                                    VIP
                                                </div>
                                                @endif
                                            </td>

                                            <td>
                                                @if($bus->wifi == true)
                                                <div class="badge badge-success">
                                                    WIFI
                                                </div>
                                                @endif
                                            </td>

                                            <td>
                                                @if($bus->state == 1)
                                                <div class="badge badge-success">
                                                    Good
                                                </div>
                                                @elseif($bus->state == -1)
                                                <div class="badge badge-danger">
                                                    Out of Service
                                                </div>
                                                @elseif($bus->state == 2)
                                                <div class="badge badge-warning">
                                                    In Repairs
                                                </div>
                                                @else
                                                <div class="badge badge-info">
                                                    Unknown
                                                </div>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('bus.edit', ['id' => $bus->id ]) }}" data-bus="{{ $bus->id }}"
                                                    class="btn btn-primary btn-icon-anim btn-square btn-xs"
                                                    title="Edit Bus information">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <a href="#" data-bus="{{ $bus->id }}"
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

            if(confirm("Do You want to delete this bus ?"))
            {
                url = '/agency/bus/' + id + '/destroy';
                window.location.href = url;
            }
        })
    })
</script>
@endsection
