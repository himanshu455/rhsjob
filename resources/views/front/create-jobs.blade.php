@extends('front.topmaster')
@section('page_header')
<a>Login /Register
@stop
@section('content')
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                 <h3>Login</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
              <form class="form" method="POST" action="{{ url('/member/login') }}">
                        {{ csrf_field() }}
                    <div class="box-body">
                      <div class="form-group"{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus  id="exampleInputEmail1" placeholder="Enter email">
                         @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="form-group"{{ $errors->has('password') ? ' has-error' : '' }}>
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="login" class="btn btn-primary">Submit</button>
                  </div> 
                                
                  <a class="reset_pass" href="{{route('password.reset')}}">Lost your password?</a>
            
              </form>
             
            </div>
            </div>

            <div class="col-md-6">
            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                 <h3>Register</h3>
                 
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                 <form role="form" method="POST" name="form3"  action="{{ url('/member/register') }}" id="form3">
                   {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" onblur="checkemail()" name="email" {{ old('email') }} class="form-control" id="email"  placeholder="Enter Email ">
                           <span class="help-block register">
                                        
                                    </span>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                           <span class="help-block password">
                                        
                                    </span>
                       </div>
                       <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                          <label for="exampleInputPassword1">Retype Password</label>
                          <input type="password"  name = "password_confirmation" class="form-control" id="cpasswrd" placeholder="Password">
                           <span class="help-block cfpassword">
                                        
                                    </span>
                       </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary emailex">Submit</button>
                    </div>
                </form>
              </div>
              </div>
          </div>
        </section>
          <!-- /.box -->

@stop
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



<script>
      function checkemail(){

       var email = $('#email').val();
       $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('checkemail') }}",
        data: {email:email},
        beforeSend: function(){
          //console.log(ref_name,ref_position);
        },
        success: function(data) {
          
          if(data==1) {
          
          $('.register').html('<strong style="color:red;">Email Already Exist!</strong>');
          $(':input[type="submit"]').prop('disabled', true);
            return false;

          } else {
              $(':input[type="submit"]').prop('disabled', false);
              ('.register').html('<strong style="color:red;">Email Already Exist!</strong>');

          }
        }
    });
   }    
   
  $(document).ready(function(){
   $('#form3').on('submit',function(e) {
    e.preventDefault();
     var emailid = $('#email').val();
      var password = $('#password').val();
      var confpassword = $('#cpasswrd').val();
       if(emailid==''){
        $('.register').html('<strong style="color:red;">Please enter your email address!</strong>'); 
          return false; 
       } else if(password==''){ 
       
        $('.password').html('<strong style="color:red;">Please enter your password</strong>');
            return false;
       } else if(password.length < 6){
          
         $('.password').html('<strong style="color:red;">Password must be of minimum 6 characters length</strong>');
            return false;
       }
        else if (password !== confpassword) {
     
      $('.cfpassword').html('<strong style="color:red;">Please Confirm password same as password</strong>');
          return false;      
        } else {
           
           // 
            $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('register') }}",
        data: {email:emailid,password:password,password_confirmation:confpassword},
       
        success: function(data) {
          
        window.location.href="/member/home";
        }
    });
           // 
        } 
          
        });
});
    
</script>