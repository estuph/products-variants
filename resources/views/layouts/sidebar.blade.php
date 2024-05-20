<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
      <a href="{{ url('/') }}">MyApp</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('/') }}">MA</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      
      <li><a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
      <li class="menu-header">Management</li>
      
      <li><a class="nav-link" href="{{ route('products.index') }}"><i class="fas fa-box"></i> <span>Products</span></a></li>
      {{-- <li><a class="nav-link" href="{{route('products.variants.index')}}"><i class="fas fa-boxes"></i> <span>Variants</span></a></li> --}}
      <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-boxes"></i> <span>Variants</span></a>
          <ul class="dropdown-menu">
              @foreach(App\Models\Products::all() as $products)
                  <li><a class="nav-link" href="{{ route('products.variants.index', $products->id) }}">{{ $products->name }}</a></li>
              @endforeach
          </ul>
      </li>
      
      <li><a class="nav-link" href="{{ route('products.variants.list') }}"><i class="fas fa-list"></i> <span>Product & Variant List</span></a></li>
  </ul>
  <ul class="sidebar-menu">
      <li class="menu-header">System</li>
     
      <li><a class="nav-link" href=" {{route('users.index')}}"><i class="fa fa-users"></i> <span>User</span></a></li>
      <li><a class="nav-link" href="#"><i class="fas fa-cog"></i> <span>Setting</span></a></li>
  </ul>
</aside>