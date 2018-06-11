@extends('layouts.app')

<!-- @section('page-heading')
    O-Level students
@endsection -->

@section('content')
  <div class="card-body">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
      <h1 class="h2">
      <i class="fas fa-users fa-lg" style="color:#a8a8a8;"></i> O-level Students
      </h1>

      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group">
          <a href="{{ route('user-api') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-plus-circle"></i>  New student
          </a>
        </div>
      </div>
    </div>
    <hr>

          <div class="content">
          <br>
            @if( $students->isEmpty())
              <p class="lead alert alert-warning text-center">
                No students at the moment
              </p>
            @else
              @php
                $this_year = date('Y');
              @endphp
              <div class="content table-responsive">
                <table class="table table-hover">
                <thead class="text-primary">
                  <tr>
                    <th>No</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>REG No</th>
                    <th>CLASS</th>
                    <th>HOME MOBILE</th>
                    <th class="text-right">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td class="capitalize">{{ $student->user->gender }}</td>
                    <td>{{ $student->reg_no }}</td>
                    <td>
                    @foreach($student->forms as $form)
                      @if($this_year == $form->pivot->year)
                        {{ $form->name }} - {{ $form->stream }}
                      @endif
                    @endforeach
                    </td>
                    <td>{{ $student->mobile_no }}</td>
                    <td class="text-right">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('olevel.destroy',$student->id) }}">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                        <a href="{{ route('olevel.show',$student->id) }}" rel="tooltip" title="View student info" class="btn btn-success btn-simple btn-icon">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="{{ route('olevel.edit',$student->id) }}" rel="tooltip" title="Edit student info" class="btn btn-warning btn-simple btn-icon">
                          <i class="ti-pencil-alt"></i>
                        </a>
                        <button type="button" value="submit" rel="tooltip" title="Delete student" class="btn btn-danger btn-simple btn-icon delete-class">
                          <i class="ti-close"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                  {!! $students->render() !!}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
