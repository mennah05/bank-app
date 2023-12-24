@extends('home.layouts.master')
@section('content')


    <div class="page page-center">
      <div class="container container-tight py-4">
        <h1 style="text-align: center;">ABC BANK</h1>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form action="{{ route('login')}}" method="post">
                @csrf
                <div class="results">

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                </div>
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="your@email.com" name="email">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password

                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control"  placeholder="Your password" name="password">

                </div>
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
              </div>
              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" class="form-check-input"/>
                  <span class="form-check-label">Remember me</span>
                </label>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>
          </div>


        </div>
        <div class="text-center text-muted mt-3">
          Don't have account yet? <a href="{{ route('signup')}}" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>

    @endsection
