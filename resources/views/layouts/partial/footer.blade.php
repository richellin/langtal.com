<footer class="footer">
    <ul class="list-inline pull-right locale">
    <li><i class="fa fa-language"></i></li>
    @foreach (['en' => 'English', 'ko' => '한국어'] as $locale => $language)
      <li class="{{ ($locale == $currentLocale) ? 'active' : '' }}">
        <a href="{{ route('web.home.locale', ['locale' => $locale, 'return' => urlencode($currentUrl)]) }}">
          {{ $language }}
        </a>
      </li>
    @endforeach
  </ul>
    
    <div class="container">
        <div class="row">
          <div class="col-lg-6 col-xs-6">
              &copy; {{ date('Y') }} &nbsp; by langtal
          </div>
          <div class="col-lg-4 col-xs-4">
              <div id="fb-root"></div>
              <script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.7&appId=1644382895817428";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-like" data-href="https://langtal.com/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
          </div>
          <div class="col-lg-2 col-xs-2 right">
              <a type="button" id="back-to-top" href="#" class="btn btn-sm btn-danger back-to-top" title="Top">
                <i class="fa fa-chevron-up"></i>
              </a>
          </div>
      </div>
  </div>
    
</footer>


