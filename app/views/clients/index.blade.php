@extends('templates.main-template')
@section('content')

<div class="wrapper-md">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      Client Listing
    </div>
    <div class="panel-body b-b b-light">
      Search: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
    </div>
    <div>
      <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="15">
        <thead>
          <tr>
              <th data-toggle="true">
                  Client
              </th>
              <th>
                  Website
              </th>
              <th data-hide="phone,tablet">
                  Contact Email
              </th>
              <th data-hide="phone,tablet">
                  Industry
              </th>
              <th data-hide="phone,tablet" class="footable-sorted">
                  Client Since
              </th>
              <th data-hide="phone">
                  Status
              </th>
          </tr>
        </thead>
        <tbody>
        @foreach($clients->getCollection() as $client)
          <tr>
              <td><a href="{{ url('clients/'.$client->id) }}">{{ $client->business_name }}</a></td>
              <td><a target="_black" href="http://{{ $client->website }}">{{ $client->website }}</a></td>
              <td>{{ $client->email }}</td>
              <td>{{ DB::table('industry')->where('id', '=', $client->industry_id)->pluck('industry') }}</td>
              <td data-value="78025368997">{{ $client->created_at }}</td>
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
        {{ $clients->links() }}
      </div>
    </div>
  </div>
</div>
@stop