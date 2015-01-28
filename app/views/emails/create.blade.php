@extends('templates.main-template')
@section('content')

<div class="hbox hbox-auto-xs hbox-auto-sm" ng-controller="MailCtrl">
  
  @include('partials.email-sidebar')
  
  <div class="col">
    
    <div>
      <!-- header -->
      <div class="wrapper bg-light lter b-b">
        
        <div class="btn-toolbar">
          <div class="btn-group">
            <button class="btn btn-sm btn-bg btn-default" data-toggle="tooltip" data-placement="bottom" data-title="Save Draft" data-original-title="" title=""><i class="fa fa-save"></i> Save as Draft</button>
          </div>
          <div class="btn-group">
            <button class="btn btn-sm btn-bg btn-default" data-toggle="tooltip" data-placement="bottom" data-title="Discard" data-original-title="" title=""><i class="fa fa-trash-o"></i> Discard</button>
          </div>
        </div>
      </div>
      <!-- / header -->

    <div class="wrapper">

    	{{ Form::open(['action' => 'EmailsController@store']) }}

    		<div class="col-sm-12">
      			<div class="form-group">
		        	<label class="font-bold">To:</label>
		        	{{ Form::select('to[]', 
		        			[
								'nick_law@tpg.com.au' => 'Nicholas Law <nick_law@tpg.com.au>',
								'n.law@thelobbi.com' => 'Nicholas Law <n.law@thelobbi.com>',
								'nick@upandabove.com.au' => 'Nicholas Law <nick@upandabove.com.au>'
		        			],
		        			$to, ['class' => 'form-control chosen-selected', 'ui-jq' => 'chosen', 'data-placeholder' => 'Select recipients...', 'multiple', 'required']) }}
              	</div>
            	
            	<div class="row">
	            	<div class="col-sm-6">
		              	<div class="form-group">
				        	<label class="font-bold">Cc:</label>
				        	{{ Form::select('cc[]', 
				        			[
										'nick_law@tpg.com.au' => 'Nicholas Law <nick_law@tpg.com.au>',
										'n.law@thelobbi.com' => 'Nicholas Law <n.law@thelobbi.com>',
										'nick@upandabove.com.au' => 'Nicholas Law <nick@upandabove.com.au>'
				        			],
				        			$cc, ['class' => 'form-control chosen-selected', 'ui-jq' => 'chosen', 'data-placeholder' => 'Select recipients...', 'multiple']) }}
		              	</div>
	              	</div>

	              	<div class="col-sm-6">
              			<div class="form-group">
				        	<label class="font-bold">Bcc:</label>
				        	{{ Form::select('bcc[]', 
				        			[
										'nick_law@tpg.com.au' => 'Nicholas Law <nick_law@tpg.com.au>',
										'n.law@thelobbi.com' => 'Nicholas Law <n.law@thelobbi.com>',
										'nick@upandabove.com.au' => 'Nicholas Law <nick@upandabove.com.au>'
				        			],
				        			$bcc, ['class' => 'form-control chosen-selected', 'ui-jq' => 'chosen', 'data-placeholder' => 'Select recipients...', 'multiple']) }}
		              	</div>
		            </div>
              	</div>

              	<div class="form-group">
			        <label class="font-bold">Subject:</label>			        
			        {{ Form::text('subject', $subject, ['class' => 'form-control']) }}
			    </div>

			    <div class="form-group">
		        <label class="font-bold">Content</label>
		        <div>
		          <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
		            <div class="btn-group dropdown">
		              <a class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" tooltip="Font"><i class="fa text-base fa-font"></i><b class="caret"></b></a>
		              <ul class="dropdown-menu">
		                <li><a dropdown-toggle data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li> 
		                <li><a dropdown-toggle data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li>
		                <li><a dropdown-toggle data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li></ul>
		            </div>
		            <div class="btn-group dropdown">
		              <a class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" tooltip="Font Size"><i class="fa text-base fa-text-height"></i>&nbsp;<b class="caret"></b></a>
		              <ul class="dropdown-menu">
		                <li><a dropdown-toggle data-edit="fontSize 5" style="font-size:24px">Huge</a></li>
		                <li><a dropdown-toggle data-edit="fontSize 3" style="font-size:18px">Normal</a></li>
		                <li><a dropdown-toggle data-edit="fontSize 1" style="font-size:14px">Small</a></li>
		              </ul>
		            </div>
		            <div class="btn-group">
		              <a class="btn btn-sm btn-default" data-edit="bold" tooltip="Bold (Ctrl/Cmd+B)"><i class="fa text-base fa-bold"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="italic" tooltip="Italic (Ctrl/Cmd+I)"><i class="fa text-base fa-italic"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="strikethrough" tooltip="Strikethrough"><i class="fa text-base fa-strikethrough"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="underline" tooltip="Underline (Ctrl/Cmd+U)"><i class="fa text-base fa-underline"></i></a>
		            </div>
		            <div class="btn-group">
		              <a class="btn btn-sm btn-default" data-edit="insertunorderedlist" tooltip="Bullet list"><i class="fa text-base fa-list-ul"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="insertorderedlist" tooltip="Number list"><i class="fa text-base fa-list-ol"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="outdent" tooltip="Reduce indent (Shift+Tab)"><i class="fa text-base fa-dedent"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="indent" tooltip="Indent (Tab)"><i class="fa text-base fa-indent"></i></a>
		            </div>
		            <div class="btn-group">
		              <a class="btn btn-sm btn-default" data-edit="justifyleft" tooltip="Align Left (Ctrl/Cmd+L)"><i class="fa text-base fa-align-left"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="justifycenter" tooltip="Center (Ctrl/Cmd+E)"><i class="fa text-base fa-align-center"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="justifyright" tooltip="Align Right (Ctrl/Cmd+R)"><i class="fa text-base fa-align-right"></i></a>
		              <a class="btn btn-sm btn-default" data-edit="justifyfull" tooltip="Justify (Ctrl/Cmd+J)"><i class="fa text-base fa-align-justify"></i></a>
		            </div>
		          </div>
		          <div name="content" ui-jq="wysiwyg" id="wysiwyg-editor" class="form-control h-auto" style="min-height:200px;">{{ $content }}</div>
		        </div>
		      </div>

		      <div class="form-group">
		      	<label class="font-bold">Attachments</label>
		      	{{ Form::file('Attachments', ['class' => 'btn btn-md btn-danger', 'multiple']) }}
		      </div>

		      <div class="form-group">
		      	{{ Form::submit('Send', ['class' => 'btn btn-lg btn-danger']) }}
		      </div>

            </div>
      	
      	{{ Form::close() }}
    	</form>
  </div>

    </div>

  </div>
</div>
@stop