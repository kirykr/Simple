@extends('layouts.app')

@section('content')

<div class="container">
  <ol class="breadcrumb">
    <li>
      <a href="{{url('/')}}">Home</a>
    </li>
    <li class="active">contact us</li>
  </ol>
  <div class="page-header">
    <h1>Contact Us<small>We are happy to work with you..</small></h1>
  </div>
  <div class="row">
    <div class="col-md-12">
     <h1 class="text-primary text-center">Welcome to eCommerce SL5</h1>
     <hr>
   </div>
   <div class="col-md-12 text-center">
     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
       cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
     </div>
     <hr>
     <div class="col-md-12">
      <h2 class="text-primary text-center">Where We are</h2>
    </div>
    <div class="col-md-12 text center">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.77421004634!2d104.89248701443624!3d11.568037691787367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095173761d4a53%3A0xcd09ff2f4d326e3f!2sSETEC+Institute!5e0!3m2!1sen!2s!4v1475296450813" width="1080" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      {{-- start contact form --}}
      <div class="row">
       <div class="col-md-6 " data-animate="fadeInLeft">

         <div class="text-column">
           <h4>Contact Us</h4>
           <div class="text-column-info">
             Proin luctus nulla fringilla massa euismod commodo. Donec sit amet elementum libero. Curabitur ut lorem id tellus malesuada tincidunt et eget purus. 
           </div>
         </div>

         <div class="row">
           <div class="col-md-6">
             <div class="form-group">
               <label>Name <span class="text-hightlight">*</span></label>
               <input type="text" class="form-control"/>
             </div>
           </div>
           <div class="col-md-6">
             <div class="form-group">
               <label>E-mail <span class="text-hightlight">*</span></label>
               <input type="text" class="form-control"/>
             </div>
           </div>
           <div class="col-md-12">
             <div class="form-group">
               <label>Subject <span class="text-hightlight">*</span></label>
               <input type="text" class="form-control"/>
             </div>
             <div class="form-group">
               <label>Message <span class="text-hightlight">*</span></label>
               <textarea class="form-control" rows="8"></textarea>
             </div>
             <button class="btn btn-primary btn-md pull-right">Send Message</button>
           </div>
         </div>

       </div>
       <div class="col-md-1"></div>
       <div class="col-md-5 text-left">

         <div class="text-left">
           <div class="page-header">
            <h4><i class="fa fa-home"></i> Our School</h4>
           </div>
           <div class="text-column-info">
             <p><strong><span class="fa fa-map-marker"></span> Address: </strong>  No. 86A, Street 110, Russian Federation Boulevard, Sangkat Teuk Laak I, Khan Toul Kork, Phnom Penh, Cambodia, Confederation de la Russie (110), Phnom Penh</p>
             <p><strong><span class="fa fa-phone"></span> Phone: </strong> 023 880 612</p>
             <p><strong><span class="fa fa-envelope"></span> E-mail: </strong> <a href="#">  info@setecu.com</a></p>
           </div>
         </div>

         <div class="text-left">
           <div class="page-header">
            <h4><i class="fa fa-clock-o"></i> Bussines Hours</h4>
           </div>
           <div class="text-column-info">
             <p><strong>Monday &mdash; Friday</strong>: 07:00am - 8:00pm</p>
             <p><strong>Saturday &mdash; Sunday</strong>: 07:00am - 8:00pm</p>
           </div>
         </div>

       </div>
     </div>

     {{-- contract form --}}
   </div>
 </div>
 @endsection

<!-- ./page scripts -->