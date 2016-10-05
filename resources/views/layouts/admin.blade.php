<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>eCommerce Admin page</title>

  <link rel="stylesheet" media="print" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/libs.css')}}">
  <link rel="stylesheet" href="{{asset('css/fileinput.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
  <link rel="stylesheet" media="print" href="{{asset('css/print.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">


  {{-- <link rel="stylesheet" href="{{asset('css/dropzone.css')}}"> --}}
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> --}}
  {{-- <script src="{{asset('js/libs.js')}}"></script> --}}
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/elevatezoom/3.0.8/jqueryElevateZoom.js"></script>
  {{-- <script src="{{asset('js/jqueryElevateZoom.js')}}"></script> --}}
  <script src="{{asset('js/ripples.min.js')}}"></script>
  <script src="{{asset('js/metisMenu.js')}}"></script>
  <script src="{{asset('js/sb-admin-2.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>

  <script src="{{asset('js/plugins/canvas-to-blob.min.js')}}"></script>
  <script src="{{asset('js/plugins/sortable.min.js')}}"></script>
  <script src="{{asset('js/plugins/purify.min.js')}}"></script>
  <script src="{{asset('js/fileinput.min.js')}}"></script>
  <script src="{{asset('js/themes/fa/theme.js')}}"></script>
  <script src="{{asset('js/locales/LANG.js')}}"></script>
  <script src="{{asset('js/select2.full.min.js')}}"></script>
  <script src="{{asset('js/i18n/en.js')}}"></script>

  <script src="{{asset('js/validator.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/lodash/4.16.1/lodash.min.js"></script>


  {{-- <script src="{{asset('js/dropzone.js')}}"></script> --}}
  <!-- Bootstrap Core CSS -->
  <!-- <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- MetisMenu CSS -->
  <!-- <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->

  <!-- Timeline CSS -->
  <!-- <link href="../dist/css/timeline.css" rel="stylesheet"> -->

  <!-- Custom CSS -->
  <!-- <link href="../dist/css/sb-admin-2.css" rel="stylesheet"> -->

  <!-- Morris Charts CSS -->
  <!-- <link href="../bower_components/morrisjs/morris.css" rel="stylesheet"> -->

  <!-- Custom Fonts -->
  <!-- <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
      <style type="text/css" media="print">
        a {
          color: #333;
          font-size: 15px;
        }
        .dontprint
        {
          display: none;
        }
        .displayprint{
          display: inline;
        }
      </style>
      </head>

      <body>

        <div id="wrapper">

          <!-- Navigation -->
          <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 20px;text-shadow: 0px 0px 5px rgba(150, 150, 150, 1); font-weight: 700">
                    <i class="fa fa-home fa-fw"></i><span style="color: #5daad0">e</span>Commerce sl5
                  </a>
                </div>
              </div>
              <!-- /.navbar-header -->
              <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="row">

                  <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-messages">
                        <li>
                          <a href="#">
                            <div>
                              <strong>John Smith</strong>
                              <span class="pull-right text-muted">
                                <em>Yesterday</em>
                              </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <strong>John Smith</strong>
                              <span class="pull-right text-muted">
                                <em>Yesterday</em>
                              </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <strong>John Smith</strong>
                              <span class="pull-right text-muted">
                                <em>Yesterday</em>
                              </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </li>
                      </ul>
                      <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-tasks">
                        <li>
                          <a href="#">
                            <div>
                              <p>
                                <strong>Task 1</strong>
                                <span class="pull-right text-muted">40% Complete</span>
                              </p>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                  <span class="sr-only">40% Complete (success)</span>
                                </div>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <p>
                                <strong>Task 2</strong>
                                <span class="pull-right text-muted">20% Complete</span>
                              </p>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                  <span class="sr-only">20% Complete</span>
                                </div>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <p>
                                <strong>Task 3</strong>
                                <span class="pull-right text-muted">60% Complete</span>
                              </p>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  <span class="sr-only">60% Complete (warning)</span>
                                </div>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <p>
                                <strong>Task 4</strong>
                                <span class="pull-right text-muted">80% Complete</span>
                              </p>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                  <span class="sr-only">80% Complete (danger)</span>
                                </div>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </li>
                      </ul>
                      <!-- /.dropdown-tasks -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-alerts">
                        <li>
                          <a href="#">
                            <div>
                              <i class="fa fa-comment fa-fw"></i> New Comment
                              <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                              <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <i class="fa fa-envelope fa-fw"></i> Message Sent
                              <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <i class="fa fa-tasks fa-fw"></i> New Task
                              <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <div>
                              <i class="fa fa-upload fa-fw"></i> Server Rebooted
                              <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </li>
                      </ul>
                      <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                    <li>
                      <!-- <img style="position: relative; margin-bottom: -15px" width="30" src="{{Auth::user()->photo ? Auth::user()->photo->path : 'http://placehold.it/400x400'}}" class="img-responsive img-circle" alt=""> -->
                      @if(Auth::user()->avatar)
                        <img style="position: relative; margin-bottom: -10px" width="40" src="/uploads/avatars/{{Auth::user()->avatar}}" class="img-responsive img-circle" alt="">
                      @else
                        <img style="position: relative; margin-bottom: -10px" width="40" src="/uploads/avatars/default-no-image.png" class="img-responsive img-circle">
                      @endif
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        hi,  {{ Auth::user()->name }}!  <i class="fa fa-caret-down"></i>

                      </a>
                      <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                      </ul>
                      <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                  </ul>
                  <!-- /.navbar-top-links -->
                </div>
              </div> <!-- /.col-collapse -->
            </div> <!-- /.row-collapse -->

            <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                  <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                      <input type="text" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                    <!-- /input-group -->
                  </li>
                  <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                  </li>

                  @foreach ($collection1 as $memu)
                         @include($memu['module'])
                  @endforeach

 <div class="form-group">

          </nav>

          {{-- ==================end nav ================================= --}}

          <div id="page-wrapper">
            <!-- / Titile backend page -->



            <div class="row">
              <div class="col-lg-12 dontprint">
                <h1 class="page-header">Administrator</h1>
                </div>
                <!-- /.col-lg-12 -->
              </div>
              {{-- Yielding============================ --}}
              @include('flash::message')
              @yield('content')



            </div>
            <!-- /#page-wrapper -->
          </div>
          <!-- /#wrapper -->

          <!-- jQuery -->
{{--
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 --}}

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>


  <link href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css' rel='stylesheet' type='text/css'>

  {{--    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'> --}}
  {{-- =================================== Script =============================== --}}
    @yield('footer')
     <script src="{{asset('js/validator.min.js')}}"></script>
    <p style="with:auto; height: 100px;"></p>
    @if(Session::has('delete_user'))
    <script>
            // $('div.alert').no('.alert-important').delay(3000).fadeOut(350);
            $('#flash-overlay-modal-danger').modal();
          </script>
          @elseif(Session::has('create_user'))
          <script>
            $('#flash-overlay-modal').modal();
          </script>
      @endif

@yield('scripts')

<script type="text/javascript">
  $(document).ready(function() {
    // Select2
    // image loader
    $("#input-pd").fileinput({
      uploadUrl: "/file-upload-batch/1",
      uploadAsync: false,
      minFileCount: 2,
      maxFileCount: 5,
      overwriteInitial: false,
          initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
          initialPreviewFileType: 'image', // image is the default and can be overridden in config below
          // initialPreviewConfig: [
          //     {caption: "Desert.jpg", size: 827000, width: "120px", url: "/file-upload-batch/2", key: 1},
          //     {caption: "Lighthouse.jpg", size: 549000, width: "120px", url: "/file-upload-batch/2", key: 2},
          //     {type: "video", size: 375000, filetype: "video/mp4", caption: "KrajeeSample.mp4", url: "/file-upload-batch/2", key: 3},
          //     {type: "pdf", size: 8000, caption: "About.pdf", url: "/file-upload-batch/2", key: 4},
          //     {type: "text", size: 1430, caption: "LoremIpsum.txt", url: "/file-upload-batch/2", key: 5},
          //     {type: "html", size: 3550, caption: "LoremIpsum.html", url: "/file-upload-batch/2", key: 6}
          // ],
          purifyHtml: true, // this by default purifies HTML data for preview
          uploadExtraData: {
            img_key: "1000",
            img_keywords: "happy, places",
          }
        }).on('filesorted', function(e, params) {
              console.log('File sorted params', params);
            }).on('fileuploaded', function(e, params) {
              console.log('File uploaded params', params);
            });
     });
      //======================== API ====================================


    </script>
    @include('includes/brand_type_model')
  </body>
  </html>
