

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="text-danger brand-edit-error"></div>
        <form action="" method="post">
            <label for="label">Brand</label>
            <input type="text" id="edit_brand_input" class="form-control"value="" placeholder="Enter brand">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ url('/vendor/brand-edit') }}"  class="btn btn-primary confirm_edit_brand_btn" id="">Edit brand</a>
      </div>
    </div>
  </div>
</div>
