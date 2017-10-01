@extends('master')
@section('content')

<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Contact</h3>
	</div>
</div>
<!-- //banner -->
<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="contact-grids">
				<div class="col-md-4 contact-grid text-center animated wow slideInLeft" data-wow-delay=".5s">
					<div class="contact-grid1">
						<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
						<h4>Address</h4>
						<p>{{$storeinfo->address}}</p>
					</div>
				</div>
				<div class="col-md-4 contact-grid text-center animated wow slideInUp" data-wow-delay=".5s">
					<div class="contact-grid2">
						<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
						<h4>Call Us</h4>
						<p>+{{$storeinfo->phone}}<span>+{{$storeinfo->phone}}</span></p>
					</div>
				</div>
				<div class="col-md-4 contact-grid text-center animated wow slideInRight" data-wow-delay=".5s">
					<div class="contact-grid3">
						<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
						<h4>Email</h4>
						<p><a href="mailto:{{$storeinfo->email}}">{{$storeinfo->email}}</a><span><a href="mailto:{{$storeinfo->email}}">info@example2.com</a></span></p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="map wow fadeInDown animated" data-wow-delay=".5s">
				<h3 class="tittle">View On Map</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819" frameborder="0" style="border:0"></iframe>
			</div>
			<h3 class="tittle">Contact Form</h3>
			<form method="post" action="{{route('contact.form')}}">
				{{csrf_field()}}
				<div class="contact-form2">
					<h6 class="text-center text-success">{{Session::get('msg')}}</h6>
					<input type="text"  name="name" value="{{old('name')}}" placeholder="Enter Name" required="">
					@if ($errors->has('name'))
						<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
					@endif
					<input type="email" name="email" value="{{old('email')}}" placeholder="Enter Email" required="">
					@if ($errors->has('email'))
						<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
					@endif
					<textarea type="text" placeholder="Message..." name="message"></textarea>
					@if ($errors->has('message'))
						<span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
					@endif
					<input type="submit" value="Submit" >
				</div>
			</form>
		</div>
	</div>
	
<!-- //contact -->

<!-- //product-nav -->

@endsection