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
                  Primary Contact
              </th>
              <th data-hide="phone,tablet">
                  Primary Email
              </th>
              <th data-hide="phone,tablet">
                  Primary Phone
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
          @foreach($clients as $client)
          <tr>
            <td><a href="{{ '/clients/' . $client['contact_id'] }}">{{ $client['contact_name'] }}</a></td>
            <td><a href="{{ '/clients/' . $client['contact_id'] }}">{{ $client['first_name'] }} {{ $client['last_name'] }}</a></td>
            <td><a href="{{ '/clients/' . $client['contact_id'] }}">{{ $client['email'] }}</a></td>
            <td><a href="{{ '/clients/' . $client['contact_id'] }}">{{ $client['phone'] }}</a></td>
            <td><a href="{{ '/clients/' . $client['contact_id'] }}">{{ DateClass::formatDate($client['created_time'], 'jS M Y') }}</a></td>
            @if($client['status'] === 'active')
              <td><a href="{{ '/clients/' . $client['contact_id'] }}"><span class="label bg-success">{{ ucfirst($client['status']) }}</a></span></td>
            @else
              <td><a href="{{ '/clients/' . $client['contact_id'] }}"><span class="label bg-danger">{{ ucfirst($client['status']) }}</a></span></td>
            @endif
          </tr>
          @endforeach
        </tbody>
        <tfoot class="hide-if-no-paging">
          <!-- <tr>
              <td colspan="5" class="text-center">
                  <ul class="pagination"></ul>
              </td>
          </tr> -->
        </tfoot>
      </table>
    </div>
  </div>
</div>
<script>
    // window.onload = function() {
    //   (function(){
    //     onloadAjax('clients', 'get', 'tbody');
    //   })();
    // };
</script>
@stop