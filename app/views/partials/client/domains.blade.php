<div class="wrapper-sm">
  <h3>Client's Domains</h3>
  @if(count($clientDomains->getCollection()) > 0)
  <div class="panel-body b-b b-light">
    Search: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
  </div>
  @endif
  <div>
    @if(count($clientDomains->getCollection()) > 0)
    <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="15">
      <thead>
        <tr>
            <th data-toggle="true">
                Domain Name
            </th>
            <th>
                Owned By
            </th>
            <th data-hide="phone,tablet">
                Purchase Date
            </th>
            <th data-hide="phone,tablet" class="footable-sorted">
                Expiry Date
            </th>
            <th data-hide="phone">
                Status
            </th>
        </tr>
      </thead>
      <tbody>
        @foreach($clientDomains->getCollection() as $domain)
          <tr>
              <td><a href="">{{ $domain->domain_name }}</a></td>
              <td class=""><a href="{{ url('clients/'.$domain->owned_by) }}">{{ DB::table('clients')->where('id', '=', $domain->owned_by)->pluck('business_name') }}</a></td>
              <td data-value="">{{ $domain->purchase_date }}</td>
              <td data-value="">{{ DateClass::formatDate($domain->expiry_date, 'j/m/y') }}</td>
              <td><span class="label bg-success" title="Active">Registered</span></td>
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
      {{ $clientDomains->links() }}
    </div>
    @else
        <p>This client doesn't have any domains.<p>
    @endif
    <div class="client-btns">
        <ul>
            <li><a href="{{ action('DomainsController@create') . '?c=' . $client->id }}" class="btn btn-md btn-success">Purchase New Domain</a></li>
            <li><a href="{{ action('DomainsController@transfer') . '?c=' . $client->id }}" class="btn btn-md btn-danger">Transfer Existing Domain</a></li>
        </ul>
    </div>
  </div>
</div>