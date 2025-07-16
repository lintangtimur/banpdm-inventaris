<header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <div class="row flex-column flex-md-row flex-fill align-items-center">
                <div class="col">
                  <!-- BEGIN NAVBAR MENU -->
                  <ul class="navbar-nav">
                    <li class="nav-item @if (Route::current()->getName() == 'home') active
                        
                    @endif">
                      <a class="nav-link" href="/">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"
                          ><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-1"
                          >
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg
                        ></span>
                        <span class="nav-link-title"> Home </span>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="./">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-package"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg></span>
                        <span class="nav-link-title"> Stock </span>
                      </a>
                    </li>
                    
                    <li class="nav-item @if (Route::current()->getName() == 'item.index' || Route::current()->getName() == 'category.index' || Route::current()->getName() == 'unit.index' || Route::current()->getName() == 'item.index') active
                        
                    @endif dropdown">
                      <a
                        class="nav-link dropdown-toggle"
                        href="#navbar-form"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        role="button"
                        aria-expanded="false"
                      >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"
                          >
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-database"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0" /><path d="M4 6v6a8 3 0 0 0 16 0v-6" /><path d="M4 12v6a8 3 0 0 0 16 0v-6" /></svg></span>
                        <span class="nav-link-title"> Master </span>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item @if (Route::current()->getName() == 'item.index')
                            active
                        @endif" href="{{ route('item.index') }}"> Item </a>
                        <a class="dropdown-item @if (Route::current()->getName() == 'category.index')
                            active
                        @endif" href="{{ route('category.index') }}"> Category </a>
                        <a class="dropdown-item @if (Route::current()->getName() == 'unit.index')
                            active
                        @endif" href="{{ route('unit.index') }}">
                          Unit
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                      </div>
                    </li>
                    {{-- <li class="nav-item dropdown">
                      <a
                        class="nav-link dropdown-toggle"
                        href="#navbar-extra"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        role="button"
                        aria-expanded="false"
                      >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"
                          ><!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-1"
                          >
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg
                        ></span>
                        <span class="nav-link-title"> Extra </span>
                      </a>
                      <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                          <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./activity.html"> Activity </a>
                            <a class="dropdown-item" href="./chat.html"> Chat </a>
                            <a class="dropdown-item" href="./cookie-banner.html"> Cookie banner </a>
                            <a class="dropdown-item" href="./empty.html"> Empty page </a>
                            <a class="dropdown-item" href="./faq.html"> FAQ </a>
                            <a class="dropdown-item" href="./gallery.html"> Gallery </a>
                            <a class="dropdown-item" href="./invoice.html"> Invoice </a>
                            <a class="dropdown-item" href="./job-listing.html"> Job listing </a>
                            <a class="dropdown-item" href="./license.html"> License </a>
                            <a class="dropdown-item" href="./logs.html"> Logs </a>
                            <a class="dropdown-item" href="./marketing/index.html"> Marketing </a>
                            <a class="dropdown-item" href="./music.html"> Music </a>
                            <a class="dropdown-item" href="./page-loader.html"> Page loader </a>
                          </div>
                          <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./photogrid.html"> Photogrid </a>
                            <a class="dropdown-item" href="./pricing.html"> Pricing cards </a>
                            <a class="dropdown-item" href="./pricing-table.html"> Pricing table </a>
                            <a class="dropdown-item" href="./search-results.html"> Search results </a>
                            <a class="dropdown-item" href="./settings.html"> Settings </a>
                            <a class="dropdown-item" href="./signatures.html">
                              Signatures
                              <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                            </a>
                            <a class="dropdown-item" href="./tasks.html"> Tasks </a>
                            <a class="dropdown-item" href="./text-features.html">
                              Text features
                              <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                            </a>
                            <a class="dropdown-item" href="./trial-ended.html"> Trial ended </a>
                            <a class="dropdown-item" href="./uptime.html"> Uptime monitor </a>
                            <a class="dropdown-item" href="./users.html"> Users </a>
                            <a class="dropdown-item" href="./widgets.html"> Widgets </a>
                            <a class="dropdown-item" href="./wizard.html"> Wizard </a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a
                        class="nav-link dropdown-toggle"
                        href="#navbar-layout"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        role="button"
                        aria-expanded="false"
                      >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"
                          ><!-- Download SVG icon from http://tabler.io/icons/icon/layout-2 -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-1"
                          >
                            <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                            <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                            <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                            <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /></svg
                        ></span>
                        <span class="nav-link-title"> Layout </span>
                      </a>
                      <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                          <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./layout-boxed.html"> Boxed </a>
                            <a class="dropdown-item" href="./layout-combo.html"> Combined </a>
                            <a class="dropdown-item" href="./layout-condensed.html"> Condensed </a>
                            <a class="dropdown-item" href="./layout-fluid.html"> Fluid </a>
                            <a class="dropdown-item" href="./layout-fluid-vertical.html"> Fluid vertical </a>
                            <a class="dropdown-item" href="./layout-horizontal.html"> Horizontal </a>
                            <a class="dropdown-item" href="./layout-navbar-dark.html"> Navbar dark </a>
                          </div>
                          <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./layout-navbar-overlap.html"> Navbar overlap </a>
                            <a class="dropdown-item" href="./layout-navbar-sticky.html"> Navbar sticky </a>
                            <a class="dropdown-item" href="./layout-vertical-right.html"> Right vertical </a>
                            <a class="dropdown-item" href="./layout-rtl.html"> RTL mode </a>
                            <a class="dropdown-item" href="./layout-vertical.html"> Vertical </a>
                            <a class="dropdown-item" href="./layout-vertical-transparent.html"> Vertical transparent </a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a
                        class="nav-link dropdown-toggle"
                        href="#navbar-plugins"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        role="button"
                        aria-expanded="false"
                      >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"
                          ><!-- Download SVG icon from http://tabler.io/icons/icon/puzzle -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-1"
                          >
                            <path
                              d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"
                            /></svg
                        ></span>
                        <span class="nav-link-title"> Plugins </span>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="./charts.html"> Charts </a>
                        <a class="dropdown-item" href="./colorpicker.html"> Color picker </a>
                        <a class="dropdown-item" href="./datatables.html"> Datatables </a>
                        <a class="dropdown-item" href="./dropzone.html"> Dropzone </a>
                        <a class="dropdown-item" href="./fullcalendar.html"> Fullcalendar </a>
                        <a class="dropdown-item" href="./inline-player.html"> Inline player </a>
                        <a class="dropdown-item" href="./lightbox.html"> Lightbox </a>
                        <a class="dropdown-item" href="./maps.html"> Map </a>
                        <a class="dropdown-item" href="./map-fullsize.html"> Map fullsize </a>
                        <a class="dropdown-item" href="./maps-vector.html"> Map vector </a>
                        <a class="dropdown-item" href="./turbo-loader.html"> Turbo loader </a>
                        <a class="dropdown-item" href="./wysiwyg.html"> WYSIWYG editor </a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a
                        class="nav-link dropdown-toggle"
                        href="#navbar-addons"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        role="button"
                        aria-expanded="false"
                      >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"
                          ><!-- Download SVG icon from http://tabler.io/icons/icon/gift -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-1"
                          >
                            <path d="M3 8m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
                            <path d="M12 8l0 13" />
                            <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                            <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" /></svg
                        ></span>
                        <span class="nav-link-title"> Addons </span>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="./icons.html"> Icons </a>
                        <a class="dropdown-item" href="./emails.html"> Emails </a>
                        <a class="dropdown-item" href="./flags.html"> Flags </a>
                        <a class="dropdown-item" href="./illustrations.html"> Illustrations </a>
                        <a class="dropdown-item" href="./payment-providers.html"> Payment providers </a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a
                        class="nav-link dropdown-toggle"
                        href="#navbar-help"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        role="button"
                        aria-expanded="false"
                      >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"
                          ><!-- Download SVG icon from http://tabler.io/icons/icon/lifebuoy -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-1"
                          >
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M15 15l3.35 3.35" />
                            <path d="M9 15l-3.35 3.35" />
                            <path d="M5.65 5.65l3.35 3.35" />
                            <path d="M18.35 5.65l-3.35 3.35" /></svg
                        ></span>
                        <span class="nav-link-title"> Help </span>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener"> Documentation </a>
                        <a class="dropdown-item" href="./changelog.html"> Changelog </a>
                        <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank" rel="noopener"> Source code </a>
                        <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm" target="_blank" rel="noopener">
                          <!-- Download SVG icon from http://tabler.io/icons/icon/heart -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-inline me-1 icon-2"
                          >
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                          </svg>
                          Sponsor project!
                        </a>
                      </div>
                    </li> --}}
                  </ul>
                  <!-- END NAVBAR MENU -->
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </header>