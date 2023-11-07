<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <img width="120px" src="{{ asset('frontend/assets/img/logo/logo.svg')}}" alt="" />
      </a>

 
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        
      <!-- Apps & Pages -->
      <li class="menu-header fw-medium mt-4">
        <span class="menu-header-text">Navigation Menu</span>
      </li>

      <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons mdi mdi-view-dashboard-outline"></i>
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('agents') ? 'active' : '' }}">
        <a href="{{ route('agents') }}" class="menu-link">
          <i class="menu-icon tf-icons mdi mdi-account-star"></i>
          <div data-i18n="Agents">Agents</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('customers') ? 'active' : '' }}">
        <a href="{{ route('customers') }}" class="menu-link">
          <i class="menu-icon tf-icons mdi mdi-account-multiple-outline"></i>
          <div data-i18n="Customers">Customers</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('invoice', 'create', 'preview/*', 'label/*') ? 'open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons mdi mdi-file-document-outline"></i>
          <div data-i18n="Invoice">Invoice</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('invoice') ? 'active' : '' }}">
            <a href="{{ route('invoice') }}" class="menu-link">
              <div data-i18n="List">List</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('create') ? 'active' : '' }}">
            <a href="{{ route('create') }}" class="menu-link">
              <div data-i18n="Create">Create</div>
            </a>
          </li>

          <li class="menu-item {{ request()->is('preview/*') ? 'active' : '' }}">
            <a  href="#" class="menu-link disabled default-curser">
              <div data-i18n="Invoice Preview">Invoice Preview</div>
            </a>
          </li>


          <li class="menu-item {{ request()->is('label/*') ? 'active' : '' }}">
            <a  href="#" class="menu-link disabled default-curser">
              <div data-i18n="Label Preview">Label Preview</div>
            </a>
          </li>
         
        </ul>
    </ul>
  </aside>