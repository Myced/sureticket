@extends ('agency.layout')

@section('styles')

@endsection

@section("content")
<!-- title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Bookings Today</h5>
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
					<h6 class="panel-title txt-dark">List of Bookings for Today</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Transaction ID</th>
                                <th>User ID</th>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Seat #</th>
                                <th>Bus #</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>0343</td>
                                <td>ST90E900</td>
                                <td>12/12/2018</td>
                                <td>Yaounde</td>
                                <td>Bamenda</td>
                                <td>43</td>
                                <th>NW1223E</th>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>03673</td>
                                <td>ST90E900</td>
                                <td>12/12/2018</td>
                                <td>Buea</td>
                                <td>Bamenda</td>
                                <td>4</td>
                                <th>NW423E</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- body end -->
@endsection

@section("scripts")

@endsection
