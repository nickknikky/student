@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create New User</div>
                <div class="panel-body">
                    {!! Form::open(array('route'=>'user.store','id'=>'myform','class'=>'form-horizontal')) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                {!! Form :: text('name',old('name'),['placeholder'=>'Enter Name','class'=>'form-control','id'=>'name'])  !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                {!! Form :: text('email',old('email'),['placeholder'=>'Enter Email','class'=>'form-control','id'=>'email'])  !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                        <label for="role_id" class="col-md-4 control-label">Role</label>
                        <div class="col-md-6">
                            {!!Form::select('role_id', $roles, '', ['class' => 'form-control', 'id' => 'role_id'])!!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            {!! Form :: password('password',['placeholder'=>'Enter Password | Minimum 6 characters','class'=>'form-control','id'=>'password'])  !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-6">
                            {!! Form :: password('confirm_password',['placeholder'=>'Enter Password | Same as Password','class'=>'form-control','id'=>'confirm_password'])  !!}
                            @if ($errors->has('confirm_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="role_is" class="col-md-4 control-label">Status</label>
                        <div class="col-md-6">
                            {!!Form::select('status', [1=>'Active', 0=>'Inactive'], '', ['class' => 'form-control', 'id' => 'status'])!!}
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               {!! Form :: button('<i class="fa fa-btn fa-user"></i> Create',['type'=>'submit', 'class'=>'btn btn-primary'])  !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection