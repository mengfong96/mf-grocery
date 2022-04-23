@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Grocery List') }}</div>
                <div class="card-body">
                    @if($groceryLists && !empty($groceryLists))
                        @foreach ($groceryLists as $groceryList)
                        <ul>
                            <li>Name: {{ $groceryList->name }}</li>
                            <li>Quantity: {{$groceryList->pivot->quantity}}</li>
                        </ul>
                        @endforeach
                    @else
                        <p>
                            Currently grocery list is empty. You can browse in shopping list and added product will be shown here!
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
