@extends('templates.main-template')
@section('content')
<div class="wrapper-md">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      Invoices Listing
    </div>
    @if(count($invoices) < 1)
      <p class="p-15">There are no invoices to display.</p>
    @else
    <div class="panel-body b-b b-light">
      Search: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
    </div>
    <div>
      <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="15">
        <thead>
          <tr>
              <th data-toggle="true">
                  Invoice #
              </th>
              <th>
                  Client
              </th>
              <th data-hide="phone,tablet">
                  Due Date
              </th>
              <th data-hide="phone,tablet">
                  Total
              </th>
              <th data-hide="phone,tablet">
                  Balance
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
          <!-- load invoices here -->
            @foreach($invoices as $invoice)
              <tr>
                  <td><a href="{{ url('/invoices/'.$invoice['invoice_id']) }}">{{ $invoice['invoice_number'] }}</a></td>
                  <td><a href="{{ url('/clients/'.$invoice['customer_id']) }}">{{ $invoice['customer_name'] }}</a></td>
                  <td>{{ date("d/m/Y", strtotime($invoice['due_date'])) }}</td>
                  <td>{{ '$' . number_format($invoice['total'], 2, '.',',') }}</td>
                  <td>{{ '$' . number_format($invoice['balance'], 2, '.',',') }}</td>
                  <td>{{ ucfirst($invoice['status']) }}</td>
                  <td>
                    <a href class="btn btn-sm btn-info edit-invoice-link" data-invoice-id="{{ $invoice['invoice_id'] }}" data-toggle="modal" data-target="#updateinvoiceModal">Edit</a>
                    <a href class="btn btn-sm btn-danger edit-invoice-link" data-invoice-id="{{ $invoice['invoice_id'] }}" data-toggle="modal" data-target="#updateinvoiceModal">PDF</a>
                    </td>

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

@stop