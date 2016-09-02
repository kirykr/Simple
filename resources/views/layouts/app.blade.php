<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommcerce</title>
     <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/libs.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/style.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/rating.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/my_star_rating.css')}}">
    <script src="{{asset('js/libs.js')}}"></script>
    <!-- Bootstrap Core CSS -->
    <style>
        html {
            font-family: 'Lato', 'Sans', 'Arial';
        }
        body {
                margin: 0;
                padding: 0;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            
            .fa-btn {
            margin-right: 6px;
            }

            .thinFont {
                font-family: 'Lato', 'Sans', 'Arial';
                font-size: 40px; 
                font-weight: 700;
            }
            ul.nav li a {
                font: 500 15px / 24px Arial;
                /*border-bottom: 2px groove lightgray;*/
                text-shadow: 0px 0px 0.5px rgba(150, 150, 150, 1);
            }
            .list-special .list-group-item borderless:first-child {
              border-top-right-radius: 0px !important;
              border-top-left-radius: 0px !important;
            }

            .list-special .list-group-item borderless:last-child {
              border-bottom-right-radius: 0px !important;
              border-bottom-left-radius: 0px !important;
            }
            a.borderless { border-top: 0 none; padding-top: 0px}
            a.borderless:first-child{
                padding-top: 15px
            }
            .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
                min-height: 1px;
                padding-right: 5px !important;
                padding-left: 5px !important;
                position: relative;
            }
            * {
                box-sizing: border-box;
            }
            .dropdown:hover .dropdown-menu {
                display: block;
            }
            .popover{
                max-width: 1200px; /* Max Width of the popover (depending on the container!) */
                 top: 75px !important;
                 left: 32px !important;
            }
/*            .pop li:a:hover {
                cursor: pointer;
            }*/
            .loginOut{
                width: 210px !important;
                left: -47px !important;
            }
            .menu-pic {
                width: 900px !important;
                left: -290px !important;
            }
            #InputAmount {
                width: 400px;
                height: 46px;
            }
            .addToCart {
                font: 700 14px / 17px Arial !important;
            }
            .label-pill {
                padding-left: .6em !important;
                padding-right: .6em !important;
                border-radius: 10rem !important;
            }
            .badge-notify{
                position: relative;
                top: -15px;
                left: -10px;
            }
    </style>
</head>
<body id="app-layout">
    <div class="row well" style="margin-bottom: 0px !important; padding: 10px 0px">
    <div class="container">
        <div class="col-md-12"><span>Phone orders: +(855) 23 232 222 | Email us: <a href="#">ecomm@shop.com</a></span> <span class="pull-right">Currency: <a href="#">Riels</a> / <a href="#">USD</a></span></div>
        </div>
    </div>
{{-- end top bar --}}
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px !important;">
        <div class="container">
        
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 20px;text-shadow: 0px 0px 5px rgba(150, 150, 150, 1); font-weight: 700">
                    <i class="fa fa-home fa-fw"></i><span style="color: #5daad0">e</span>Commerce sl5
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    {{-- <li><a href="{{ url('/home') }}">Home</a></li> --}}
                        <li style="cursor: pointer"> <a class="pop" data-container="body" data-toggle="popover" data-placement="bottom" data-content="
                        <div class=&quot; row &quot;>
                            <div class=&quot; col-md-1 &quot;></div>
                            <div class=&quot; col-md-2 &quot;>
                                 <a href=&quot;#&quot;>
                                <img src=&quot;/images/menupic/all_Laptops.jpg&quot; alt=&quot; &quot;>
                                     <p class=&quot; text-center &quot;>All Laptops</p>
                                </a>
                            </div>
                            <div class=&quot; col-md-2 &quot;>
                                 <a href=&quot;#&quot;>
                                <img src=&quot;/images/menupic/Laptops_traditional.jpg&quot; alt=&quot; &quot;>
                                     <p class=&quot; text-center &quot;>Traditional Laptops</p>
                                </a>
                            </div>
                            <div class=&quot; col-md-2 &quot;>
                                 <a href=&quot;#&quot;>
                                <img src=&quot;/images/menupic/Laptop_PC.jpg&quot; alt=&quot; &quot;>
                                     <p class=&quot; text-center &quot;>PCs Laptops</p>
                                </a>
                            </div>
                           <div class=&quot; col-md-2 &quot;>
                                 <a href=&quot;#&quot;>
                                <img src=&quot;/images/menupic/Laptops_2in1.jpg&quot; alt=&quot; &quot;>
                                     <p class=&quot; text-center &quot;>2in1 Laptops</p>
                                </a>
                            </div>
                           <div class=&quot; col-md-2 &quot;>
                                 <a href=&quot;#&quot;>
                                <img src=&quot;/images/menupic/Laptops_Mac book.jpg&quot; alt=&quot; &quot;>
                                     <p class=&quot; text-center &quot;>Mac book Laptops</p>
                                </a>
                            </div>
                        </div>
                        "
                        data-original-title="" title="">
                        <i class="fa fa-laptop fa-fw"></i> Laptop <span class="caret"></span>
                        </a> 
                    </li>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-desktop fa-fw"></i> Desktop <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu menu-pic" role="menu" style="width: 700px">
                                <li>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/all_Desktops.jpg" alt="" style="margin-left: 0px;">
                                                <p class="text-center">All Desktop</p>
                                            </a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Desktops_tower2.jpg" alt="">
                                                <p class="text-center">Desktop tower</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Desktops_pc.jpg" alt="">
                                                <p class="text-center">Desktop PC</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Desktops_all_in_one.jpg" alt="">
                                                <p class="text-center">Desktop all-in-one</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Desktops_mini.jpg" alt="">
                                                <p class="text-center">Desktop Minis</p>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </li>
                            </ul>
                        </li>
                     <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-headphones fa-fw"></i> Accessory <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu menu-pic" role="menu" style="width: 700px">
                                <li>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/accessory_all.jpg" alt="" style="margin-left: 0px;">
                                                <p class="text-center">All Accessories</p>
                                            </a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Accessories_mouse.jpg" alt="">
                                                <p class="text-center">Accessory Mouse</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Accessories_keyboard.jpg" alt="">
                                                <p class="text-center">Accessory Keyboard</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Accessories_storage.jpg" alt="">
                                                <p class="text-center">Accessory Storage</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Accessories_network.jpg" alt="">
                                                <p class="text-center">Accessory Network</p>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </li>
                            </ul>
                        </li>
                     <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-hdd-o fa-fw"></i> Spare Part <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu menu-pic" role="menu" style="width: 700px">
                                <li>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/components_all.jpg" alt="" style="margin-left: 0px;">
                                                <p class="text-center">All Spare Parts</p>
                                            </a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Components_motherboard.jpg" alt="">
                                                <p class="text-center">Mothor Board</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Components_HDD_SSD.jpg" alt="">
                                                <p class="text-center">HDD/SSD</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Components_VGA.jpg" alt="">
                                                <p class="text-center">VGA</p>
                                            </a>
                                        </div>
                                         <div class="col-md-2">
                                            <a href="#">
                                                <img src="/images/menupic/Components_proccessor.jpg" alt="">
                                                <p class="text-center">Processor</p>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </li>
                            </ul>
                        </li>
                    <li><a href="#"><i class="fa fa-info fa-fw"></i> About Us</a></li>
                    <li><a href="#"><i class="fa fa-phone-square fa-fw"></i> Contact Us</a></li>
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i>hi,   {{ Auth::user()->name }}! <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu loginOut" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- drop down for produt types --}}
<div class="container">
<div class="row" style="padding: 10px 0px 10px 0px;">
    <div class="col-md-1 col-sm-12 col-xs-12"></div>
    <div class="row">
    <div class="col-md-2 col-sm-12 col-xs-12" style="">
       <div class="dropdown pull-right" style=" margin-top: 10px">
          <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer; text-decoration: none;">
            Shop by Product Types
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
    </div>
    
    <div class="col-md-2 col-sm-12 col-xs-12" style="border-left: dotted 1px #333; border-right: dotted 1px #333;">
        <div class="input-group">
          <div class="input-group-addon" style="padding-left: 20px; margin-left: 20px;"><i class="fa fa-search"></i></div>
          <input type="text" class="form-control" id="InputAmount" placeholder="Search...">
          <span class="input-group-btn">
              <button type="button" class="btn btn-lg btn-success dropdown-toggle" id="catDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">All Categories <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="catDropDown">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
          </ul>
          </span>
      </div>
    </div>
    <div class="col-md-2 col-sm-12 col-xs-12 pull-right" style=" margin-top: 5px; font-weight: 700; font-size: 20px; border-left: dotted 1px #333;">
        <a href="{{ route('carts.index') }}"><i class="fa fa-shopping-cart fa-fw"></i>
        <span class="label label-pill badge-notify label-danger">{{ Auth::check() ? Cart::instance(Auth::user()->id)->content()->count() :  Cart::content()->count()}}</span> $ {{ Auth::check() ?  Cart::instance(Auth::user()->id)->subtotal() : Cart::subtotal()  }}</a>
    </div>
    </div>
</div>
</div>
@yield('content')


@yield('footer')
<hr>

<div class="row well text-center">
    <div class="col-md-12"><p class="thinFont ">For phone orders please call: <span style="font-family: 'Arial'; font-weight: bold;">+(855) 23 232 222</span></p></div>
    <div class="col-md-12"><p class="thinFont">You cal also e-mail us: <a href="#">ecomm@shop.com</p></a></div>
</div>
<div class="container">
<div class="row">
    <div class="col-md-2">
        <div class="list-group list-special">
          <a href="#" class="list-group-item borderless disabled">
            <h5>MY ACCOUNT</h5>
          </a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Log in</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Create New Account</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Wishlist</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Order histories</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Shopping Cart</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="list-group list-special">
          <a href="#" class="list-group-item borderless disabled">
            <h5>INFORMATION</h5>
          </a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> About Us</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Contact US</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Site Map</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Others..</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="list-group list-special">
          <a href="#" class="list-group-item borderless disabled">
            <h5>EXTRAS</h5>
          </a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Gift Voucher</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Privacy</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Term and Condition</a>
          <a href="#" class="list-group-item borderless"><i class="fa fa-angle-right fa-fw"></i> Return Home</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"><h5>RECEIVE NEW PRODUCTS FROM US</h5></div>
          <div class="panel-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam ducimus sed id nulla adipisci natus ab hic sequi, et, excepturi sapiente voluptate eos magni, quas perspiciatis placeat? Magni quis, consectetur.</p>
          <div class="row">
              <div class="col-md-9"><input type="search" name="" id="input" class="form-control" value="" required="required" title=""></div>
              <div class="col-md-3"><button type="button" class="btn btn-primary">SUBSCRIBE</button></div>
          </div>
          </div>
        </div>
    </div>
</div>
</div>
<hr>
<div class="container">
<div class="row" style="margin-bottom: 100px">
    <div class="col-md-6">
        <div class="container">
        <div class="row">
            <div class="col-md-12"><a class="navbar-brand" href="{{ url('/') }}" style="font-size: 20px;text-shadow: 0px 0px 5px rgba(150, 150, 150, 1); font-weight: 700">
                    <i class="fa fa-home"></i><span style="color: #5daad0"> e</span><span style="color: #333">Commerce sl5</span>
            </a>
            </div>
            <div class="com-md-12" style="padding-right: 25px; font-family: 'Arial'; font-size: 13px; color: #777">
                 <p>We are students from group SL5 promotion 12. We have built the eCoommerce web site just for fun!</p>
                <p style="color: #999">&copy; CopyRight 2016 All Right Reserve  by Group SL5. </p>
            </div>
        </div>
         </div>
       
    </div>
    <div class="col-md-2 ">
        <h5>CONNECT WITH US</h5>
        <a class="btn btn-block btn-social btn-facebook">
            <i class="fa fa-facebook"></i> Sign in with Facebook
        </a>
        <a href="#"><i class="fa fa-facebook-square fa-fw"></i>facebook</a><br>
        <a href="#"><i class="fa fa-twitter-square fa-fw"></i>Tweeter</a>

        
    </div>
    <div class="col-md-4 ">
        <h5>SUPPORT PAYMENT METHOD</h5>
        <img src="/images/payment-methods.gif" alt="">
        <img src="/images/fb.gif" alt="">
    </div>
</div>
</div>
{{-- <script src="{{asset('js/libs.js')}}"></script> --}}
    <!-- JavaScripts -->
   {{--   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
{{-- @include('sweet::alert') --}}
<script type="text/javascript">
    $(".pop").popover({ trigger: "manual" , html: true, animation:false,
                        container: 'body' })
    .on("mouseenter", function () {
        var _this = this;
        $(this).popover("show");
        $(".popover").on("mouseleave", function () {
            $(_this).popover('hide');
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide");
            }
        }, 200);
    })
// =====================================

</script>
<script src="{{asset('js/rating.min.js')}}"></script>
@yield('scripts')
</body>
</html>
