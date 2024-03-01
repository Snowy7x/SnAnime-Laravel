@extends('layouts.index')

@section('latest')
    @foreach($latest as $anime)
        <div class="col-lg-3 col-md-2 col-sm-2">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{$anime['image_url']}}" onclick="window.location='{{url('watch/'.$anime['id'].'/'.$anime['ep_url'])}}';">
                    <div class="ep">{{$anime['number']}}</div>
                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                </div>
                <div class="product__item__text">
                    <ul>
                        <li>Active</li>
                        <li>Movie</li>
                    </ul>
                    <h5><a href="{{url('anime/'.$anime['id'].'/'.$anime['ep_url'])}}">{{$anime['title']}}</a></h5>
                </div>
            </div>
        </div>
    @endforeach
@endsection
