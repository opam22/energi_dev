@extends('layout_master.master')

@section('content')

        <div class="page-header position-relative">

              <h1>
                  Profile
                  <small>
                    <i class="icon-double-angle-right"></i>
                         @if(Session::has('flash_message'))
                             
                             <br><br><br>
                             <div class="alert alert-danger">
                                 
                                 {{ session('flash_message') }}

                             </div>

                         @endif
                   </small>
               </h1>

        </div><!--/.page-header-->

        <div class="container">
        	<h1>{{ Auth::user()->name }}</h1>
        	<p>{{ Auth::user()->username }} | {{ Auth::user()->email }}</p>
        	<a href="{{ route('profile-edit') }}" class="btn btn-info">Edit Profil</a>
        	<a href="{{ route('profile-edit-password') }}" class="btn btn-primary">Edit Password</a>
        </div>




@endsection
