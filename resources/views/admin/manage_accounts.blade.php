@extends ('admin.layout')

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Manage Accounts</h5>
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
					<h6 class="panel-title txt-dark">Administrative  Accounts</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="data">
                                <tr>
                                    <th>S/N</th>
                                    <th>Avatar</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Agency</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>

                                @if(count($accounts) == 0)
                                <tr>
                                    <th class="text-center" colspan="10">
                                        <strong class="text-primary">
                                            No User Accounts yet
                                        </strong>
                                    </th>
                                </tr>
                                @else
                                    <?php $count = 1; ?>

                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>
                                                <img src="{{ asset($account->avatar) }}"
                                                alt="" width="100px" height="100px">
                                            </td>

                                            <td> {{ $account->user_id }} </td>
                                            <td> {{ $account->name }} </td>
                                            <td> {{ $account->username }} </td>
                                            <td> {{ $account->tel }} </td>
                                            <td> {{ $account->email }} </td>
                                            <td> {{ $account::getAgencyName($account->agency_id) }} </td>
                                            <td>
                                                
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

@endsection
