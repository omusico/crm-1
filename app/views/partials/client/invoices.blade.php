<div class="wrapper-sm">
    <h3>Client Invoices & Billing</h3>
    
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
                  Created On
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
        <tbody class="invoices">
          
        </tbody>
        <tfoot class="hide-if-no-paging">
          <tr>
              <!-- <td colspan="5" class="text-center">
                  <ul class="pagination"></ul>
              </td> -->
          </tr>
        </tfoot>
      </table>

      <div class="col-lg-12 pull-right">
        
      </div>
      
          <!-- <p>This client doesn't have any invoices.</p> -->
      
      <div class="client-btns">
          <ul>
              <li><a href="{{ action('InvoicesController@create') }}" class="btn btn-md btn-success">Create New Invoice</a></li>
          </ul>
      </div>
    </div>
</div>