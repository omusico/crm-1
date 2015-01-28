@extends('templates.main-template')
@section('content')
<div role="tabpanel" class="tab-container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active text-upper font-bold"><a href="#account" aria-controls="account" role="tab" data-toggle="tab">Profile & Contacts</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">Invoices & Billing</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#websites" aria-controls="websites" role="tab" data-toggle="tab">Websites</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#domains" aria-controls="domains" role="tab" data-toggle="tab">Domains</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <!-- account -->
    <div role="tabpanel" class="tab-pane active" id="account">
        @include('partials.client.account')
    </div>
    <!-- / account -->

    <!-- projects -->
    <div role="tabpanel" class="tab-pane" id="projects">
        @include('partials.client.projects')
    </div>
    <!-- / projects -->

    <!-- websites -->
    <div role="tabpanel" class="tab-pane" id="websites">
        @include('partials.client.websites')
    </div>
    <!-- / websites -->
    
    <!-- domains -->
    <div role="tabpanel" class="tab-pane" id="domains">
        @include('partials.client.domains')
    </div>
    <!-- / domains -->

    <!-- invoices -->
    <div role="tabpanel" class="tab-pane" id="invoices">
        @include('partials.client.invoices')
    </div>
    <!-- / invoices -->

  </div>
</div>
@stop