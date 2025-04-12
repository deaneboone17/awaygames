@extends('layouts.application')

@section('content')
<div id="static-page">

  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            Admin Dashboard<br>
            <small>
              Manage Users.
            </small>
          </h2>
        </div>
      </div>
    </div>
  </div>

  <section id="sidebar-page" class="page-content">
    <div class="container">

      <div class="row">
    
    <h6>@include('partials.sidebar')</h6>

        <div class="col-md-10 main-content">

        

  <div class="row">
    <div class="col-lg-10">

    <h1><i class="fa fa-users"></i> User Administration</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            @if(Auth::user()->roles()->first()->id>2)

                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->firstname." ".$user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>


                    <div class="btn-toolbar">
                        <a href="/user/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        <a href="/user/{{ $user->id }}/delete" class="btn btn-danger" style="margin-right: 3px;" onclick="return confirm('Delete {{ $user->firstname.' '. $user->lastname }}?')">Delete</a>
                        <a href="/user/{{ $user->id }}/role" class="btn btn-info" style="margin-right: 3px;"">Assign Role</a>
                    </div></td>
                    </tr>
                    @endforeach
            @else

                 @foreach ($users as $user)

                    <td>{{ $user->firstname." ".$user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>

                    <div class="btn-toolbar">
                        <a href="/user/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        <a href="/user/{{ $user->id }}/delete" class="btn btn-danger" style="margin-right: 3px;" onclick="return confirm('Delete {{ $user->firstname.' '. $user->lastname }}?')">Delete</a>
                    </div></td>
                </tr>
                @endforeach
              @endif  
            </tbody>

        </table>
    </div>

    <a href="/user/create" class="btn btn-success">Add User</a>

    </div>

  </div>


  
       
        </div>  

        
      </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection














