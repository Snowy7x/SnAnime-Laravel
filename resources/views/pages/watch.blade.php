@extends('layouts.watch')
@section('content')
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__servers__list">
                        <div class="section-title">
                            <h5 class="noselect">Watching Servers</h5>
                        </div>
                        @foreach($servers as $server)
                        <a class="noselect server-item" data-ep-url="{{$server['url']}}">{{$server['name']}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                            <div tabindex="0"
                                 class="plyr plyr--full-ui plyr--video plyr--html5 plyr--fullscreen-enabled plyr--paused plyr--stopped plyr--pip-supported plyr--captions-enabled">
                                <div class="plyr__video-wrapper">
                                    <iframe id="watch-frame" src="https://moshahda.online:2053/embed-pky79541wlr0.html" frameborder="0" allowfullscreen="">
                                    </iframe>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>List Name</h5>
                        </div>
                        <a href="#">Ep 01</a>
                        <a href="#">Ep 02</a>
                        <a href="#">Ep 03</a>
                        <a href="#">Ep 04</a>
                        <a href="#">Ep 05</a>
                        <a href="#">Ep 06</a>
                        <a href="#">Ep 07</a>
                        <a href="#">Ep 08</a>
                        <a href="#">Ep 09</a>
                        <a href="#">Ep 10</a>
                        <a href="#">Ep 11</a>
                        <a href="#">Ep 12</a>
                        <a href="#">Ep 13</a>
                        <a href="#">Ep 14</a>
                        <a href="#">Ep 15</a>
                        <a href="#">Ep 16</a>
                        <a href="#">Ep 17</a>
                        <a href="#">Ep 18</a>
                        <a href="#">Ep 19</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection

