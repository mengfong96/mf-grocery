@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Details') }}</div>
                <div class="card-body px-4">

                    <p class="title">Details of {{$product->name}}</p>
                    <li>Name: {{$product->name}}</li>
                    <li>Description: {{$product->desc}}</li>
                    <li>Image:</li>
                    <li>Overview:</li>
                    <li>Category: TBC</li>
                    <br>
                    <h4 class="title">Add to your grocery list</h4>
                    <p>Recommended Quantity: {{$quantity}}</p>
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
                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
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
