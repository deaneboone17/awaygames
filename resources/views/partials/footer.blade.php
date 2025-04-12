
<footer id="main-footer">
  <div class="container menu-container">
    <div class="row">
      <div class="col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-sm-4 col-xs-6 footer-menu">
            <h3><span>Menu</span></h3>
            <ul class="unstyled">
              
                @if (Auth::check())

                @if(Auth::user()->roles()->first()->id>1)
                <li><a href="/admin/dash"><i class="material-icons">home</i>Home</a></li>
                @else
                <li><a href="/dashboard"><i class="material-icons">home</i>Home</a></li>
                @endif

            @else
                <li><a href="/"><i class="material-icons">home</i>Home</a></li>
            @endif
            

              <li>
                <a href="/about">
                  <i class="material-icons">supervisor_account</i>
                  About Us</a>
              </li>
              <li>
                <a href="/faq">
                  <i class="material-icons">question_answer</i>
                  FAQ
                </a>
              </li>
              <li>
                <a href="/contact">
                  <i class="material-icons">contact_mail</i>
                  Contact
                </a>
              </li>
              
            </ul>
          </div><!-- footer menu -->

          

          <div class="col-sm-4 col-xs-6 footer-menu">
            <h3><span>Contact Us</span></h3>
            
            <a href="/contact">
                AwayGames<br/>
                7800 York Road<br/>
                Towson, MD 21204<br/><br/>
                Tel: 456-121-1122<br/><br/>
                email: awaygames2017@gmail.com
                </a>
              
          </div><!-- footer menu -->

          <div class="col-sm-4 hidden-xs footer-menu">
            <h3><span>Policy</span></h3>
            <ul class="unstyled">
              <li>
                <a href="/terms">
                  <i class="material-icons">business_center</i>
                  Terms and Conditions
                </a>
              </li>
              <li>
                <a href="/privacy">
                  <i class="material-icons">lock</i>
                  Privacy
                </a>
              </li>
              <li>
                <a href="/attributions">
                  <i class="material-icons">insert_photo</i>
                  Photo Attributions
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>



      
    </div>
  </div>

  <div class="copyright-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          AwayGames. Copyright &copy; 2017. All Rights Reserved

        </div>
      </div>
    </div>
  </div>
</footer>


<div class="modal fade zoom-out" id="purchaseModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal example</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          This is a modal with costom transitions. You can choose from 'zoom-out' 'move-horizontal' & 'newspaper-effect'.
        </p>

        <p>
          Below are some are some other home page variants that you can use -
        </p>

        <ul>
          <li>
            <a href="index.html">
              Default home page with 2
            </a>
          </li>
          <li>
            <a href="index-2.html">
              Home page for software products
            </a>
          </li>
          <li>
            <a href="index-3.html">
              Home page for Mobile apps
            </a>
          </li>
        </ul>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
  <script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true
      
    });
  });
  </script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


