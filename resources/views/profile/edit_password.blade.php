@extends('layout_master.master')

@section('content')

        <div class="page-header position-relative">

              <h1>
                  Profile
                  <small>
                    <i class="icon-double-angle-right"></i>
                         Edit password
                   </small>
               </h1>

        </div><!--/.page-header-->

        <div class="container">

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if(Session::has('flash_message'))
            
            <br><br><br>
            <div class="alert alert-danger">
                
                {{ session('flash_message') }}

            </div>

        @endif
        	
          {!! Form::open(['route' => 'profile-update-password']) !!}

               <div class="form-group"> 
                  {!! Form::label('old_password', 'Old Password :') !!}
                  {!! Form::password('old_password', null, ['class' => 'form-control']) !!}
               </div>

               <div class="form-group"> 
                  {!! Form::label('new_password', 'New Password :') !!}
                  {!! Form::password('new_password', null, ['class' => 'form-control']) !!}
               </div>

               <div class="form-group"> 
                  {!! Form::label('new_password_confirmation', 'Re-New Password :') !!}
                  {!! Form::password('new_password_confirmation', null, ['class' => 'form-control']) !!}
               </div>

                <div class="form-group"> 
                  {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
                </div>

          {!! Form::close() !!}

        </div>




@endsection
