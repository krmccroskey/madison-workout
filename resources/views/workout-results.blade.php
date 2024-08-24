@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Athletes') }}</div>
                <div class="card-body">
                    <div class="p-2"><div class="alert alert-success">Workout Created Successfully!</div></div>
                    <table class='table'>
                        <tr>
                            <th>Name</th>
                            <th>Time</th>
                        </tr>
                    @foreach ($athlete_times as $athlete)
                        <tr>
                            <td>{{$athlete[0]}}</td>
                            <td>{{$athlete[1]}}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                <div>
                    <h3>Raw Text for copying</h3>
                    <div class="card">
                        <table>
                            @foreach ($athlete_times as $athlete)
                                <tr>
                                    <td>{{$athlete[0]}}</td>
                                    <td> -- </td>
                                    <td>{{$athlete[1]}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
