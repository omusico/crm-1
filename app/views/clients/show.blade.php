@extends('templates.main-template')
@section('content')
<div role="tabpanel" class="tab-container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active text-upper font-bold"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile & Contacts</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#invoices" onclick="alert('holla');" aria-controls="invoices" role="tab" data-toggle="tab">Invoices & Billing</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#websites" aria-controls="websites" role="tab" data-toggle="tab">Websites</a></li>
    <li role="presentation" class="text-upper font-bold"><a href="#domains" aria-controls="domains" role="tab" data-toggle="tab">Domains</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <!-- profile -->
    <div role="tabpanel" class="tab-pane active" id="profile">
        @include('partials.client.profile')
    </div>
    <!-- / profile -->

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
<script>
    
</script>
@stop