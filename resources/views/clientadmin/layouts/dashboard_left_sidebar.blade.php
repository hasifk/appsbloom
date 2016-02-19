<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('assets/clientassets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <!--   <ul class="treeview-menu">
                <li><a href="{{ url('/apptype') }}"><i class="fa fa-circle-o"></i> App type</a></li>
                <li><a href="{{ url('/appinfo') }}"><i class="fa fa-circle-o"></i> App Info</a></li>
              </ul> -->
            </li>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>CMS Pages </span>
                <span class="label label-primary pull-right">8</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/manageabout') }}"><i class="fa fa-circle-o"></i>About Us</a></li>
                <li><a href="{{ url('/manageservices') }}"><i class="fa fa-circle-o"></i>Services</a></li>
            <li><a href="{{ url('/managecontact') }}"><i class="fa fa-circle-o"></i> Contact us</a></li>
              <li><a href="{{ url('/manageschedule') }}"><i class="fa fa-circle-o"></i>Opening Hours & Days</a></li>
                 <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Gallery</a></li>
                  <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Find us</a></li>
                  <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Price list</a></li>
                  <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>News</a></li>
              </ul>
           
            </li>


            <li class="treeview">
              <a href="{{ url('/manageloyalty') }}">
                <i class="fa fa-files-o"></i>
                <span>Loyalty System</span>
               
              </a>
            
            </li>

             

               <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Push Notifications </span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/apptype') }}"><i class="fa fa-circle-o"></i>Appsinfo</a></li>
                <li><a href="{{ url('/appinfo') }}"><i class="fa fa-circle-o"></i>AppContent</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Services</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Contact us</a></li>
                 <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Gllery</a></li>
              </ul>
            </li>

                 <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Booking & Appointments </span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/apptype') }}"><i class="fa fa-circle-o"></i>Appsinfo</a></li>
                <li><a href="{{ url('/appinfo') }}"><i class="fa fa-circle-o"></i>AppContent</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Services</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Contact us</a></li>
                 <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Gllery</a></li>
              </ul>
            </li>

                 <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Coupons</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/apptype') }}"><i class="fa fa-circle-o"></i>Appsinfo</a></li>
                <li><a href="{{ url('/appinfo') }}"><i class="fa fa-circle-o"></i>AppContent</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Services</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Contact us</a></li>
                 <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Gllery</a></li>
              </ul>
            </li>

                 <li class="treeview">
              <a href="{{ url('/manageevents') }}">
                <i class="fa fa-files-o"></i>
                <span>Events</span>
                <span class="label label-primary pull-right"></span>
              </a>
           </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Languages</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/managelanguages') }}"><i class="fa fa-circle-o"></i>Languages</a></li>
                <li><a href="{{ url('/managelangkeys') }}"><i class="fa fa-circle-o"></i>Language-Keys</a></li>
                
                
              </ul>
            </li>
             <li class="treeview">
              <a href="{{ url('/manageanalytics') }}">
                <i class="fa fa-files-o"></i>
                <span>Analytics</span>
                <span class="label label-primary pull-right"></span>
              </a>
           </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>