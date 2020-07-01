<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
       @include ('user.header')

        <main>
           <section class="serch-hero">
                <div class="wrapper">
                  <img src="{{ asset('user_files/images/banner-2.jpg')}}" alt=""  />      
                </div>
            </section>

        <div class="container">
            <div class="row">
              
                <div class="col-sm-12">
                 
                  
                    @if (session('status'))                        
                        <div class="alert alert-{{ session('code') }} text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                 
                  
               </div>
                
                <div class="col-lg-4 col-md-6">
                <form action="{{ url('user/userSignup') }}" class="form-horizontal" method="post" onsubmit="return validateForm()">
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">				
                <div class="divider"><span>Register</span></div>
                <div class="form-group">
                    <label>Your Name *</label>
                    <input class="form-control" name="name" type="text" autocomplete="off" value="{{ old('name') }}" required="required" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" >                    
                </div>                
                
                <div class="form-group">
                    <label>Your Email *</label>
                    <input class="form-control" type="email" name="email" autocomplete="off" value="{{ old('email') }}" required="required" oninvalid="setCustomValidity('Enter Valid Emai Id')"  onchange="try{setCustomValidity('')}catch(e){}" >
                </div>
                <div class="form-group">
                    <label>Your password *</label>
                    <input class="form-control" type="password" name="password" id="password1" required="required" oninvalid="setCustomValidity('Enter password')"  onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input class="form-control" type="text" name="phone" id="phone" onkeyup="otp()" pattern="[0-9]{1}[0-9]{9}" maxlength="10" oninvalid="setCustomValidity('Enter A Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}">
                    
                    <label id="cnsotp" style="font-size: 16px;    font-weight: 600;margin: 2% 0px 0px 25%;color: #fc5b62;cursor: pointer;" >Send OTP?</label>

                </div>
                <div class="form-group">                   
                    <input class="form-control" type="text" name="otpv" id="otpv" placeholder="One Time Password" required="required">
                    <button type="button" style="margin-top: 10px;" class="btn btn-primary btn-sm" id="anotherOTP" onclick="otp()">Send Again</button>
                    <input type="hidden" id="generatedOTP">
                </div>
                <p id="vr"></p>

                <button class="btn_1 rounded full-width">Signup</button>     
                          
            </form>

                </div>
                <div class="col-lg-2 col-md-2"></div>
                <div class="col-lg-6 col-md-6">
                  <form action="{{ url('user/userLogin') }}" class="form-horizontal" method="post">
                          @csrf
                      <div class="divider"><span>Login</span></div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" id="email" required="required">
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" id="password" value="" required="required">
                      </div>
                      <div class="clearfix add_bottom_30">
                          <!--<div class="checkboxes float-left">
                              <label class="container_check">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                              </label>
                          </div>-->
                          <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
                      </div>

                      <button class="btn_1 rounded full-width">Login</button>               
                  </form>
                </div>
                
                
            </div>
            <!--/row-->
        </div>
        <!-- /container -->  
    </main>

    @include ('user.footer_content')

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   @include ('user.footer')
    
    <script>

      $( document ).ready(function() {
          $("#otpv").hide();
          $("#anotherOTP").hide();
          $("#cnsotp").hide();
      });
      function otp() {       

        var phoneNumber = $("#phone").val();
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

        if (filter.test(phoneNumber)) {
            if(phoneNumber.length==10){                
                var validate = true;
            } else {
                $("#cnsotp").hide();
                $("#anotherOTP").hide();
                $("#vr").html('Not a valid number');
                $("#phone").css('border-color', 'red');
                $("#otpv").hide();
                var validate = false;
            }

        } else {
            $("#cnsotp").hide();
            $("#anotherOTP").hide();
            $("#vr").html('Not a valid number');
            $("#phone").css('border-color', 'red');            
            $("#otpv").hide();
            var validate = false;
          }

         if(validate){
             $("#vr").html('');
             $("#cnsotp").show();
             
             
          

          
         }
        
      }
      $("#cnsotp").click(function(){
  var phoneNumber = $("#phone").val();
  //number is equal to 10 digit or number is not string 
          $("#cnsotp").hide();
          $("#anotherOTP").show();
          $("#otpv").show();
          $("#phone").css('border-color', 'green');
          $("#vr").html('');

          _token = $("#token").val();
          var dataString = 'phone=' + phoneNumber + '&_token=' + _token;

          $.ajax({
              type: "POST",
              url: "{{ url('user/otp') }}",
              data: dataString,
              headers: {'X-CSRF-TOKEN': _token},
              success: function(response) {   
                $("#generatedOTP").val(response); 
              }

          });
});

      function validateForm() {
        var generatedOTP = $("#generatedOTP").val();
        var otpv = $("#otpv").val();

        if (generatedOTP == otpv) {          
          return true;
        } else {
          $("#anotherOTP").show();
          $("#otpv").css('border-color', 'red');
          $("#vr").html('Please provide valid otp');
          return false;
        }
      }
    </script>

</body>

</html>