<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>@yield('title')</h3>
        <p class="text-subtitle text-muted">@yield('subtitle')</p>
        
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        @yield('breadcrumb')
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
              </ol>
          </nav>
      </div>
  </div>
</div>