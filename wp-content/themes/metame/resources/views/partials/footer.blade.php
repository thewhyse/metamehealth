<footer class="page-footer content-info">
  <div class="@if( is_page_template( 'views/template-fullwidth.blade.php' ) ) container-fluid-with-padding @else container-fluid container-xl @endif">
    <div class="row">
      <div class="col-12 col-lg-11">
        @php dynamic_sidebar('sidebar-footer') @endphp
        <div class="row">
          <div class="col-12 col-lg-11">
            @php dynamic_sidebar('sidebar-footer') @endphp
            <div id="mmh-office-address">
              <span>metaMe Health Inc</span>
              <span>222 Merchandise Mart Plz, Suite 1230 Chicago, IL 60654</span>
              <span><a href="mailto: info@metameconnect.com" style="color: #54534a;">info@metameconnect.com</a></span>
            </div>
          </div>
          <div class="col-12 col-lg-11">
            <hr>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-11">
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-11">
        <div class="row">
          <div class="col-12 col-lg-6">
            @if (has_nav_menu('footer_navigation'))
              {!! wp_nav_menu( [ 'theme_location' => 'footer_navigation', 'menu_class' => 'nav-footer' ] ) !!}
            @endif
          </div>
          <div class="copyright col-12 col-lg-6 align-self-center align-self-lg-end">
            {!! App::siteFooterCopyright() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
