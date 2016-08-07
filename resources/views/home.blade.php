@extends('layouts.master')

@section('style')
  @parent
  <style>
  </style>
@stop
@section('content')
    <div class="section-preview">
      <div class="container">
        <div class="row" id="add-user">
            {{-- <users></users> --}}
          <div class="col-lg-4 col-sm-6">
            <div class="preview">
              <div class="image">
                {{-- <div class="panel-overlay-top-right"><img src="build/img/lang/ko.png"/></span></div> --}}
                
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="build/img/cu1.jpg" class="img-responsive" alt="Cerulean"></div>
                        <div class="swiper-slide"><img src="build/img/cu2.jpg" class="img-responsive" alt="Cerulean"></div>
                        <div class="swiper-slide"><img src="build/img/cu3.jpg" class="img-responsive" alt="Cerulean"></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    
                </div>
                
                
                <div class="panel-overlay-bottom-right panel-overlay-label ">¥&nbsp;500</span></div>
                <div class="panel-overlay-bottom-left"><img src="build/img/lang/ko.png"/></span></div>
              </div>
              <div class="options">
                  {{-- Name --}}
                  <h4>切開でいつ番美しい人</h4>
                  {{-- Title --}}
                  <h5>A calm blue sky</h5>
                
                  <div class="row">
                    <div class="col-xs-8 col-sm-8 left">
                        <img src="build/img/favorite.png"><span class="badge badge-black">1,123</span>
                        &nbsp;<img src="build/img/good.png"><span class="badge badge-success">1,123</span>
                        &nbsp;<img src="build/img/bad.png"><span class="badge badge-danger">1,123</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 right">
                        
                        <div class="btn-group">
                          <a class="btn btn-info btn-sm" target="_blank">Cart</a>
                          <a class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu">
                            <li><a target="_blank" href="cerulean/bootstrap.min.css">Info</a></li>
                            <li class="divider"></li>
                            <li><a target="_blank" href="cerulean/bootstrap.min.css">Favorite</a></li>
                          </ul>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
          </div>
     
        </div>
      </div>
    </div>
    
    {{--
    <template id="users-template">
        <div class="col-lg-4 col-sm-6" v-for="user in users">
            <div class="preview">
              <div class="image">
                
                
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="build/img/cu1.jpg" class="img-responsive" alt="Cerulean"></div>
                        <div class="swiper-slide"><img src="build/img/cu2.jpg" class="img-responsive" alt="Cerulean"></div>
                        <div class="swiper-slide"><img src="build/img/cu3.jpg" class="img-responsive" alt="Cerulean"></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    
                </div>
                
                
                <div class="panel-overlay-bottom-right panel-overlay-label ">¥&nbsp;500</span></div>
                <div class="panel-overlay-bottom-left"><img src="build/img/lang/ko.png"/></span></div>
              </div>
              <div class="options">
                
                  <div class="row">
                    <div class="col-xs-8 col-sm-8 left">
                        <img src="build/img/favorite.png"><span class="badge badge-black">1,123</span>
                        &nbsp;<img src="build/img/good.png"><span class="badge badge-success">1,123</span>
                        &nbsp;<img src="build/img/bad.png"><span class="badge badge-danger">1,123</span>
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
    </template>
    --}}
@stop
@section('script')
    @parent
    <!-- Initialize Swiper -->
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
    
    var count = 0;
    $(window).scroll(function(){
        if  ($(window).scrollTop() == $(document).height() - $(window).height()){
            
            $.ajax({
              type: 'GET',
              url: 'https://api.langtal.com/v1/users?page='+count,
              dataType: 'json',
              success: function(json){
                alert(count);
                count++;
                
                html = '<div class="col-lg-4 col-sm-6">'+
                    '<div class="preview">'+
                      '<div class="image">'+
                        '<div class="swiper-container">'+
                            '<div class="swiper-wrapper">'+
                                '<div class="swiper-slide"><img src="build/img/cu1.jpg" class="img-responsive" alt="Cerulean"></div>'+
                                '<div class="swiper-slide"><img src="build/img/cu2.jpg" class="img-responsive" alt="Cerulean"></div>'+
                                '<div class="swiper-slide"><img src="build/img/cu3.jpg" class="img-responsive" alt="Cerulean"></div>'+
                            '</div>'+
                            '<div class="swiper-pagination"></div>'+
                            '<div class="swiper-button-next"></div>'+
                            '<div class="swiper-button-prev"></div>'+
                            
                        '</div>'+
                        
                        
                        '<div class="panel-overlay-bottom-right panel-overlay-label ">¥&nbsp;500</span></div>'+
                        '<div class="panel-overlay-bottom-left"><img src="build/img/lang/ko.png"/></span></div>'+
                      '</div>'+
                      '<div class="options">'+
                          '<h4>切開でいつ番美しい人</h4>'+
                          '<h5>A calm blue sky</h5>'+
                        
                          '<div class="row">'+
                            '<div class="col-xs-8 col-sm-8 left">'+
                                '<img src="build/img/favorite.png"><span class="badge badge-black">1,123</span>'+
                                '&nbsp;<img src="build/img/good.png"><span class="badge badge-success">1,123</span>'+
                                '&nbsp;<img src="build/img/bad.png"><span class="badge badge-danger">1,123</span>'+
                            '</div>'+
                            '<div class="col-xs-4 col-sm-4 right">'+
                                
                                '<div class="btn-group">'+
                                  '<a class="btn btn-info btn-sm" target="_blank">Cart</a>'+
                                  '<a class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" href="#">'+
                                    '<span class="caret"></span>'+
                                  '</a>'+
        
                                  '<ul class="dropdown-menu">'+
                                    '<li><a target="_blank" href="cerulean/bootstrap.min.css">Info</a></li>'+
                                    '<li class="divider"></li>'+
                                    '<li><a target="_blank" href="cerulean/bootstrap.min.css">Favorite</a></li>'+
                                  '</ul>'+
                                '</div>'+
                            '</div>'+
                         '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>';
                
                $('#add-user').append(html);
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
              }
            });
           
        }
    });
    </script>
@stop