<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mypocketlawyer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{url('public/assets')}}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{url('public/assets')}}/css/animate.css">
    
    <link rel="stylesheet" href="{{url('public/assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('public/assets')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('public/assets')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{url('public/assets')}}/css/aos.css">

    <link rel="stylesheet" href="{{url('public/assets')}}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{url('public/assets')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{url('public/assets')}}/css/jquery.timepicker.css">
    
    <link rel="stylesheet" href="{{url('public/assets')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{url('public/assets')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{url('public/assets')}}/css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
	  @include('user.navbar')
	  @include('user.header')
	  @include('user.timeline')
	  @include('user.lawyer')
	  @include('user.artikel')
 

	 

    

   

    

   
		
  

    

    
		

    
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>


  <script src="{{url('public/assets')}}/js/jquery.min.js"></script>
  <script src="{{url('public/assets')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{url('public/assets')}}/js/popper.min.js"></script>
  <script src="{{url('public/assets')}}/js/bootstrap.min.js"></script>
  <script src="{{url('public/assets')}}/js/jquery.easing.1.3.js"></script>
  <script src="{{url('public/assets')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{url('public/assets')}}/js/jquery.stellar.min.js"></script>
  <script src="{{url('public/assets')}}/js/owl.carousel.min.js"></script>
  <script src="{{url('public/assets')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{url('public/assets')}}/js/aos.js"></script>
  <script src="{{url('public/assets')}}/js/jquery.animateNumber.min.js"></script>
  <script src="{{url('public/assets')}}/js/bootstrap-datepicker.js"></script>
  <script src="{{url('public/assets')}}/js/jquery.timepicker.min.js"></script>
  <script src="{{url('public/assets')}}/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{url('public/assets')}}/js/google-map.js"></script>
  
  <script src="{{url('public/assets')}}/js/main.js"></script>
    
  </body>
</html>