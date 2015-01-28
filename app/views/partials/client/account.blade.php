<div class="wrapper-sm">   
  <div class="row m-0 p-0">
    <div class="col-md-6">
      <h3>Client Profile</h3>

      <table class="table table-bordered table-hover bg-white-only">
        <tr>
          <td class="v-middle font-bold">Client:</td>
          <td class="v-middle">{{ $client->business_name }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Status:</td>
          <td class="v-middle">{{ Client::getClientStatus($client->client_status) }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Client Since:</td>
          <td class="v-middle">{{ DateClass::formatDate($client->created_at, 'jS M Y') }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Website:</td>
          <td class="v-middle"><a class="external-link" target="_blank" href="{{ 'http://' . $client->website }}">{{ $client->website }} <i class="fa fa-external-link"></i></a></td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Industry:</td>
          <td class="v-middle">{{ DB::table('industry')->where('id', '=', $client->industry_id)->pluck('industry') }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Billing Email:</td>
          <td class="v-middle"><a class="external-link" href="{{ url('emails/create?to=' . $client->id) }}">{{ $client->email }} <i class="fa fa-envelope"></i></a></td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Phone:</td>
          <td class="v-middle"> - </td>
        </tr>
        <tr>
          <td class="v-middle font-bold">ABN/ACN:</td>
          <td class="v-middle">{{ $client->abn }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Street Address:</td>
          <td class="v-middle">{{ $client->street_address }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">City/Suburb:</td>
          <td class="v-middle">{{ $client->city }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">State:</td>
          <td class="v-middle">{{ $client->state }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Post Code:</td>
          <td class="v-middle">{{ $client->post_code }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Country:</td>
          <td class="v-middle">{{ $client->country }}</td>
        </tr>
      </table>

      <div class="client-btns">
          <ul>
              <li><a href="#" class="btn btn-md btn-info">Edit Profile</a></li>
              @if($client->client_status === 1)
              <li>
                <a  href="#"
                    data-title="Client Suspension" 
                    data-message="Are you sure you want to suspend this client's account?<br><br>By suspending the client's account you are also suspending each of the contacts assigned to this client. Doing so will also suspend each contact as well."
                    data-method="put"
                    data-ajax
                    data-url="{{ url('clients/' . $client->id . '/suspend') }}"
                    class="bootbox-confirm btn btn-md btn-danger">
                  Suspend Client
                </a>
              </li>
              @elseif($client->client_status === 2)
                <li>
                <a  href="#"
                    data-title="Client Unsuspension" 
                    data-message="Are you sure you want to unsuspend this client's account?"
                    data-method="put"
                    data-ajax
                    data-url="{{ url('clients/' . $client->id . '/unsuspend') }}"
                    class="bootbox-confirm btn btn-md btn-warning">
                  Unsuspend Client
                </a>
              </li>
              <li>
                <a  href="#"
                    data-title="Client Deactivation" 
                    data-message="Are you sure you want to deactivate this client's account?"
                    data-method="put"
                    data-ajax
                    data-url="{{ url('clients/' . $client->id . '/deactivate') }}"
                    class="bootbox-confirm btn btn-md btn-danger">
                  Deactivate Client
                </a>
              </li>
              @else
                <li>
                <a  href="#"
                    data-title="Client Activation" 
                    data-message="Are you sure you want to activate this client's account?"
                    data-method="put"
                    data-ajax
                    data-url="{{ url('clients/' . $client->id . '/activate') }}"
                    class="bootbox-confirm btn btn-md btn-default">
                  Activate Client
                </a>
              </li>
              @endif

          </ul>
      </div>
    </div>
    <div class="col-md-6">
      <h3>Client Contacts</h3>
      @if(count($clientUsers) < 1)
        <p>This client has no users assigned.</p>
      @else
      <table class="table table-bordered table-hover bg-white-only">
        <tr style="font-weight: bold">
          <td style="width:30%">Name</td>
          <td class="ta-center" style="width:15%">Status</td>
          <td class="ta-center" style="width:25%">Last Online</td>
          <td class="ta-center" style="width:30%">Actions</td>
        </tr>
        @foreach($clientUsers as $user)
        <tr>
          <td class="v-middle"><a href="#">{{ $user->first_name . ' ' . $user->last_name }}</a></td>
          <td class="ta-center v-middle">{{ User::getUserStatus($user->user_status) }}</td>
          <td class="ta-center v-middle">{{ DateClass::formatDate($user->updated_at, 'jS M Y, g:ia') }}</td>
          <td class="ta-center v-middle" style="white-space: nowrap">
              <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-sm btn-info">Edit</a>
              @if($user->user_status === 1)
              <a href="#" class="btn btn-sm btn-success">Login As</a>
              <a  href="#"
                  data-title="User Suspension"
                  data-message="Are you sure you want to suspend this user?<br><br>Suspending a user will immediately sign then out if they are signed in, and they will no longer be able to sign back in to their account until the suspension has been lifted."
                  data-ajax
                  data-method="put"
                  data-url="{{ url('users/' . $user->id . '/suspend') }}"
                  class="bootbox-confirm btn btn-sm btn-danger">
                Supsend User
              </a>
              @elseif($user->user_status === 2)
              <!-- 2 buntton: ususpend and deactivate -->
              <a  href="#"
                  data-title="User Unsuspension"
                  data-message="Are you sure you want to unsuspend this user?"
                  data-ajax
                  data-method="put"
                  data-url="{{ url('users/' . $user->id . '/unsuspend') }}"
                  class="bootbox-confirm btn btn-sm btn-warning">
                Unsupsend User
              </a>
              <a  href="#"
                  data-title="User Deactivation"
                  data-message="Are you sure you want to deactivate this user?"
                  data-ajax
                  data-method="put"
                  data-url="{{ url('users/' . $user->id . '/deactivate') }}"
                  class="bootbox-confirm btn btn-sm btn-danger">
                Deactivate User
              </a>
              @else
              <!-- 1 button: activate -->
              <a  href="#"
                  data-title="User Activation"
                  data-message="Are you sure you want to activate this user?"
                  data-ajax
                  data-method="put"
                  data-url="{{ url('users/' . $user->id . '/activate') }}"
                  class="bootbox-confirm btn btn-sm btn-default">
                Activate User
              </a>
              @endif

          </td>
        </tr>
        @endforeach
      </table>
      @endif
      <div class="client-btns">
          <ul>
              <li>
                <a  href="{{ url('users/create') }}" class="btn btn-sm btn-info">Add Contact</a>
              </li>
          </ul>
      </div>
    </div>
  </div>
</div>