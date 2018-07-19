@extends('template.base')
@section('title') Create Employee @endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="{{ route('employee.index') }}" class="btn btn-default">
				Back to List
			</a>
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		{!! Form::open(array('route' => 'employee.store','method'=>'POST','class'=>'form-horizontal','id'=>'FormSubmit')) !!}
		<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
			<label for="fullname" class="col-sm-2 control-label">Full Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="fullname" name="fullname" />
				@if ($errors->has('fullname'))
				<span class="help-block">
					<strong>{{ $errors->first('fullname') }}</strong>
				</span>
				@endif
			</div>
		</div>
		<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
			<label for="gender" class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-10">
				<label class="radio-inline">
					<input type="radio" name="gender" value="MALE"> Male
				</label>
				<label class="radio-inline">
					<input type="radio" name="gender" value="FEMALE"> Female
				</label>
				@if ($errors->has('gender'))
				<span class="help-block">
					<strong>{{ $errors->first('gender') }}</strong>
				</span>
				@endif
			</div>
		</div>
		<div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
			<label for="birth_date" class="col-sm-2 control-label">Birth Date</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="birth_date" name="birth_date" />
				@if ($errors->has('birth_date'))
				<span class="help-block">
					<strong>{{ $errors->first('birth_date') }}</strong>
				</span>
				@endif
			</div>
		</div>
		<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
			<label for="phone" class="col-sm-2 control-label">Phone</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="phone" name="phone" />
				@if ($errors->has('phone'))
				<span class="help-block">
					<strong>{{ $errors->first('phone') }}</strong>
				</span>
				@endif
			</div>
		</div>
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="email" name="email" />
				@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif
			</div>
		</div>
		<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
			<label for="address" class="col-sm-2 control-label">Address</label>
			<div class="col-sm-10">
				<textarea name="address" id="address" class="form-control" rows="5"></textarea>
				@if ($errors->has('address'))
				<span class="help-block">
					<strong>{{ $errors->first('address') }}</strong>
				</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Save</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection