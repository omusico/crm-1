@extends('templates.main-template')
@section('content')

<div class="wrapper-md">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      User Listing
    </div>
    <div class="panel-body b-b b-light">
      Search: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
    </div>
    <div>
      <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="15">
        <thead>
          <tr>
              <th data-toggle="true">
                  User
              </th>
              <th>
                  Client
              </th>
              <th data-hide="phone,tablet">
                  Contact Email
              </th>
              <th data-hide="phone,tablet" class="footable-sorted">
                  User Since
              </th>
              <th data-hide="phone">
                  Status
              </th>
          </tr>
        </thead>
        <tbody>
        @foreach($users->getCollection() as $user)
          <tr>
              <td><a href="{{ url('users/'.$user->id) }}">{{ $user->first_name.' '.$user->last_name }}</a></td>
              <td><a href="{{ url('clients/'.$user->client_id) }}">{{ DB::table('clients')->where('id', '=', $user->client_id)->pluck('business_name') }}</a></td>
              <td>{{ $user->email }}</td>
              <td data-value="78025368997">{{ $user->created_at }}</td>
              <td data-value="1"><span class="label bg-success" title="Active">Active</span></td>
          </tr>
        @endforeach
        </tbody>
        <tfoot class="hide-if-no-paging">
          <tr>
              <td colspan="5" class="text-center">
                  <ul class="pagination"></ul>
              </td>
          </tr>
        </tfoot>
      </table>
      <div class="col-lg-12 pull-right">
        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>
@stop