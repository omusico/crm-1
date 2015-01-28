  <div class="wrapper-md">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        Websites
      </div>

      @if(count($clientProjects->getCollection()) > 0)
      <div class="panel-body b-b b-light">
        Search: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
      </div>
      @endif
      <div>
        @if(count($clientProjects->getCollection()) > 0)
        <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="15">
          <thead>
            <tr>
                <th data-toggle="true">
                    Project Title
                </th>
                <th>
                    Assigned To
                </th>
                <th data-hide="phone,tablet">
                    Created By
                </th>
                <th data-hide="phone,tablet" class="footable-sorted">
                    Project Type
                </th>
                <th data-hide="phone">
                    Status
                </th>
            </tr>
          </thead>
          <tbody>
            @foreach($clientProjects->getCollection() as $project)
              <tr>
                  <td>thisdomain.com.au</td>
                  <td><a href="{{ url('users/'.$project->assigned_to) }}">{{ DB::table('users')->where('id', '=', $project->assigned_to)->pluck('first_name') . ' ' . DB::table('users')->where('id', '=', $project->assigned_to)->pluck('last_name') }}</a></td>
                  <td><a href="{{ url('users/'.$project->created_by) }}">{{ DB::table('users')->where('id', '=', $project->created_by)->pluck('first_name') . ' ' . DB::table('users')->where('id', '=', $project->created_by)->pluck('last_name') }}</a></td>
                  <td>Website</td>
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
          {{ $clientProjects->links() }}
        </div>
        @else
            <h5 class="p-15 m-0">This client doesn't have any websites.</h5>
        @endif
        <div class="client-btns">
            <ul>
                <li><a href="{{ action('ProjectsController@create') . '?c=' . $client->id }}" class="btn btn-md btn-success">Add a Website</a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>