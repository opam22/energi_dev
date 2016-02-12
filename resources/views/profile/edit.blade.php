@extends('layout_master.master')

@section('content')

        <div class="page-header position-relative">

              <h1>
                  Profile
                  <small>
                    <i class="icon-double-angle-right"></i>
                         Edit Profile
                   </small>
               </h1>

        </div><!--/.page-header-->

        <div class="container">
        	
          {!! Form::model($user, ['route' => ['profile-update', $user->id], 'method' => 'PATCH']) !!}

               <div class="form-group"> 
                  {!! Form::label('username', 'Username :') !!}
                  {!! Form::text('username', null, ['class' => 'form-control']) !!}
               </div>

               <div class="form-group"> 
                  {!! Form::label('name', 'Nama :') !!}
                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
               </div>

          
                <div class="form-group"> 
                  {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
                </div>

          {!! Form::close() !!}

        </div>




@endsection
