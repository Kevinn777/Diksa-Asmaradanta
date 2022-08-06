<div class="modal fade" role="dialog" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleUserModal">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form id="userForm">
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="name" id="name" class="form-control" aria-describedby="emailHelp">
                    <span class="text-danger">
                        <strong id="errors_name"></strong>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp">
                    <span class="text-danger">
                        <strong id="errors_email"></strong>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="text" value="" name="password" id="password" class="form-control" aria-describedby="emailHelp">
                    <span class="text-danger">
                    </span>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" id="saveButton" value="create">Save</button>
        </div>
          </form>
      </div>
    </div>
  </div>
  