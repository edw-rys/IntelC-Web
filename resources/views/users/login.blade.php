@extends('partials.template_initial')
@section('section')
<div id="app">
  <div class="img-other">
    {{-- <img src="{{ asset('img/colors.png') }}" alt=""> --}}
  </div>
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand flex flex-center" style="background: linear-gradient(120deg, #ffffff, #75e168, #04b119) !important; padding: 10px 0">
            <h2 class="text-center text-white">
              <img src="{{ asset('img/logo.svg') }}" alt="">
            </h2>
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Login</h4></div>

            <div class="card-body">
              <form method="POST" action="{{ route('auth.login') }}" class="needs-validation" novalidate="">
                @csrf 
                
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  <div class="invalid-feedback">
                    Please fill in your email
                  </div>
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                      <!--<a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                      </a>-->
                    </div>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  <div class="invalid-feedback">
                    please fill in your password
                  </div>
                </div>
                @if(isset($errors) && !empty($errors) && is_array($errors))
                  @foreach($errors as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                  @endforeach
                @endif
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
</div>
  
@endsection