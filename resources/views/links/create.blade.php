@extends('layouts.app', ['activePage' => 'links', 'titlePage' => __('site.add new link')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
                <form method="post" action="{{ route('store_link') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter URL">
                    <div class="input-group btn-submit">
                        <button class="btn btn-primary " type="submit">{{__('site.Generate Shorten Link')}}</button>
                    </div>
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection