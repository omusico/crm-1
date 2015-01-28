  <div class="wrapper-md">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        Invoices & Billing
      </div>

      @if(count($clientInvoices->getCollection()) > 0)
      <div class="panel-body b-b b-light">
        Search: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
      </div>
      @endif
      <div>
        @if(count($clientInvoices->getCollection()) > 0)
        <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="15">
          <thead>
            <tr>
                <th data-toggle="true">
                    Invoice No.
                </th>
                <th>
                    Client
                </th>
                <th data-hide="phone,tablet" class="footable-sorted">
                    Created By
                </th>
                <th data-hide="phone,tablet">
                    Paid On
                </th>
                <th data-hide="phone">
                    Status
                </th>
            </tr>
          </thead>
          <tbody>
            @foreach($clientInvoices->getCollection() as $invoice)
              <tr>
                  <td><a href="">{{ '#' . $invoice->id }}</a></td>
                  <td><a href="{{ url('clients/'.$invoice->client_id) }}">{{ DB::table('clients')->where('id', '=', $invoice->client_id)->pluck('business_name') }}</a></td>
                  <td data-value="78025368997">{{ DB::table('users')->where('id', '=', $invoice->created_by)->pluck('first_name') . ' ' . DB::table('users')->where('id', '=', $invoice->created_by)->pluck('last_name') }}</td>
                  <td>{{ $invoice->paid_on }}</td>
                  <td data-value="1"><span class="label bg-success" title="Active">Paid</span></td>
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
          {{ $clientInvoices->links() }}
        </div>
        @else
            <h5 class="p-15 m-0">This client doesn't have any invoices.</h5>
        @endif
        <div class="client-btns">
            <ul>
                <li><a href="{{ action('InvoicesController@create') . '?c=' . $client->id }}" class="btn btn-md btn-success">Create New Invoice</a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>