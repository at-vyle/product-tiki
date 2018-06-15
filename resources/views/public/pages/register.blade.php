@extends('public.layout.master')
@section('title', __('user/register.title'))
@section('css')
  <link rel="stylesheet" href="/css/public/register.css">
@endsection
@section('content')
  <!-- register -->
	<div class="register">
		<div class="container">
			<h2>{{ __('user/register.title') }}</h2>
			<div class="login-form-grids">
				<h5>{{ __('user/register.form.information') }}</h5>
				<form action="#" method="post">
					<input type="text" id="full_name" name="full_name" placeholder="{{ __('user/register.form.full_name') }}" required=" " >
					<div id="full_name_error" class="alert alert-danger" hidden></div>

					<input type="text" id="address" name="address" placeholder="{{ __('user/register.form.address') }}" required=" " >
          <div id="address_error" class="alert alert-danger" hidden></div>

					<select class="btn btn-info" id="gender" name="gender">
            <option value="">{{ __('user/register.form.gender_default') }}</option>
            <option value="0">{{ __('user/register.form.gender_male') }}</option>
            <option value="1">{{ __('user/register.form.gender_female') }}</option>
          </select>
					<div id="gender_error" class="alert alert-danger" hidden></div>

          <input type="number" id="phone" name="phone" placeholder="{{ __('user/register.form.phone') }}" required=" ">
          <div id="phone_error" class="alert alert-danger" hidden></div>

					<input type="number" id="identity_card" name="identity_card" placeholder="{{ __('user/register.form.id_card') }}" required=" ">
          <div id="identity_card_error" class="alert alert-danger" hidden></div>

					<label for="dob">{{ __('user/register.form.dob') }}</label><input type="date" id="dob" name="dob" >
					<div id="dob_error" class="alert alert-danger" hidden></div>
				</form>

				<h6>{{ __('user/register.form.login_info') }}</h6>
					<form action="#" method="post">
            <input type="text" placeholder="{{ __('user/register.form.username') }}" required=" " name="username">
						<div id="username_error" class="alert alert-danger" hidden></div>

						<input type="email" placeholder="{{ __('user/register.form.email') }}" required=" " >
						<div id="email_error" class="alert alert-danger" hidden></div>

						<input type="password" placeholder="{{ __('user/register.form.password') }}" required=" " >
						<input type="password" placeholder="{{ __('user/register.form.password_c') }}" required=" " >
						<div id="password_error" class="alert alert-danger" hidden></div>
  					<div class="register-check-box">
					</div>
					<input type="submit" value="{{ __('user/register.title') }}">
				</form>
			</div>
			<div class="register-home">
				<a href="{{ route('user.home') }}">{{ __('user/layout.home') }}</a>
			</div>
		</div>
	</div>
<!-- //register -->
@endsection
@section('js')
<script src="/js/public/register.js"></script>
@endsection
