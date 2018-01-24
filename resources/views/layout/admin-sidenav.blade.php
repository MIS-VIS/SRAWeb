<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
  <div class="aside-content-wrapper">
    <div class="aside-content bg-primary-500 text-auto">
        <div class="aside-toolbar">
            <div class="logo">
                <span class="logo-icon">S</span><span class="logo-text">SRA</span>
            </div>
            <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block"
                    data-fuse-aside-toggle-fold>
                <i class="icon icon-backburger"></i>
            </button>
        </div>
        
        <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">
          
          <li class="subheader">
              <span>Navigation</span>
          </li>

          @if(Auth::check())

            @foreach (Auth::user()->menu as $menu) 

              @if($menu->is_dropdown == false)

                <li class="nav-item">
                    <a class="nav-link ripple {!! NavHelper::menuStatus($menu->route ,'active') !!}" href="{{ route($menu->route) }}"
                       data-page-url="/user-interface-page-layouts-blank.html">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->name }}</span>
                    </a>
                </li>

              @else

                <li class="nav-item" role="tab">
                    <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#{{ $menu->data_target }}" href="#" aria-expanded="false" aria-controls="collapse-dashboards">
                      <i class="{{ $menu->icon }}"></i>
                      <span>{{ $menu->name }}</span>
                    </a>

                    <ul id="{{ $menu->data_target }}" class="collapse {!! NavHelper::menuStatus($menu->route, 'show') !!}" role="tabpanel" aria-labelledby="heading-dashboards" data-children=".nav-item">

                        @foreach($menu->submenu as $submenu)

                          <li class="nav-item">
                            <a class="nav-link ripple {!! NavHelper::menuStatus($submenu->route, 'active') !!}" href="{{ route($submenu->route) }}">
                                  <span>{{ $submenu->name }}</span>
                              </a>
                          </li>

                        @endforeach

                    </ul>
                  </li>

              @endif

            @endforeach

          @endif

      </ul>
    </div>
  </div>
</aside>