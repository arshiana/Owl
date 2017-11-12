@extends('layout.main')
@section('title','Books')
@section('content')

    <br>
    <br>
    <h1>
        {{$category->name}}
    </h1>
            <div class="row">
                @if($category->products->count())
                    @foreach($category->products as  $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="item-wrapper">
                        <div class="img-wrapper">
                            <a href="#">
                                <img src="{{url('images',$product->image)}}"/>
                            </a>
                        </div>
                        <a href="{{route('book',$product->id)}}">
                            <h3>
                                {{$product->name}}
                            </h3>
                        </a>
                        <h5>
                            {{$product->price}}
                        </h5>
                        <a class="btn" style="background-color: black; color: #5bc0de" href="{{route('cart.addItem',$product->id)}}">
                            Add to Cart
                        </a>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>

@endsection