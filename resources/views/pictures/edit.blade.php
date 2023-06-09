@extends('layouts.adminBase')

@section('content')

  <div class="container">
      <div class="card">

          <div class="card-header d-flex justify-content-between align-items-center">

              <h5  class="my-1 float-left">{{ !empty($pictures->name) ? $pictures->name : 'Pictures' }}</h5>

              <div class="btn-group btn-group-sm float-right" role="group">

                  <a href="{{ route('pictures.pictures.index') }}" class="btn btn-primary mr-2" title="Show All Pictures">
                      <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                      Show All Pictures
                  </a>

                  <a href="{{ route('pictures.pictures.create') }}" class="btn btn-success" title="Create New Pictures">
                      <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                      Create New Pictures
                  </a>

              </div>
          </div>

          <div class="card-body">

              @if ($errors->any())
                  <ul class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              @endif

              <form method="POST" action="{{ route('pictures.pictures.update', $pictures->id) }}" id="edit_pictures_form" name="edit_pictures_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input name="_method" type="hidden" value="PUT">
                  @include ('pictures.form', [
                                              'pictures' => $pictures,
                                            ])

                  <div class="form-group">
                      <div class="col-md-offset-2 col-md-10">
                          <input class="btn btn-primary" type="submit" value="Update">
                      </div>
                  </div>
              </form>

          </div>
      </div>
  </div>

@endsection
