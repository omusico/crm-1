<!-- Modal -->
<div class="modal fade" id="updateItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['action' => 'ItemsController@update', 'method' => 'put', 'id' => 'update-item-form', 'class' => 'no-return-form form-label-bold']) }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Item</h4>
      </div>
      <div class="modal-body">
        
            {{ Form::hidden('item_id', null) }}

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="first_name">Name <span class="text-danger">*</span></label>
                        {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last_name">Price <span class="text-danger">*</span></label>
                        <div class="input-group m-b">
                          <span class="input-group-addon">$</span>
                          {{ Form::text('price', null, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- / row -->

            <div class="form-group">
                <label for="email">Description <span class="text-danger">*</span></label>
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4', 'required']) }}
            </div>

      </div>
      <div class="modal-footer">
        <a  href="#"
            id="delete-item"
            data-title="Delete Item"
            data-message="Are you sure you want to delete this item?<br><b>NOTE:</b> This cannot be undone."
            data-method="delete"
            data-ajax
            data-url=""
            class="pull-left bootbox-confirm btn btn-md btn-danger">
            Delete Item
        </a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info">Save Changes</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>