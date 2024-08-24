@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                <p>Welcome! Here you will be able to select athletes and plan their workout accordingly. You can group together athletes and choose the pace and distance they will run.</p>
                <form name="new-workout-form" id="new-workout-form" method="POST" action="{{route('build-workout')}}">
                    @csrf
                    <div class="card">
                            <div class="card-header">Select Workout</div>
                            <div class="card-body">
                                <div class="form-floating">
                                    <select class="form-select" id="pace_select" name="pace_select">
                                        <option value="tempo">Tempo</option>
                                        <option value="cv">CV</option>
                                        <option value="aerobic-power">Aerobic Power</option>
                                        <option value="vo2-max">V.O2 Max</option>
                                        <option value="at-pace">At Pace</option>
                                    </select>
                                    <input type="range" class="form-range" value="300" min="100" max="5000" step="100" name="distance" id="distance" oninput="this.nextElementSibling.firstElementChild.value = this.value + ' meters'">
                                    <div style="text-align: right;">
                                        <output class="badge text-bg-info row-gap-2">300 meters</output>
                                    </div>
                                    
                                    <label for="distance">Pace</label>

                                    <div>
                                    <input type="radio" class="btn-check" name="pace_distance" id="200" value="200">
                                            <label for="200" class="btn btn-outline-primary">200 time</label>
                                            <input type="radio" class="btn-check" name="pace_distance" id="400" value="400">
                                            <label for="400" class="btn btn-outline-primary">400 time</label>
                                        <input type="radio" class="btn-check" name="pace_distance" id="800" value="800">
                                            <label for="800" class="btn btn-outline-primary">800 time</label>
                                        <input type="radio" class="btn-check" name="pace_distance" id="1600" value="1600">
                                            <label for="1600" class="btn btn-outline-primary">1600 time</label>
                                        <input type="radio" class="btn-check" name="pace_distance" id="3200" value="3200">
                                            <label for="3200" class="btn btn-outline-primary">3200 time</label>
                                        <input type="radio" class="btn-check" name="pace_distance" id="5000" value="5000">
                                            <label for="5000" class="btn btn-outline-primary">5000 time</label>

                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-header">Select Athletes</div>
                            <div class="card-body">
                                <div class="grid">
                                    <div class="row row-cols-auto row-gap-3">
                                        @foreach ($athletes as $athlete)
                                                <div class="col">
                                                    <input type="checkbox" class="btn-check" id="{{$athlete->id}}_toggle" name="athletes[{{$athlete->id}}]" value="{{$athlete->id}}">
                                                    <label class="btn btn-outline-primary" for="{{$athlete->id}}_toggle">{{$athlete->name}}</label>
                                                </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>
                    <input class="btn btn-success" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
