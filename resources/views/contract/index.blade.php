@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">
                <a href="/contracts/create" class="btn btn-primary float-left">Add Contractor</a>
                <h4 class="text-info text-center">Contractor List</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Type of Company</th>
                            <th>Contact Person</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contractors as $contractor)
                            <tr>
                                <td>{{ $contractor->company_name }}</td>
                                <td>{{ $contractor->companyType['description'] }}</td>
                                <td>{{ $contractor->contact_person_name }}</td>
                                <td>{{ $contractor->contact_number }}</td>
                                <td>{{ $contractor->email }}</td>
                                <td>
                                    @if($status == 'active')
                                        <form action="/contracts/{{$contractor->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-right">Delete</button>
                                        </form>
                                    @else
                                        <form action="/contracts/restore/{{$contractor->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-secondary btn-sm float-right">Restore</button>
                                        </form>

                                    @endif

                                    <a href="/contracts/{{$contractor->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="/works" class="btn btn-primary btn-sm">Works</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    <span class="float-right text-info">Total Records: {{ $contractors->total() }}</span>
                    {{$contractors->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
