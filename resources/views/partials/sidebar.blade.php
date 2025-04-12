<aside class="col-md-2" id="page-sidebar">
          
          <div class="sidebar-widget">
            <div class="additional-header">
              <h3>
                Menu
              </h3>
            </div>

            <ul class="nav">

            @if (Auth::check())

                @if(Auth::user()->roles()->first()->id>1)
                <li><a href="/admin/dash">Home</a></li>
                @else
                <li><a href="/dashboard">Home</a></li>
                @endif

            @else
                <li><a href="/">Home</a></li>
            @endif

              @if(Auth::user()->roles()->first()->id==1)

              <li><a href="/user/{{ Auth::user()->id }}/preferences">User Preferences</a></li>
              @endif
              <li>
                <a href="/about">About</a>
              </li>

              <li>
                <a href="/faq">FAQs</a>
              </li>

              <li>
                <a href="gallery.html">Contact Us</a>
              </li>

            </ul>
          </div>

          
        </aside>