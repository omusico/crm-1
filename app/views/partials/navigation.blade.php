<!-- header -->
<header id="header" class="app-header navbar" role="menu">
        <!-- navbar header -->
    <div class="navbar-header bg-dark">
      <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
        <i class="glyphicon glyphicon-cog"></i>
      </button>
      <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
        <i class="glyphicon glyphicon-align-justify"></i>
      </button>
      <!-- brand -->
      <a href="#/" class="navbar-brand text-lt">
        <i class="fa fa-hacker-news"></i>
        <img src="{{ asset('img/logo.png') }}" alt="." class="hide">
        <span class="hidden-folded m-l-xs">Yak</span>
      </a>
      <!-- / brand -->
    </div>
    <!-- / navbar header -->

    <!-- navbar collapse -->
    <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
      <!-- buttons -->
      <div class="nav navbar-nav hidden-xs">
        <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
          <i class="fa fa-dedent fa-fw text"></i>
          <i class="fa fa-indent fa-fw text-active"></i>
        </a>
        <a href="#" class="btn no-shadow navbar-btn" ui-toggle="show" target="#aside-user">
          <i class="icon-user fa-fw"></i>
        </a>
      </div>
      <!-- / buttons -->

      <!-- search form -->
      <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse" role="search" ng-controller="TypeaheadDemoCtrl">
        <div class="form-group">
          <div class="input-group">
            <input type="text" ng-model="selected" typeahead="state for state in states | filter:$viewValue | limitTo:8" class="form-control input-sm bg-light no-border rounded padder" placeholder="Search projects...">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
      </form>
      <!-- / search form -->

      <!-- nabar right -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle">
            <i class="icon-bell fa-fw"></i>
            <span class="visible-xs-inline">Notifications</span>
            <span class="badge badge-sm up bg-danger pull-right-xs">2</span>
          </a>
          <!-- dropdown -->
          <div class="dropdown-menu w-xl animated fadeInUp">
            <div class="panel bg-white">
              <div class="panel-heading b-light bg-light">
                <strong>You have <span>2</span> notifications</strong>
              </div>
              <div class="list-group">
                <a href class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="{{ asset('img/a0.jpg') }}" alt="..." class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                </a>
                <a href class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                </a>
              </div>
              <div class="panel-footer text-sm">
                <a href class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </div>
            </div>
          </div>
          <!-- / dropdown -->
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
              <img src="{{ asset('img/a0.jpg') }}" alt="...">
              <i class="on md b-white bottom"></i>
            </span>
            <span class="hidden-sm hidden-md">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</span> <b class="caret"></b>
          </a>
          <!-- dropdown -->
          <ul class="dropdown-menu animated fadeInRight w">
            <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
              <div>
                <p>300mb of 500mb used</p>
              </div>
              <div class="progress progress-xs m-b-none dker">
                <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
              </div>
            </li>
            <li>
              <a href>
                <span class="badge bg-danger pull-right">30%</span>
                <span>Settings</span>
              </a>
            </li>
            <li>
              <a ui-sref="app.page.profile">Profile</a>
            </li>
            <li>
              <a ui-sref="app.docs">
                <span class="label bg-success pull-right">new</span>
                Help
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="{{ action('AuthController@destroy') }}">Logout</a>
            </li>
          </ul>
          <!-- / dropdown -->
        </li>
      </ul>
      <!-- / navbar right -->
    </div>
    <!-- / navbar collapse -->
</header>
<!-- / header -->

<!-- aside -->
<aside id="aside" class="app-aside hidden-xs bg-dark">
        <div class="aside-wrap">
      <div class="navi-wrap">
        <!-- user -->
        <div class="clearfix hidden-xs text-center hide" id="aside-user">
          <div class="dropdown wrapper">
            <a href="app.page.profile">
              <span class="thumb-lg w-auto-folded avatar m-t-sm">
                <img src="{{ asset('img/a0.jpg') }}" class="img-full" alt="...">
              </span>
            </a>
            <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
              <span class="clear">
                <span class="block m-t-sm">
                  <strong class="font-bold text-lt">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</strong> 
                  <b class="caret"></b>
                </span>
                <span class="text-muted text-xs block">Art Director</span>
              </span>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu animated fadeInRight w hidden-folded">
              <li class="wrapper b-b m-b-sm bg-success m-t-n-xs">
                <span class="arrow top hidden-folded arrow-info"></span>
                <div>
                  <p>300mb of 500mb used</p>
                </div>
                <div class="progress progress-xs m-b-none dker">
                  <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                </div>
              </li>
              <li>
                <a href>Settings</a>
              </li>
              <li>
                <a href="page_profile.html">Profile</a>
              </li>
              <li>
                <a href>
                  <span class="badge bg-danger pull-right">3</span>
                  Notifications
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="page_signin.html">Logout</a>
              </li>
            </ul>
            <!-- / dropdown -->
          </div>
          <div class="line dk hidden-folded"></div>
        </div>
        <!-- / user -->

        <!-- nav -->
        <nav ui-nav class="navi clearfix">
          <ul class="nav">
            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
              <span>Navigation</span>
            </li>
            <li class="active">
              <a href="{{ action('MainController@index') }}" class="auto">
                <i class="glyphicon glyphicon-stats icon"></i>
                <span class="font-bold">Dashboard</span>
              </a>
            </li>
            
            <!-- SUPPORT NAV -->
            <li>
              <a href="{{ action('SupportController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <b class="badge bg-success pull-right" data-toggle="tooltip" data-placement="top" title="13 Open Tickets">13</b>
                <i class="fa fa-ticket icon"></i>
                <span class="font-bold">Support</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Support</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('SupportController@tickets') }}">
                    <b class="badge bg-success pull-right">13</b> 
                    <span>Open Tickets</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('SupportController@myTickets') }}">
                  <b class="badge bg-info pull-right">4</b> 
                    <span>My Tickets</span>
                  </a>
                </li>                
              </ul>
            </li>

            <!-- EMAILS NAV -->
            <li>
              <a href="{{ action('EmailsController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <b class="badge bg-success pull-right" data-toggle="tooltip" data-placement="top" title="7 New Emails">7</b>
                <i class="glyphicon glyphicon-envelope icon"></i>
                <span class="font-bold">Email</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Email</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('EmailsController@create') }}">

                    <span>New Email</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('EmailsController@index') }}">
                    <b class="badge bg-success pull-right">7</b>
                    <span>Inbox</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('EmailsController@sent') }}">
                    <span>Sent</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('EmailsController@drafts') }}">
                    <span>Drafts</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('EmailsController@index') }}">
                    <span>Trash</span>
                  </a>
                </li>      
              </ul>
            </li>

            <!-- CLIENTS NAV -->
            <li>
              <a href="{{ action('ClientsController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <i class="fa fa-briefcase icon"></i>
                <span class="font-bold">Clients</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Clients</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ClientsController@create') }}">
                    <span>Create Client</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ClientsController@index') }}">
                    <span>Clients</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- INVOICES NAV -->
            <li>
              <a href="{{ action('InvoicesController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <i class="fa fa-briefcase icon"></i>
                <span class="font-bold">Invoices</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Invoices</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('InvoicesController@create') }}">
                    <span>Create Invoice</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('InvoicesController@index') }}">
                    <span>Invoices</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ItemsController@index') }}">
                    <span>Invoice Items</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ItemsController@create') }}">
                    <span>New Item</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Users NAV -->
            <li>
              <a href="{{ action('UsersController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <i class="fa fa-users icon"></i>
                <span class="font-bold">Users</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Users</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('UsersController@create') }}">
                    <span>Create User</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('UsersController@index') }}">
                    <span>Users</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- DOMAINS NAV -->
            <li>
              <a href="{{ action('DomainsController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <i class="fa fa-globe icon"></i>
                <span class="font-bold">Domains</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Domains</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('DomainsController@create') }}">
                    <span>New Domain</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('DomainsController@index') }}">
                    <span>Domains</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('DomainsController@dns') }}">
                    <span>DNS Tools</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- PROJECTS NAV -->
            <li>
              <a href="{{ action('ProjectsController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <i class="fa fa-cubes icon"></i>
                <span class="font-bold">Projects</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Projects</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ProjectsController@create') }}">
                    <span>New Project</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ProjectsController@index') }}">
                    <span>Projects</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- THEMES NAV -->
            <li>
              <a href="{{ action('ThemesController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <i class="fa fa-puzzle-piece icon"></i>
                <span class="font-bold">Themes</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Themes</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ThemesController@create') }}">
                    <span>New Theme</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ThemesController@index') }}">
                    <span>Themes</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- CONTACTS NAV -->
            <li>
              <a href="{{ action('ContactsController@index') }}" class="auto">
                <span class="pull-right text-muted">
                  <i class="fa fa-fw fa-angle-right text"></i>
                  <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <i class="fa fa-phone icon"></i>
                <span class="font-bold">Contacts</span>
              </a>
              <ul class="nav nav-sub dk">
                <li class="nav-sub-header">
                  <a href>
                    <span>Contacts</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ContactsController@create') }}">
                    <span>New Contact</span>
                  </a>
                </li>
                <li>
                  <a href="{{ action('ContactsController@index') }}">
                    <span>Contacts</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- LEADS NAV -->
            <li>
              <a href="{{ action('LeadsController@index') }}" class="auto">
                <b class="badge bg-success pull-right" data-toggle="tooltip" data-placement="top" title="5 New Leads">5</b>
                <i class="fa fa-rss icon"></i>
                <span class="font-bold">Leads</span>
              </a>
            </li>

            <!-- PROPOSALS NAV -->
            <li>
              <a href="{{ action('ProposalsController@index') }}" class="auto">
                <i class="fa fa-rss icon"></i>
                <span class="font-bold">Proposals</span>
              </a>
            </li>

            <!-- GLOBAL CONFIGS NAV -->
            <li>
              <a href="{{ action('ConfigurationsController@index') }}" class="auto">
                <i class="fa fa-rss icon"></i>
                <span class="font-bold">Global Configs</span>
              </a>
            </li>

            <!-- KNOWLEDGE BASE NAV -->
            <li>
              <a href="{{ action('KnowledgeBaseController@index') }}" class="auto">
                <i class="fa fa-book icon"></i>
                <span class="font-bold">Knowledge Base</span>
              </a>
            </li>

            <!-- NOTIFICATIONS NAV -->
            <li>
              <a href="{{ action('NotificationsController@index') }}" class="auto">
                <i class="fa fa-bell icon"></i>
                <span class="font-bold">Notifications</span>
              </a>
            </li>

            <!-- DOCUMENTS NAV -->
            <li>
              <a href="{{ action('DocumentsController@index') }}" class="auto">
                <i class="fa fa-paperclip icon"></i>
                <span class="font-bold">Documents</span>
              </a>
            </li>

            <!-- EDITING TESTS NAV -->
            <li>
              <a href="{{ action('MainController@test') }}" class="auto">
                <i class="fa fa-paperclip icon"></i>
                <span class="font-bold">Editing Tests</span>
              </a>
            </li>

            <!-- EDITING TESTS NAV -->
            <li>
              <a href="{{ action('AuthController@signin') }}" class="auto">
                <i class="fa fa-paperclip icon"></i>
                <span class="font-bold">Sign in</span>
              </a>
            </li>

        </nav>
        <!-- nav -->

      </div>
    </div>
</aside>
<!-- / aside -->

<!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
    
    @if(isset($pageHeader))
    <div class="bg-light lter b-b wrapper-md">
      <h1 class="m-n font-thin h3">{{ $pageHeader }}</h1>
    </div>
    @endif