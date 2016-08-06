@extends('layouts.master')

@section('style')
  @parent
  <style>
  </style>
@stop
@section('content')
    <div class="section-preview">
      <div class="container">
        <div class="row">
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
          <div class="col-lg-4 col-sm-6">
            <div class="preview">
              <div class="image">
                {{-- <div class="panel-overlay-top-right"><img src="build/img/lang/ko.png"/></span></div> --}}
                <a href="cerulean/"><img src="build/img/cu2.jpg" class="img-responsive" alt="Cerulean"></a>
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
          <div class="col-lg-4 col-sm-6">
            <div class="preview">
              <div class="image">
                {{-- <div class="panel-overlay-top-right"><img src="build/img/lang/ko.png"/></span></div> --}}
                <a href="cerulean/"><img src="build/img/cu3.jpg" class="img-responsive" alt="Cerulean"></a>
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
          <div class="col-lg-4 col-sm-6">
            <div class="preview">
              <div class="image">
                {{-- <div class="panel-overlay-top-right"><img src="build/img/lang/ko.png"/></span></div> --}}
                <a href="cerulean/"><img src="build/img/cu1.jpg" class="img-responsive" alt="Cerulean"></a>
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
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div>
            <div class="swiper-slide">Slide 10</div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="container">
      <div class="row center">
          <div class="col-lg-12">
            <div class="bs-component">
              <ul class="pagination">
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
           </div>
        </div>
      </div>
    </div>
    
    
    <!-- main body of our application -->
    <div class="container">
        <users></users>
    </div>
    <template id="users-template">
        <div class="container" id="users">
            <!-- add an user form -->
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Add an User</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="User Name" v-model="user.name">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="User Description" v-model="user.last_login"></textarea>
                        </div>
                        <button class="btn btn-primary" v-on:click="addUser">Submit</button>
                    </div>
                </div>
            </div>
            <!-- show the users -->
            <div class="col-sm-6">
                <div class="list-group">
                    <a href="#" class="list-group-item" v-for="user in users">
                        <h4 class="list-group-item-heading">
                     <i class="glyphicon glyphicon-bullhorn"></i> 
                      @{{ user.name }}
                        </h4>
                        
                        <p class="list-group-item-text" v-if="user.name">@{{ user.name }}</p>
                        <button class="btn btn-xs btn-danger" v-on:click="deleteUser($index)">Delete</button>
                    </a>
                </div>
            </div>
        </div>
    </template>
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
    </script>
@stop