@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card w-75">
            <div class="card-header">
                <a href="/works" class="btn btn-primary float-left">Back</a>
                <h3 class="text-center text-info">Update Work</h3>
            </div>
            <div class="card-body">

                <form method="POST" action="/works/{{$work->id}}">
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                        <label for="short_desc" class="label col-form-label col-md-4 text-md-right">Short Desc.</label>
                        <div class="col-md-6">
                            <input type="text" name="short_desc" id="short_desc" class="form-control @error('short_desc') is-invalid @enderror" placeholder="Short desc" value="{{$work->short_description ?  $work->short_description : old('short_desc') }}">

                            @error('short_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="long_desc" class="label col-form-label col-md-4 text-md-right">Long Desc.</label>
                        <div class="col-md-6">
                            <input type="text" name="long_desc" id="long_desc" class="form-control @error('long_desc') is-invalid @enderror" placeholder="Long desc" value="{{$work->long_description ?  $work->long_description : old('long_desc') }}">

                            @error('long_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="start_date" class="label col-form-label col-md-4 text-md-right">Start Date</label>
                        <div class="col-md-6">
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" placeholder="Start date" value="{{$work->start_date ?  $work->start_date : old('start_date') }}">

                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="completion_date" class="label col-form-label col-md-4 text-md-right">Completion Date</label>
                        <div class="col-md-6">
                            <input type="date" name="completion_date" id="completion_date" class="form-control @error('completion_date') is-invalid @enderror" placeholder="Completion date" value="{{$work->completion_date ?  $work->completion_date : old('completion_date') }}">

                            @error('completion_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="penalty_rate" class="label col-form-label col-md-4 text-md-right">Penalty Rate</label>
                        <div class="col-md-6">
                            <input type="text" name="penalty_rate" id="penalty_rate" class="form-control @error('penalty_rate') is-invalid @enderror" placeholder="Penalty rate" value="{{$work->penalty_rate ?  $work->penalty_rate : old('penalty_rate') }}">

                            @error('penalty_rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="contractor" class="label col-form-label col-md-4 text-md-right">Contractor</label>
                        <div class="col-md-6">

                            <select name="contractor" id="contractor" class="form-control">
                                @foreach ($contractors as $contractor)
                                    <option value="{{ $contractor->id }}" @if($contractor->id == $work->contractor_id) {{ 'selected' }} @endif>{{ $contractor->contact_person_name }}</option>
                                @endforeach
                            </select>

                            @error('contractor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="addr_1" class="label col-form-label col-md-4 text-md-right">Address 1</label>
                        <div class="col-md-6">
                            <input type="text" name="addr_1" id="addr_1" class="form-control @error('addr_1') is-invalid @enderror" placeholder="Address 1" value="{{$work->addr_1 ?  $work->addr_1 : old('addr_1') }}">

                            @error('addr_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="addr_2" class="label col-form-label col-md-4 text-md-right">Address 2</label>
                        <div class="col-md-6">
                            <input type="text" name="addr_2" id="addr_2" class="form-control @error('addr_2') is-invalid @enderror" placeholder="Address 2" value="{{$work->addr_2 ?  $work->addr_2 : old('addr_2') }}">

                            @error('addr_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="city" class="label col-form-label col-md-4 text-md-right">City</label>
                        <div class="col-md-6">
                            <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="City" value="{{$work->city ?  $work->city : old('city') }}">

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="state" class="label col-form-label col-md-4 text-md-right">State</label>
                        <div class="col-md-6">
                            <input type="text" name="state" id="state" class="form-control @error('state') is-invalid @enderror" placeholder="State" value="{{$work->state ?  $work->state : old('state') }}">

                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="country" class="label col-form-label col-md-4 text-md-right">Country</label>
                        <div class="col-md-6">
                            <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" placeholder="Country" value="{{$work->country ?  $work->country : old('country') }}">

                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="road_type" class="label col-form-label col-md-4 text-md-right">Road Type</label>
                        <div class="col-md-6">

                            <select name="road_type" id="road_type" class="form-control">
                                @foreach ($roadTypes as $roadType)
                                    <option value="{{ $roadType->id }}" @if($roadType->id == $work->road_type_id) {{ 'selected' }} @endif>{{ $roadType->description }}</option>
                                @endforeach
                            </select>

                            @error('road_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="expiry_date" class="label col-form-label col-md-4 text-md-right">Expiry Date</label>
                        <div class="col-md-6">
                            <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" placeholder="Expiry date" value="{{$work->expiry_date ?  $work->expiry_date : old('expiry_date') }}">

                            @error('expiry_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
