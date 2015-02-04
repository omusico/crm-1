@extends('templates.main-template')
@section('content')
<div class="wrapper-md">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      Items Listing
    </div>
    @if(count($items) < 1)
      <p class="p-15">There are no items to display.</p>
    @else
    <div class="panel-body b-b b-light">
      Search: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
    </div>
    <div>
      <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="15">
        <thead>
          <tr>
              <th data-toggle="true">
                  Item
              </th>
              <th>
                  Description
              </th>
              <th data-hide="phone,tablet">
                  Price
              </th>
              <th data-hide="phone,tablet">
                  Status
              </th>
              <th data-hide="phone,tablet">
                  Actions
              </th>
          </tr>
        </thead>
        <tbody>
          <!-- load items here -->
            @foreach($items as $item)
              <tr>
                  <td><a href="{{ url('/items/'.$item['item_id']) }}">{{ $item['name'] }}</a></td>
                  <td>{{ $item['description'] }}</td>
                  <td>{{ $item['rate'] }}</td>
                  @if($item['status'] === 'active')
                    <td><span class="label bg-success">{{ ucfirst($item['status']) }}</span></td>
                  @else
                    <td><span class="label bg-danger">{{ ucfirst($item['status']) }}</span></td>
                  @endif
                  <td><a href class="btn btn-sm btn-info edit-item-link" data-item-id="{{ $item['item_id'] }}" data-toggle="modal" data-target="#updateItemModal">Edit</a></td>
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
    </div>
    @endif
  </div>
</div>

@include('partials.items.modal-update-item')

@stop