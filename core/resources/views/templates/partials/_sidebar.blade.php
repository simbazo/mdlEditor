<aside class="aside">

   <!-- START Sidebar (left)-->
   <div class="aside-inner">
      <nav data-sidebar-anyclick-close="" class="sidebar">
         <!-- START sidebar nav-->
         <ul class="nav">
            <!-- START user info-->
            <li class="has-user-block">
               <div >
                  <div class="item user-block">
                     <!-- User picture-->
                     <div class="user-block-picture">
                        <div class="user-block-status">
                           @if(Auth::check())
                           <img src="{{ asset( Auth::user()->avatar != '' ? 'assets/img/uploads/'.Auth::user()->avatar : 'assets/img/uploads/no-image.jpg') }}"  width="60" height="60" class="img-thumbnail img-circle" alt="User Image"/>
                           @endif
                           <div class="circle circle-success circle-lg"></div>
                        </div>
                     </div> 
                     <!-- Name and Job-->
                     <div class="user-block-info">
                        <a href="{{route('profile')}}"><span class="user-block-name">Hello, {{auth()->user()->first_name}}</span></a>
                     </div>
                  </div>
               </div>
            </li>

            <!-- END user info-->
            <!-- Iterates over all sidebar items-->

            <li class=" {{ Request::is('/') ? 'active' : '' }}">
               <a href="{{route('dashboard')}}">
                  <em class="icon-speedometer"></em>
                  <span data-localize="sidebar.nav.DASHBOARD">PROJECT LIST</span>
               </a>
            </li>
            <li class="nav-heading ">
               <span data-localize="sidebar.heading.HEADER">Project Navigation</span>
                  </li><!--
                  <li class=" ">
                     <a href="{{route('projects.index')}}">
                        <em class="icon-puzzle"></em>
                        <span data-localize="sidebar.nav.PROJECTS">Projects</span>
                     </a>
                  </li>-->
                  {{-- @if(Session::has('urlKey'))
                  <li class="{{ Request::is('pcontent/*') ? 'active' : '' }} ">
                     <a href="{{route('pcontent',Session::get('urlKey'))}}">
                        <em class="fa fa-list-alt"></em>
                        <span data-localize="sidebar.nav.Tasks">Navigator</span>
                     </a>
                  </li>
                @endif --}}<!--
                  <li class="{{ Request::is('tasks') ? 'active' : '' }} ">
                     <a href="{{route('tasks.index')}}">
                        <em class="icon-list"></em>
                        <span data-localize="sidebar.nav.Tasks">Tasks</span>
                     </a>
                  </li>-->
                  <li class="{{ Request::is('products') ? 'active' : '' }} ">
                     <a href="{{route('products.index')}}">
                        <em class="icon-puzzle"></em>
                        <span data-localize="sidebar.nav.Tasks">PRODUCTS</span>
                     </a>
                  </li>
                  <li class="{{ Request::is('files') ? 'active' : '' }} ">
                     <a href="{{url('files')}}">
                        <em class="fa fa-file-pdf-o"></em>
                        <span data-localize="sidebar.nav.Tasks">FILES</span>
                     </a>
                  </li>
                  <li class="{{ Request::is('forms/*') ? 'active' : '' }} ">
                     <a href="{{url('forms')}}">
                        <em class="fa fa-foursquare"></em>
                        <span data-localize="sidebar.nav.Tasks">FORMS</span>
                     </a>
                  </li>
                  <li class=" {{ Request::is('users') ? 'active' : '' }}">
                     <a href="{{route('users.index')}}">
                        <em class="icon-people"></em>
                        <span data-localize="sidebar.nav.USERS">USERS</span>
                     </a>
                  </li>
                  <li class="sidebar-subnav-header">
                     <a href="{{route('logout')}}" title="Logout">
                        <em class="icon-power"></em>
                        <span data-localize="sidebar.nav.LOGOUT">LGOUT</span>
                     </a>
                  </li>
               </ul> 
               
               <!-- END sidebar nav-->
            </nav>
         </div>
         <!-- END Sidebar (left)-->
      </aside>