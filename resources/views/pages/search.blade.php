@extends('layouts.search')

@section('query')
    <h4>Search Results For [{{$query}}] : </h4>
@endsection

@section('results')
    @foreach($results as $anime)
        <div class="col-lg-3 col-md-2 col-sm-2">
            <div class="product__item">
                <div class="product__item__pic set-bg" onclick="window.location='';">
                    <img src="{{$anime['img']}}">
                    <a class="overlay" href="{{url('anime/'.$anime['id'].'/'.$anime['url'])}}"></a>
                    <div class="ep">{{$anime['status']}}</div>
                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                </div>
                <div class="product__item__text tooltip-2">
                    <span class="tooltiptext">{{$anime['title']}}</span>
                    <h5><a href="{{url('anime/'.$anime['id'].'/'.$anime['url'])}}" >{{$anime['title']}}</a></h5>
                </div>
            </div>
        </div>
    @endforeach
@endsection

