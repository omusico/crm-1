<div class="col w-md bg-light dk b-r bg-auto">
    <div class="wrapper b-b bg">
      <button class="btn btn-sm btn-default pull-right visible-sm visible-xs" ui-toggle="show" target="#email-menu"><i class="fa fa-bars"></i></button>
      <a href="{{ action('EmailsController@create') }}" class="btn btn-sm btn-danger w-xs font-bold">Compose</a>
    </div>
    <div class="wrapper hidden-sm hidden-xs" id="email-menu">
      <ul class="nav nav-pills nav-stacked nav-sm">
        <li class="active"><a href="{{ action('EmailsController@index') }}">Inbox</a></li>
        <li>
          <a href="{{ action('EmailsController@sent') }}"><b class="badge bg-danger pull-right">3</b>Sent</a>
        </li>
        <li><a href="{{ action('EmailsController@drafts') }}">Drafts</a></li>
        <li><a href="{{ action('EmailsController@trash') }}">Trash</a></li>
      </ul>
      <div class="wrapper">Labels</div>
      <ul class="nav nav-pills nav-stacked nav-sm">
        <li>
          <a><i class="fa fa-fw fa-circle text-info"></i>Angular</a>
        </li>
        <li>
          <a><i class="fa fa-fw fa-circle text-primary"></i>Bootstrap</a>
        </li>
        <li>
          <a><i class="fa fa-fw fa-circle text-success"></i>Work</a>
        </li>
        <li>
          <a><i class="fa fa-fw fa-circle text-muted"></i>Client</a>
        </li>
      </ul>
      <div class="wrapper">
        <form name="label">
          <div class="input-group">
            <input type="text" class="form-control input-sm" placeholder="New label">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Add</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>