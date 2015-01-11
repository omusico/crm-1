@extends('templates.main-template')
@section('content')
<div role="tabpanel" class="tab-container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active text-upper font-bold"><a href="#account" aria-controls="account" role="tab" data-toggle="tab">My Account</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#websites" aria-controls="websites" role="tab" data-toggle="tab">Websites</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#domains" aria-controls="domains" role="tab" data-toggle="tab">Domains</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">Billing & Invoices</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="account">1</div>
    <div role="tabpanel" class="tab-pane" id="websites">2</div>
    <div role="tabpanel" class="tab-pane" id="domains">
        <div class="wrapper-md">
          <div class="panel panel-default">
            <div class="panel-heading font-bold">
              Domain Listing
            </div>
            <div class="panel-body b-b b-light">
              Search: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
            </div>
            <div>
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
                      <td><a href="{{ url('clients/'.$domain->owned_by) }}">{{ DB::table('clients')->where('id', '=', $domain->owned_by)->pluck('business_name') }}</a></td>
                      <td>{{ $domain->purchase_date }}</td>
                      <td data-value="78025368997">{{ $domain->expiry_date }}</td>
                      <td data-value="1"><span class="label bg-success" title="Active">Registered</span></td>
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
            </div>
          </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="invoices">4</div>
  </div>
</div>
@stop