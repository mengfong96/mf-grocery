@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Details') }}</div>
                <div class="card-body px-4">
                    {{-- should have only 1 record dunno why is a array --}}
                    @foreach ($product as $p)
                        <p class="title">Details of {{$p->name}}</p>
                        <li>Name: {{$p->name}}</li>
                        <li>Description: {{$p->desc}}</li>
                        <li>Image:</li>
                        <li>Overview:</li>
                        <li>Category: TBC</li>
                    @endforeach
                    <br>
                    <h4 class="title">Add to your grocery list</h4>
                    <p>Recommended Quantity: TBC</p>
                    <form action="{{ route('grocery-lists.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label" for="quantity">Select quantity</label>
                            <select class="form-control" id="quantity" name="quantity">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div>
                            @foreach ($product as $p)
                                <input type="hidden" id="product_id" name="product_id" value="{{$p->id}}">
                            @endforeach
                        </div>
                        <div class="py-2">
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Add
                            </button>
                        </div>
                    </form>
                    <div>
                        <h4 class="title">You might also like</h4>
                        <p>Recommender product to user</p>

                        <p>List of photo hmm</p>
                    </div>


                    <hr>
                    <div>
                        <a
                            class="btn btn-primary"
                            href="{{ url()->previous() }}"
                            style=""
                            >
                            Go back to shopping list
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
