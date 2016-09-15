@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @if($auctionList->isEmpty())
                    <h1 class="notification-big text-center">No Results Found</h1>
                    <a href="{{URL::previous()}}" class="pill center btn btn-success">Go Back</a>
                @endif

                <ul class="small-block-grid-4">
                    @foreach($auctionList as $auction)
                        <li>
                            <a href="{{ action('AuctionController@show',$auction->id) }}" class="item-box">

                                <div class="image-box" style="background-image: url('{{ $auction->image }}')"></div>

                                <div class="details-box">
                                    <b>{{ $auction->variety->name }} ({{ $auction->variety->product->name }})</b>
                                    <small>Sold By {{ $auction->seller->name }}</small>
                                    <h4>Rs.{{ $auction->base_price }}</h4>
                                    <h2  class="btn btn-md btn-success">View Item</h2>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@stop