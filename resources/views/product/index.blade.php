@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Shopping List') }}</div>
                <div class="card-body">
                    <ul>
                        @foreach ($products as $product)
                        <li>{{ $product->name }}
                            <span>
                                <a
                                    class="btn-sm btn-outline"
                                    style="width:150px"
                                    href="{{ route('products.show', ['product'=>$product->id]) }}">
                                    View Details
                                </a>
                            </span>
                        </li>

                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
