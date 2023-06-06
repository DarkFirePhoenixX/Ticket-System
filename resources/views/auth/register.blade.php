<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&wght@500&display=swap" rel="stylesheet">
<section class="gradient-form div-wrapper d-flex justify-content-center align-items-center">
  <div class="container py-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-xl-9">
        <div class="card rounded-3 text-black" style="background: #eee">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body">
                <div class="text-center">
                  <img src="https://img.icons8.com/cotton/256/null/train--v2.png"
                    style="width: 120px;" alt="logo">
                  <h3 class="mt-3 mb-5 pb-1 fw-bold">Ticket System</h3>
                </div>

                <form method="POST" action="{{ route('register') }}">
                @csrf
                  <p class="fs-5"><b><i>Register new account</i></b></p>
                  <label class="form-label" for="name">Name</label>
                  <div class="form-outline mb-4">
                    <input type="name" id="name" name="name" required autofocus class="form-control" placeholder="Enter your name" />
                      @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <label class="form-label" for="email">Email</label>
                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" required autofocus class="form-control" placeholder="Enter your email address" />
                      @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <label class="form-label" for="password" required autocomplete="current-password">Password</label>
                  <div class="form-outline mb-2">
                    <input type="password" id="password" class="form-control" name="password"/>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                  <label class="form-label" for="password_confirmation" required autocomplete="password_confirmation">Repeat password</label>
                  <div class="form-outline mb-2">
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"/>
                    @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                  </div>
                  <div class="text-center pt-1 mt-3 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2" type="submit">{{ __('Register') }}</button>
                    @if (Route::has('login'))
                    <a class="text-muted" href="{{ route('login') }}">
                    Already have an account?</a>
                    @endif
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Fast. Reliable. User friendly.</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
.gradient-custom-2 {
    /* fallback for old browsers */
    background: #6a11cb;
  
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to bottom, rgba(106,17,203,1), rgba(37,117,252,1));
  
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to bottom, rgba(106,17,203,1), rgba(37,117,252,1))
  }

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}

body{
    font-family: 'EB Garamond', serif;
}
    </style>