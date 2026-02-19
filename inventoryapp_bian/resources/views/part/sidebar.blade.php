<!-- Sidebar Start -->
<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/" class="text-nowrap logo-img">
            <h3 class="text-primary">{{Auth::user()->name}}</h3>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">MASTER</span>
            </li>
            @if (Auth::check() && Auth::user()->role === 'admin')
            <li class="sidebar-item">
              <a class="sidebar-link" href="/category" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:folder-with-files-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Category</span>
              </a>
            </li>
            @endif
            <li class="sidebar-item">
              <a class="sidebar-link" href="/product" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:box-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Product</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/transaksi" aria-expanded="false">
                <span>
                  <svg
                    class="icon"
                    stroke="currentColor"
                    fill="none"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    height="1em"
                    width="1em"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path
                      d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"
                    ></path>
                  </svg>
                </span>
                <span class="hide-menu">Transaksi</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->