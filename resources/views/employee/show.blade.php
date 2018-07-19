@extends('template.base')
@section('title') Detail Employee @endsection
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
		 {!! Form::model($employee, ['method' => 'PATCH','class'=>'form-horizontal','id'=>'FormSubmit','route' => ['employee.update', $employee->id]]) !!}
		<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
			<label for="fullname" class="col-sm-2 control-label">Full Name</label>
			<div class="col-sm-10">
				<label class="control-label">
		         	<strong>:&nbsp{{ $employee->fullname }}</strong>
		         </label>
			</div>
		</div>
		<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
			<label for="gender" class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-10">
				<label class="control-label">
		         	<strong>:&nbsp{{ $employee->gender }}</strong>
		         </label>
			</div>
		</div>
		<div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
			<label for="birth_date" class="col-sm-2 control-label">Birth Date</label>
			<div class="col-sm-10">
				<label class="control-label">
		         	<strong>:&nbsp{{ $employee->birth_date }}</strong>
		         </label>
			</div>
		</div>
		<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
			<label for="phone" class="col-sm-2 control-label">Phone</label>
			<div class="col-sm-10">
				<label class="control-label">
		         	<strong>:&nbsp{{ $employee->phone }}</strong>
		         </label>
			</div>
		</div>
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<label class="control-label">
		         	<strong>:&nbsp{{ $employee->email }}</strong>
		         </label>
			</div>
		</div>
		<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
			<label for="address" class="col-sm-2 control-label">Address</label>
			<div class="col-sm-10">
				<label class="control-label">
		         	<strong>:&nbsp{{ $employee->address }}</strong>
		         </label>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection