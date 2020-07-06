@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card w-75">
            <div class="card-header">
                <a href="/contracts" class="btn btn-primary float-left">Back</a>
                <h3 class=" text-info text-center">Contractor Details</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="/contracts">
                    @csrf

                    <div class="row form-group">
                        <label for="company_name" class="label col-form-label col-md-4 text-md-right">Company Name</label>
                        <div class="col-md-8">
                            <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" placeholder="Enter company name">

                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} </strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="company_type" class="label col-form-label col-md-4 text-md-right">Company Type</label>
                        <div class="col-md-8">
                            <select name="company_type" id="company_type" class="form-control @error('company_type') is-invalid @enderror" value="{{ old('company_type') }}">
                                @foreach ($companyTypes as $companyType)
                                    <option value="{{ $companyType->id }}"> {{ $companyType->description }} </option>
                                @endforeach
                            </select>

                            @error('company_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} </strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="contact_person" class="label col-form-label col-md-4 text-md-right">Contact Person</label>
                        <div class="col-md-8">
                            <input type="text" name="contact_person" id="contact_person" class="form-control @error('contact_person') is-invalid @enderror" placeholder="Enter contact person name" value="{{ old('contact_person') }}">

                            @error('contact_person')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} </strong>
                                </span>
                            @enderror

                        </div>
                    </div>


                    <div class="row form-group">
                        <label for="contact_number" class="label col-form-label col-md-4 text-md-right">Contact Number</label>
                        <div class="col-md-8">
                            <input type="text" name="contact_number" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" placeholder="Enter contact number" value="{{ old('contact_number') }}">

                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} </strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="email" class="label col-form-label col-md-4 text-md-right">Email</label>
                        <div class="col-md-8">
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} </strong>
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
