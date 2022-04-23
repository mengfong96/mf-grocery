@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Grocery List') }}</div>
                <div class="card-body">

                        @foreach ($lists as $list)
                        <ul>
                            <li>Name: {{ $list->name }}</li>
                            <li>Quantity: {{$list->pivot->quantity}}</li>
                        </ul>
                        @endforeach

                    {{--
                        temporary just display what is in here.
                            - this list will added from product details page
                        --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
