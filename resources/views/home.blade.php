@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>
                <div class="card-body">
                    @if(empty($preference))
                    <p>You have not set the preference yet.</p>
                    @else
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">User Pax</th>
                                <td>{{ $preference->user_pax }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Meal Num</th>
                                <td>{{ $preference->meal_num }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    <div class="col text-center py-1">
                        <a
                            class="btn btn-primary"
                            style="width:150px"
                            href="{{ route('user-preferences.create') }}">
                            Set Preference
                        </a>
                    </div>

                    <div class="col text-center py-1">
                        <a
                            class="btn btn-primary"
                            style="width:150px"
                            href="{{ route('grocery-lists.index') }}">
                            View Grocery List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
