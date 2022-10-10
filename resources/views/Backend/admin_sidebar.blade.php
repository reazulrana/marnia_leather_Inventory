<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="/index.html">
          <img src="{{ asset("bootstap_template/theme/images/logo.png") }}" alt="Mono">
          <span style="font-size:0.9rem" class="brand-name">Inventory Management</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-left" data-simplebar style="height: 100%;">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
                    
            {{-- <li class="active">
              <a class="sidenav-item-link" href="index.html">
                <i class="mdi mdi-briefcase-account-outline"></i>
                <span class="nav-text">Business Dashboard</span>
              </a>
            </li>
                  
            <li>
              <a class="sidenav-item-link" href="analytics.html">
                <i class="mdi mdi-chart-line"></i>
                <span class="nav-text">Analytics Dashboard</span>
              </a>
            </li> --}}
          

          

          
            <li class="section-title">
              Apps
            </li>
          

          

          

          
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
                aria-expanded="false" aria-controls="user">
                <i class="fa-solid fa-user"></i>
                <span class="nav-text">User</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="user"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                      <li >
                        <a class="sidenav-item-link" href="{{ route('user.all') }}">
                          <span class="nav-text">All User</span>
                          
                        </a>
                      </li>
{{--                       
                      <li >
                        <a class="sidenav-item-link" href="/register">
                          <span class="nav-text">Create User</span>
                          
                        </a>
                      </li>
                  
                      <li >
                        <a class="sidenav-item-link" href="/updateuserlist">
                          <span class="nav-text">Update User</span>
                          
                        </a>
                      </li>
                    
                      <li >
                        <a class="sidenav-item-link" href="/email-compose.html">
                          <span class="nav-text">Delete User</span>
                          
                        </a>
                      </li> --}}

                  
                </div>
              </ul>
            </li>


 {{-- //Product li section --}}

           
 <li  class="has-sub" >
  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#product"
    aria-expanded="false" aria-controls="email">
    <i class="fa-solid fa-user"></i>
    <span class="nav-text">Product</span> <b class="caret"></b>
  </a>
  <ul  class="collapse"  id="product"
    data-parent="#sidebar-menu">
    <div class="sub-menu">
      
      
        
          <li >
            <a class="sidenav-item-link" href="javascript:void(0)">
              <span class="nav-text">All Products</span>
              
            </a>
          </li>
          
       

      
    </div>
  </ul>
</li>

{{-- //End Product li section --}}


          {{-- //category li section --}}

           
          <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#category"
              aria-expanded="false" aria-controls="email">
              <i class="fa-solid fa-user"></i>
              <span class="nav-text">Category</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="category"
              data-parent="#sidebar-menu">
              <div class="sub-menu">  
                    <li >
                      <a class="sidenav-item-link" href="{{ route('category.list') }}">
                        <span class="nav-text">All Category</span>
                      </a>
                    </li>
                

                
              </div>
            </ul>
          </li>

          {{-- //End category li section --}}

          
          {{-- //Brand li section --}}

           
          <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#brand"
              aria-expanded="false" aria-controls="email">
              <i class="fa-solid fa-user"></i>
              <span class="nav-text">Brand</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="brand"
              data-parent="#sidebar-menu">
              <div class="sub-menu">  
                    <li >
                      <a class="sidenav-item-link" href="{{ route('brand.list') }}">
                        <span class="nav-text">All Brand</span>
                      </a>
                    </li>
                

                
              </div>
            </ul>
          </li>

          {{-- //End Brand li section --}}
          
        </ul>

      </div>

      <div class="sidebar-footer">
        <div class="sidebar-footer-content">
          <ul class="d-flex">
            <li>
              <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a></li>
            <li>
              <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </aside>