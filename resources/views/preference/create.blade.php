@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Set Preference') }}</div>
                <div class="card-body">
                    @if(!$preference)
                    <form action="{{ route('user-preferences.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label mt-4" for="inputDefault">User Pax</label>
                            <input type="text" class="form-control" placeholder="Input user pax" name="user_pax" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label mt-4" for="inputDefault">Meal Number</label>
                            <input type="text" class="form-control" placeholder="Input meal number" name="meal_num" required>
                        </div>
                        <div class="card-body">
                            <div class="col text-center">
                                <button type="submit" style="width:150px" class="btn btn-primary">Add Preference</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('user-preferences.update', ['user_preference'=>$preference->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label mt-4" for="inputDefault">User Pax</label>
                            <input type="text" class="form-control" placeholder="Input user pax" value="{{$preference->user_pax}}" name="user_pax" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label mt-4" for="inputDefault">Meal Number</label>
                            <input type="text" class="form-control" placeholder="Input meal number" value="{{$preference->meal_num}}" name="meal_num" required>
                        </div>
                        <div class="card-body">
                            <div class="col text-center">
                                <button type="submit" style="width:150px" class="btn btn-primary">Update Preference</button>
                            </div>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
