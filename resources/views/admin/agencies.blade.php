@extends ('admin.layout')

@section('styles')

@endsection

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Regiestered Agencies</h5>
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
					<h6 class="panel-title txt-dark">Agencies</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>S/N</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Date Joined</th>
                            <th>Action</th>
                        </tr>
                        @if(!$agencies)
                        <tr>
                            <th class="text-center" colspan="9">
                                <strong class="text-primary">
                                    No Agencies Yet
                                </strong>
                            </th>
                        </tr>
                        @else
                            <?php $count = 1; ?>
                            @foreach($agencies as $agency)
                            <tr>
                                <th>{{$count++}}</th>
                                <th>
                                    <img src="{{ asset($agency->logo) }}" alt="Logo"
                                        width="100px" height="100px">
                                </th>

                                <th>
                                    <strong>{{ $agency->name }}</strong>
                                </th>

                                <th>
                                    @if($agency->status == -1)
                                        <div class="badge badge-danger">
                                            Suspended
                                        </div>
                                    @else
                                        <div class="badge badge-success">
                                            Active
                                        </div>
                                    @endif
                                </th>
                                <th> {{ $agency->created_at->diffForHumans() }} </th>
                                <th>
                                    <a href="{{ route('agency.edit', ['id' => $agency->id]) }}" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                    </a>

                                    @if($agency->status == 1)
                                        <a href="#" data-toggle="tooltip" data-original-title="Suspend Agency"
                                            class="suspend" data-id="{{ $agency->id }}">
                                            <i class="fa fa-close text-warning"></i>
                                        </a>
                                    @else
                                        <a href="#" data-toggle="tooltip" data-original-title="Activate Agency"
                                            class="activate" data-id="{{ $agency->id }}">
                                            <i class="fa fa-check text-success"></i>
                                        </a>
                                    @endif



                                    <a href="#" data-toggle="tooltip" data-original-title="Delete"
                                        class="delete" data-agency="{{ $agency->id }}">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </th>
                            </tr>
                            @endforeach

                        @endif

                    </table>
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

        $(".activate").click(function(){
            var agency = $(this).data("id");
            var url = '/admin/agency/' + agency + '/activate';
            if(confirm("Are you sure You want to activate this agency ?"))
            {
                window.location.href = url;
            }
        });

        $(".suspend").click(function(){
            var agency = $(this).data("id");
            var url = '/admin/agency/' + agency + '/suspend';

            if(confirm("Are you sure you want to suspend this agency ?"))
            {
                window.location.href = url;
            }
        });

        $(".delete").click(function(){
            var agency = $(this).data("agency");
            var url = '/admin/agency/' + agency + '/destroy';

            if(confirm ("Do you want to delete this agency ?"))
            {
                window.location.href = url;
            }
        });
    })
</script>
@endsection
