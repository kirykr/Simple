@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/theme-default.css')}}"/>
@section('content')
<hr>

<ol class="breadcrumb">
  <li>
    <a href="{{url('/')}}">Home</a>
  </li>
  <li>
    Profile
  </li>
</ol>
<hr>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    {{-- ==================================================================================== --}}

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            
            <div class="row">
                <div class="col-md-3">
                    
                    <div class="panel panel-default">
                        <div class="panel-body profile" style="background: url('{{asset("/images/1474700535images.jpg")}}'') center center no-repeat;">
                            <div class="profile-image">
                                <img src="{{asset('/images/1468692454dara.png')}}" alt="Nadia Ali"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{Auth::user()->name}}</div>
                                {{-- <div class="profile-data-title" style="color: #FFF;">Singer-Songwriter</div> --}}
                            </div>
                            <div class="profile-controls" >
                                <a href="#" class="profile-control-left twitter"><span style="margin-top: 5px;" class="fa fa-twitter"></span></a>
                                <a href="#" class="profile-control-right facebook"><span style="margin-top: 5px;" class="fa fa-facebook"></span></a>
                            </div>                                    
                        </div>                                
                        <div class="panel-body">                                    
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-check"></span> Following</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-rounded btn-block"><span class="fa fa-comments"></span> Chat</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body list-group border-bottom">
                            <a href="#" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> Activity</a>
                            <a href="#" class="list-group-item"><span class="fa fa-"></span> Purchase <span class="badge badge-default">18</span></a>                                
                            <a href="#" class="list-group-item"><span class="fa fa-users"></span> Carts <span class="badge badge-danger">+7</span></a>
                            <a href="#" class="list-group-item"><span class="fa fa-folder"></span> Apps</a>
                            <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Settings</a>
                        </div>
                      
                    </div>                            
                    
                </div>
                
                <div class="col-md-9">

                    <!-- START TIMELINE -->
                    <div class="timeline timeline-right">
                        
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-main">
                            <div class="timeline-date">Today</div>
                        </div>
                        <!-- END TIMELINE ITEM -->                                                  
                        
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-item-right">
                            <div class="timeline-item-info">21:37</div>
                            <div class="timeline-item-icon"><span class="fa fa-users"></span></div>                                   
                            <div class="timeline-item-content">
                                <div class="timeline-heading" style="padding-bottom: 10px;">
                                    <img src="{{asset('/images/blue-cart.gif')}}"/>
                                    <a href="#">Purchase History</a> added to Carts 
                                </div>                                        
                                <div class="timeline-body comments">
                                    <div class="">
                                    <img class="img img-rounded" style="float: left;" width="100" src="{{asset('/images/product.gif')}}"/>
                                        <p class="comment-head">
                                            <a href="#">Apple Pro Retina</a> <span class="text-muted">@Aqvatarius</span>
                                        </p>
                                        <p>Thank you so much... Come and buy more :)</p>
                                        <small class="text-muted">15min ago</small>
                                    </div>                                            
                                    <div class="">
                                        <img style="float: left;" width="100" class="img img-roudned" src="{{asset('/images/1469213476desktop-upload.jpg')}}"/>
                                        <p class="comment-head">
                                            <a href="#">Dell Inpiron BIG</a> <span class="text-muted">@nadiaAli</span>
                                        </p>
                                        <p>Sure, i will contact you ;)</p>
                                        <small class="text-muted">16min ago</small>
                                    </div>                                            
                                   {{--  <div class="comment-write">                                                
                                        <textarea class="form-control" placeholder="Write a comment" rows="1"></textarea>                                                
                                    </div> --}}
                                </div>
                            </div>                                    
                        </div>       
                        <!-- END TIMELINE ITEM -->

                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-item-right">
                            <div class="timeline-item-info">20:23</div>
                            <div class="timeline-item-icon"><span class="fa fa-reply"></span></div>                                   
                            <div class="timeline-item-content">
                                <div class="timeline-heading padding-bottom-0">
                                    <img src="assets/images/users/user2.jpg"/> <a href="#">John Doe</a> posted article <a href="#">How to...?</a>
                                </div>                                        
                                <div class="timeline-body">                                                                                        
                                    <img src="assets/images/gallery/nature-6.jpg" width="200" class="img-text" align="left"/> 
                                    <h4>Lorem ipsum dolor</h4>
                                    <p>Aenean ultricies condimentum pellentesque. Maecenas pulvinar arcu vel tortor aliquet commodo. Phasellus dapibus nisl quis nunc pharetra, id lobortis arcu sagittis. Nunc facilisis nibh non diam dictum, vitae iaculis tellus egestas. Curabitur vitae dui tempus, tempus metus vitae, cursus nunc. In cursus odio vitae metus commodo, in posuere ante varius.</p> 
                                    <p>Mauris sodales faucibus est, eu consequat dolor tristique in. Quisque at lacus sed ligula semper iaculis. In eu imperdiet ipsum. Ut vestibulum ornare venenatis.</p>           
                                    <ul class="list-tags push-up-10">                                            
                                        <li><a href="#"><strong>#</strong>tempor</a></li>
                                        <li><a href="#"><strong>#</strong>eros</a></li>
                                        <li><a href="#"><strong>#</strong>suspendisse</a></li>
                                        <li><a href="#"><strong>#</strong>dolor</a></li>
                                    </ul>
                                </div>                
                                <div class="timeline-footer">
                                    <a href="#">Details</a>
                                    <div class="pull-right">
                                        <a href="#"><span class="fa fa-comments"></span> 35</a> 
                                        <a href="#"><span class="fa fa-eye"></span> 1,432</a>
                                    </div>
                                </div>
                            </div>                                    
                        </div>       
                        <!-- END TIMELINE ITEM -->                                                                
                        
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-main">
                            <div class="timeline-date">Yesterday</div>
                        </div>
                        <!-- END TIMELINE ITEM -->                                
                        
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-item-right">
                            <div class="timeline-item-info">20:23</div>
                            <div class="timeline-item-icon"><span class="fa fa-info-circle"></span></div>                                   
                            <div class="timeline-item-content">
                                <div class="timeline-heading padding-bottom-0">
                                    <img src="assets/images/users/user3.jpg"/> <a href="#">Nadia Ali</a> changed status to:
                                </div>                                        
                                <div class="timeline-body">                                            
                                    <i>Peace Will Come, This World Will Rest, Once We Have Togetherness</i>
                                </div>                                               
                            </div>                                    
                        </div>       
                        <!-- END TIMELINE ITEM -->                                
                        
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-item-right">
                            <div class="timeline-item-info">18:34</div>
                            <div class="timeline-item-icon"><span class="fa fa-photo"></span></div>                                   
                            <div class="timeline-item-content">
                                <div class="timeline-heading">
                                    <img src="assets/images/users/user3.jpg"/> <a href="#">Nadia Ali</a> added images to gallery
                                </div>
                                <div class="timeline-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="assets/images/gallery/music-2.jpg" class="img-responsive img-text"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="assets/images/gallery/music-3.jpg" class="img-responsive img-text"/>
                                            </a>                                                    
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="assets/images/gallery/space-1.jpg" class="img-responsive img-text"/>
                                            </a>                                                    
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="assets/images/gallery/space-2.jpg" class="img-responsive img-text"/>
                                            </a>                                                    
                                        </div>
                                    </div>
                                    <ul class="list-tags push-up-10">                                            
                                        <li><a href="#"><strong>#</strong>tempor</a></li>
                                        <li><a href="#"><strong>#</strong>eros</a></li>
                                        <li><a href="#"><strong>#</strong>suspendisse</a></li>
                                        <li><a href="#"><strong>#</strong>dolor</a></li>
                                    </ul>                                            
                                </div>
                            </div>                                    
                        </div>       
                        <!-- END TIMELINE ITEM -->
                        
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-item-right">
                            <div class="timeline-item-info">15:21</div>
                            <div class="timeline-item-icon"><span class="fa fa-users"></span></div>                                   
                            <div class="timeline-item-content">
                                <div class="timeline-heading" style="padding-bottom: 10px;">
                                    <img src="assets/images/users/user3.jpg"/>
                                    <a href="#">Nadia Ali</a> added to friends 
                                    <img src="assets/images/users/user5.jpg"/>
                                    <img src="assets/images/users/user6.jpg"/>
                                    <img src="assets/images/users/user7.jpg"/>
                                </div>                                        
                                <div class="timeline-body comments">
                                    <div class="comment-item">
                                        <img src="assets/images/users/user6.jpg"/>
                                        <p class="comment-head">
                                            <a href="#">Darth Vader</a> <span class="text-muted">@darthvader</span>
                                        </p>
                                        <p>Hello, honey!</p>
                                        <small class="text-muted">15min ago</small>
                                    </div>                                                                                                                        
                                    <div class="comment-write">                                                
                                        <textarea class="form-control" placeholder="Write a comment" rows="1"></textarea>                                                
                                    </div>
                                </div>
                            </div>                                    
                        </div>       
                        <!-- END TIMELINE ITEM -->

                        
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-main">
                            <div class="timeline-date"><a href="#"><span class="fa fa-ellipsis-h"></span></a></div>
                        </div>                                
                        <!-- END TIMELINE ITEM -->
                    </div>
                    <!-- END TIMELINE -->                            
                    
                </div>
                
            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->                                                 
    </div>            
    <!-- END PAGE CONTENT -->
    </div>
  </div>
</div>
@endsection
@section('footer')
@stop
@section('scripts')

@endsection