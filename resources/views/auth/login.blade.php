@extends('includes.app')
@section('title','Sign in')
@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h3 class="mb-5">Sign in</h3>
              <form action="/login" method="POST">
                @csrf
                  <div class="form-outline mb-4">
                    <label class="d-flex justify-content-start form-label" for="typeEmailX-2">Email</label>
                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email" required/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="d-flex justify-content-start form-label" for="typePasswordX-2">Password</label>
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" required/>
                  </div>

                  <button class="btn btn-info btn-lg btn-block px-5" style="color:white" type="submit">Sign in</button>

                  <div class="d-flex justify-content-start mt-4 ps-0">
                    <a href="{{ route('register-view') }}" class="form-check-label"> Register Now </a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
