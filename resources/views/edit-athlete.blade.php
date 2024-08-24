@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Athlete') }}</div>
                @if (session('success'))
                    <div class="p-2"><div class="alert alert-success">{{ session('success') }}</div></div>
                @endif
                @if (session('danger'))
                    <div class="p-2"><div class="alert alert-danger">{{ session('danger') }}</div></div>
                @endif
                <div class="card-body">
                    <form name="add-athlete-form" id="add-athlete-form" method="POST" action="{{route('modify-athlete', $athlete)}}">
                        @CSRF
                        <input type="hidden" value={{ $athlete->id }} name="id">
                        <label>Name: </label><input class="form-control" name="name" value="{{ $athlete->name }}" required>
                        <div><p> </p></div>
                        <label for="isGirl">Girl <input class="form-check-inline" name="isGirl" type="checkbox" @if($athlete->isGirl == 1) checked @endif></label>
                        <hr>
                        <h4>Race Times</h4>
                        <div class="container">
                            <div class="row">
                                <div class="col"><label>100: </label><input class="form-control" type="number" name="time100" step=".01" value="{{ $athlete->time100 % 60 ?: null}}"><p>seconds</p></div>
                                <div class="col"><label>200: </label><input class="form-control" type="number" name="time200" step=".01" value="{{ $athlete->time200 % 60 ?: null}}"><p>seconds</p></div>
                                <div class="col"><label>300: </label><input class="form-control" type="number" name="time300" step=".01" value="{{ $athlete->time300 % 60 ?: null}}"><p>seconds</p></div>     
                            </div>
                            <div class="row">
                                <div class="col"><label>400: </label><input class="form-control" type="number" name="minutes400" value="{{ floor($athlete->time400 / 60) ?: null}}"><p>minutes</p></div>

                                <div class="col"><label></label><input class="form-control" type="number" name="seconds400" step=".01" value="{{ $athlete->time400 % 60 ?: null}}"><p>seconds</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><label>500: </label><input class="form-control" type="number" name="minutes500" value="{{ floor($athlete->time500 / 60) ?: null}}"><p>minutes</p></div>

                                <div class="col"><label></label><input class="form-control" type="number" name="seconds500" step=".01" value="{{ $athlete->time500 % 60 ?: null}}"><p>seconds</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><label>800: </label><input class="form-control" type="number" name="minutes800" value="{{ floor($athlete->time800 / 60) ?: null}}"><p>minutes</p></div>
                                
                                <div class="col"><label></label><input class="form-control" type="number" name="seconds800" step=".01" value="{{ $athlete->time800 % 60 ?: null}}"><p>seconds</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><label>1000: </label><input class="form-control" type="number" name="minutes1000" value="{{ floor($athlete->time1000 / 60) ?: null}}"><p>minutes</p></div>

                                <div class="col"><label></label><input class="form-control" type="number" name="seconds1000" step=".01" value="{{ $athlete->time1000 % 60 ?: null}}"><p>seconds</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><label>1600: </label><input class="form-control" type="number" name="minutes1600" value="{{ floor($athlete->time1600 / 60) ?: null}}"><p>minutes</p></div>

                                <div class="col"><label></label><input class="form-control" type="number" name="seconds1600" step=".01" value="{{ $athlete->time1600 % 60 ?: null}}"><p>seconds</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><label>3200: </label><input class="form-control" type="number" name="minutes3200" value="{{ floor($athlete->time3200 / 60) ?: null}}"><p>minutes</p></div>

                                <div class="col"><label></label><input class="form-control" type="number" name="seconds3200" step=".01" value="{{ $athlete->time3200 % 60 ?: null}}"><p>seconds</p></div>
                           </div>
                            <div class="row">
                                <div class="col"><label>5000: </label><input class="form-control" type="number" name="minutes5000" value="{{ floor($athlete->time5000 / 60) ?: null}}"><p>minutes</p></div>

                                <div class="col"><label></label><input class="form-control" type="number" name="seconds5000" step=".01" value="{{ $athlete->time5000 % 60 ?: null}}"><p>seconds</p></div>
                           </div>
                        </div>

                        <input class="btn btn-success" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection