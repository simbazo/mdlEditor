<header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav role="navigation" class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
               <a href="#/" class="navbar-brand">
                  <div class="brand-logo">
                     <img src="{{asset('assets/img/logos/logo1.png')}}" alt="Editot" class="img-responsive">
                  </div>
                  <div class="brand-logo-collapsed">
                     <img src="{{asset('assets/img/logos/logo1.png')}}" alt="Editor" class="img-responsive">
                  </div>
               </a>
            </div>
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
               <!-- START Left navbar-->
               <ul class="nav navbar-nav">
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a href="#" data-trigger-resize="" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                     </a>
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                     </a>
                  </li>
               </ul>
               <!-- END Left navbar-->
               <!-- START Right Navbar-->
               <ul class="nav navbar-nav navbar-right">
                  <!-- Search icon-->
                  <li>
                     <a href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                     </a>
                  </li>
                  <!-- Fullscreen (only desktops)-->
                  <li class="visible-lg">
                     <a href="#" data-toggle-fullscreen="">
                        <em class="fa fa-expand"></em>
                     </a>
                  </li>
                  <!-- END Offsidebar menu-->
               </ul>
               <!-- END Right Navbar-->
            </div>
            <!-- END Nav wrapper-->
            <!-- START Search form-->
            <form role="search" action="search.html" class="navbar-form">
               <div class="form-group has-feedback">
                  <input type="text" placeholder="Type and hit enter ..." class="form-control">
                  <div data-search-dismiss="" class="fa fa-remove form-control-feedback"></div>
               </div>
               <button type="submit" class="hidden btn btn-default">Submit</button>
            </form>
            <!-- END Search form-->
         </nav>
         <!-- END Top Navbar-->
      </header>