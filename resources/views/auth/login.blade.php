@extends('skeleton')
@section('content')
<section class="hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <!-- Login Form -->
                <div class="column is-6 is-offset-3">
                    <div class="section has-text-centered">
                        <img src="http://www.afforditnow.com/wp-content/themes/ain/assets/ain-logo-standard-medium.svg" alt="Bulma logo" width="250px">
                    </div>
                    <form class="login-form" method="post" action="login">
                        <div class="field">
                            <div class="control has-icon has-icon-left">
                                <input name="email" class="input is-medium" type="email" placeholder="Email address" required autofocus>
                                <span class="icon">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icon has-icon-left">
                                <input name="password" class="input is-medium" type="password" placeholder="Password">
                                <span class="icon">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                        </div>
                        @if($errors->any())
                        <p class="field">
                            {!! $errors->first() !!}
                        </p>
                        @endif
                        <div>
                            <div class="control">
                                <button class="button is-success is-outlined is-medium is-fullwidth">Login</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                    <div class="section">
                        <p class="has-text-centered">
                            <a href="/forgot-password">Forgot Password</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
