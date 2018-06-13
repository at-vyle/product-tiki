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
					<input type="text" id="address" name="address" placeholder="{{ __('user/register.form.address') }}" required=" " >
          <select class="btn btn-info" id="gender" name="gender">
            <option value="">{{ __('user/register.form.gender_default') }}</option>
            <option value="0">{{ __('user/register.form.gender_male') }}</option>
            <option value="1">{{ __('user/register.form.gender_female') }}</option>
          </select>
          <input type="number" id="phone" name="phone" placeholder="{{ __('user/register.form.phone') }}" required=" ">
          <input type="number" id="identity_card" name="identity_card" placeholder="{{ __('user/register.form.id_card') }}" required=" ">
          <label for="dob">{{ __('user/register.form.dob') }}</label><input type="date" id="dob" name="dob" >
				</form>

				<h6>{{ __('user/register.form.login_info') }}</h6>
					<form action="#" method="post">

            <input type="text" placeholder="{{ __('user/register.form.username') }}" required=" " >
  					<input type="email" placeholder="{{ __('user/register.form.email') }}" required=" " >
  					<input type="password" placeholder="{{ __('user/register.form.password') }}" required=" " >
  					<input type="password" placeholder="{{ __('user/register.form.password_c') }}" required=" " >
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
