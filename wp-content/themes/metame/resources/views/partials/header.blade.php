<a class="skip-main" href="#main-content" aria-label="Go to main content">Skip to main content</a>
<header class="banner bg-secondary">
  <div class="eyebrow-section">
    @php dynamic_sidebar('sidebar-before-header') @endphp
  </div>
  <nav id="site-navbar" class="navbar navbar-expand-xl alignfull ">
    <a class="brand navbar-brand" href="{{ home_url('/') }}" aria-label="Site logo">{!! \App\Controllers\App::siteLogo() !!}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navPrimaryMenu" aria-controls="navPrimaryMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse nav-primary justify-content-end " id="navPrimaryMenu">
      @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'add_li_class' => 'nav-item', 'link_class' => 'nav-link']) !!}
      @endif

      <div class="footer-menu-mobile d-xl-none">
        @php dynamic_sidebar('sidebar-menu') @endphp
      </div>
    </div>
  </nav>
</header>


