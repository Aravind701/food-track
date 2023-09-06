@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}

        <form action="{{route('track')}}" method="POST">
            @csrf
            <div class="py-4">
                @foreach ($users as $user)
                <div class="row">
                    <div class="form-check form-check-inline">
                        <h3>{{$user->name}}</h3>
                    </div>
                    @foreach ($meals as $meal)
                    <div class="form-check form-check-inline">
                        <label>
                            <input type="checkbox" class = "menu_{{$user->name}} menu_list" data-group="{{$user->name}}"
                            name="meal[{{$user->id}}][]" value="{{$meal->id}}"> {{$meal->name}}
                        </label>
                    </div>
                    @endforeach
                    <div class="form-check form-check-inline">
                    <label><input type="checkbox" class = "group_list" id="{{$user->name}}" data-group="{{$user->name}}"> All</label>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
@section('script')
    <script src="{{ asset('js/track-form.js')}}"></script>
@endsection
