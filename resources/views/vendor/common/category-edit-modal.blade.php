<!-- data-toggle="modal" data-target="#exampleModal"       add this to a button -->

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="text-danger category-edit-error"></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="label">Category name</label>
                <input type="text" id="edit_category_name_input" class="form-control"value="" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="label">Image</label>
                <input type="file" id="edit_category_image_input" class="form-control" value="" placeholder="">
            </div>
            <div class="form-group">
                <label for="label">Round image</label>
                <input type="file" id="edit_category_round_input" class="form-control" value="" placeholder="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ url('/vendor/category-edit') }}"  class="btn btn-primary confirm_edit_category_btn" id="">Edit Category</a>
      </div>
    </div>
  </div>
</div>
