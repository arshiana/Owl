@extends('layout.main')
@section('title','book')
@section('content')
<!-- products listing -->

        <div class="row">
            <div class="small-5 small-offset-1 columns" style="position: relative">
                @foreach($books as $book)
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="#">
                             <img src="{{url('images',$book->image)}}"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="small-6 columns">
                <div class="item-wrapper">
                    <h3 class="subheader">
                        <br>{{$book->name}} <br/>
                    </h3>
                        <p class="text-left subheader"> {{$book->description}}</p>
                    <h3>
                        <span class="price-tag">Price:   $  {{$book->price}}</span><br/><br/>
                    </h3>
                    <div class="row">
                        <div class="large-12 columns">
                            <a href="{{route('cart.addItem',$book->id)}}" class="btn  pull-right" style="background-color: #45b3e7 ;color: black">Add to Cart</a>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
@endsection