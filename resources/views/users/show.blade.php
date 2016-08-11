@extends('layouts.master')

@section('style')
  @parent
  <style>
  .swiper-slide {
        display: inline-block;
        height: 100%;
        vertical-align: middle;
    }
  </style>
@stop
@section('content')
    
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
          {{ Session::get('flash_message') }}
        </div>
        <hr>
      @endif

    <div class="section-preview">
      <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="preview">
                  <div class="image">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            
                            @for ($i = 1; $i <= 3; $i++)
                                {{--*/ $img = "img{$i}"; /*--}}
                                <div class="swiper-slide">
                                    @if ($user->$img !== '')
                                        <a href="/img/{{ $user->id }}/b_{{ $user->$img }}" data-lightbox="{{ $user->id }}" data-title="{{ $img }}">
                                            <img src="/img/{{ $user->id }}/m_{{ $user->$img }}" class="img-responsive">
                                        </a>
                                    @else
                                        <a href="/build/img/b_no_img.jpg" data-lightbox="{{ $user->id }}" data-title="{{ $img }}">
                                            <img src="/build/img/b_no_img.jpg" class="img-responsive">
                                        </a>
                                    @endif
                                    
                                </div>
                            @endfor
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        
                    </div>
                    
                    
                    <div class="panel-overlay-bottom-right panel-overlay-label ">¥&nbsp;500</span></div>
                    <div class="panel-overlay-bottom-left"><img src="/build/img/lang/ko.png"/></span></div>
                  </div>
                  <div class="options">
                      <h4>{{$user->name}}</h4>
                      <h5>{{$user->name}}</h5>
                    
                      <div class="row">
                        <div class="col-xs-8 col-sm-8 left">
                            <img src="/build/img/favorite.png"><span class="badge badge-black">1,123</span>
                            &nbsp;<img src="/build/img/good.png"><span class="badge badge-success">1,123</span>
                            &nbsp;<img src="/build/img/bad.png"><span class="badge badge-danger">1,123</span>
                        </div>
                        <div class="col-xs-4 col-sm-4 right">
                            
                            <div class="btn-group">
                              <a class="btn btn-info btn-sm" target="_blank">Cart</a>
                              <a class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="caret"></span>
                              </a>
    
                              <ul class="dropdown-menu">
                                <li><a target="_blank" href="cerulean/bootstrap.min.css" v-on:click="deleteUser($index)">Info</a></li>
                                <li class="divider"></li>
                                <li><a target="_blank" href="cerulean/bootstrap.min.css" v-on:click="deleteUser($index)">Favorite</a></li>
                              </ul>
                            </div>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    @parent
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 1,
            paginationClickable: true,
            spaceBetween: 30,
            preloadImages: false,
            lazyLoading: true,
            loop: true
        });
        
        lightbox.option({
          'wrapAround': true,
          'showImageNumberLabel': false
        })
    </script>
@stop