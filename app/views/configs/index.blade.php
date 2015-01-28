@extends('templates.main-template')
@section('content')
<div role="tabpanel" class="tab-container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active text-upper font-bold"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Email Settings</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">More Settings</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">More Settings</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#websites" aria-controls="websites" role="tab" data-toggle="tab">More Settings</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#domains" aria-controls="domains" role="tab" data-toggle="tab">More Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <!-- account -->
    <div role="tabpanel" class="tab-pane active" id="email">
    	@include('partials.configs.email')
    </div>
    <!-- / account -->

    <!-- projects -->
    <div role="tabpanel" class="tab-pane" id="projects">

    </div>
    <!-- / projects -->

    <!-- websites -->
    <div role="tabpanel" class="tab-pane" id="websites">
        
    </div>
    <!-- / websites -->
    
    <!-- domains -->
    <div role="tabpanel" class="tab-pane" id="domains">
        
    </div>
    <!-- / domains -->

    <!-- invoices -->
    <div role="tabpanel" class="tab-pane" id="invoices">
        
    </div>
    <!-- / invoices -->

  </div>
</div>
@stop