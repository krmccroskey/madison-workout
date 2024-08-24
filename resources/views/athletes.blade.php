@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Athletes') }}</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="p-2"><div class="alert alert-success">{{ session('success') }}</div></div>
                    @endif
                    @if (session('danger'))
                        <div class="p-2"><div class="alert alert-danger">{{ session('danger') }}</div></div>
                    @endif
                    <table class='table'>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Retire</th>
                        </tr>
                    @foreach ($athletes as $athlete)
                        <tr>
                            <td>{{$athlete->name}}</td>
                            <td><a type="button" class='btn btn-info' href="{{route('edit-athlete', $athlete)}}">Edit</a></td>
                            <td>
                                <a href="{{route('delete-athlete', $athlete)}}" class="btn btn-danger" onclick="
                                    var result = confirm('Are you sure you want to retire this athlete?');
                                    
                                    if(result){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$athlete->id}}').submit();
                                    }">
                                    Retire
                                </a>
                                <form method="GET" id="delete-form-{{$athlete->id}}" action="{{route('delete-athlete', $athlete)}}">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    
                    @endforeach
                    </table>
                    <a type="button" class='btn btn-success' href="{{ route('add-athlete') }}">Add Athlete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
