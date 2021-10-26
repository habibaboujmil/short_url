@extends('layouts.app', ['activePage' => 'links', 'titlePage' => __('site.links list')])

@section('content')
<div class="content">
  <div class="container-fluid">
  <div class="row">
        <div class="col-md-12">
            <a href="{{route('create_link')}}" class="btn btn-primary" role="button" aria-pressed="true">{{__('site.add')}}</a>
         </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                 {{ __('site.URL')}}
                  </th>
                  <th>
                  {{ __('site.Short URL')}}
                  </th>
                  <th>
                  Action
                  </th>
                </thead>
                <tbody>
                    @foreach($data as $link)
                    <tr>
                        <td>{{$link->url}}</td>
                        <td>{{$link->short_url}}</td>
                        <td>
                        <form method="POST" action="{{route('destroy_link',['id' => $link->id])}}">
                            @csrf
                            <button class="btn btn-link" type="submit">{{ __('site.Delete')}}</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection