@extends('layouts.app')

@section('content')
<div class="card-body">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
    <h1 class="h2">
    <i class="fas fa-users fa-lg" style="color:#a8a8a8;"></i> Users
    </h1>

    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group">
        <a href="{{ route('user-api') }}" class="btn btn-sm btn-outline-secondary">
          <i class="fas fa-plus-circle"></i>  New user
        </a>
      </div>
    </div>
  </div>
  <hr>
    <users-index></users-index>    
</div>
@endsection