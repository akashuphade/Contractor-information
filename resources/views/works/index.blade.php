@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">
                <a href="/works/create" class="btn btn-primary float-left">Add Work</a>
                <h4 class="text-info text-center">Work List</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Work No</th>
                            <th>Short Desc</th>
                            <th>Long Desc</th>
                            <th>Start Date</th>
                            <th>Completion Date</th>
                            <th>Penalty rate</th>
                            <th>Contractor</th>
                            <th>address 1</th>
                            <th>address 2</th>
                            <th>Location</th>
                            <th>Road Type</th>
                            <th>Expiry Date</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($works as $work)
                        <tr>
                            <td>{{$work->id}}</td>
                            <td>{{$work->short_description}}</td>
                            <td>{{$work->long_description}}</td>
                            <td>{{$work->start_date}}</td>
                            <td>{{$work->completion_date}}</td>
                            <td>{{$work->penalty_rate}}</td>
                            <td>{{$work->contract->contact_person_name}}</td>
                            <td>{{$work->addr_1}}</td>
                            <td>{{$work->addr_2}}</td>
                            <td>{{$work->city . ", " . $work->state . ", " . $work->country}}</td>
                            <td>{{$work->roadType->description}}</td>
                            <td>{{$work->expiry_date}}</td>
                            <td>
                                @if($status == 'active')
                                        <form action="/works/{{$work->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-right">Delete</button>
                                        </form>
                                    @else
                                        <form action="/works/restore/{{$work->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-secondary btn-sm float-right">Restore</button>
                                        </form>

                                    @endif

                                    <a href="/works/{{$work->id}}/edit" class="btn btn-primary btn-sm">Edit</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>

                </div>
            </div>
        </div>
    </div>
@endsection
