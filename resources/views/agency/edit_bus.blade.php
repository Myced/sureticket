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
					<h6 class="panel-title txt-dark">Edit Bus Information</h6>
				</div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('bus.update', ['id' => $bus->id ]) }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Bus Number
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text"  name="number"
                                        class="form-control .input-lg" placeholder="E.g. CE320YU" required
                                        value="{{ $bus->number }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Bus Type
                                </label>
                                <div class="col-sm-8">
                                    <input type="text"  name="type"
                                        class="form-control .input-lg" placeholder="Bus Type"
                                        value="{{ $bus->type }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    N<sup>o</sup>  of Seats
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text"  name="seats"
                                        class="form-control .input-lg" placeholder="Number of Seats E.g. 56"
                                        required value="{{$bus->seats}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Region of Operation
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text"  name="region"
                                        class="form-control .input-lg" placeholder="Main Region of Operation"
                                        required value="{{$bus->region}}">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    Bus State
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="state">
                                        <option value="1" @if($bus->state == 1) {{ __('selected')  }} @endif >Good</option>
                                        <option value="-1" @if($bus->state == -1) {{ __('selected')  }} @endif >Out of Service</option>
                                        <option value="2" @if($bus->state == 2) {{ __('selected')  }} @endif >In Repairs</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    VIP ?
                                </label>
                                <div class="col-sm-8">
                                    <div class="checkbox checkbox-primary">
										<input id="reverse" type="checkbox"
                                            name="vip" @if($bus->vip == TRUE) {{ __('checked') }} @endif>
										<label for="reverse">
											Yes
										</label>
									</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label "
                                    for="example-input-small">
                                    WIFI ?
                                </label>
                                <div class="col-sm-8">
                                    <div class="checkbox checkbox-primary">
										<input id="wifi" type="checkbox"
                                            name="wifi" @if($bus->wifi == TRUE) {{ __('checked') }} @endif >
										<label for="wifi">
											Yes
										</label>
									</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <input type="submit" name="" value="Save Bus"
                                class="btn btn-primary">
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

@endsection
