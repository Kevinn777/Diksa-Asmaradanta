<div class="modal fade" role="dialog" id="examModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleUserModal">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form id="examForm" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" id="id" class="form-control" aria-describedby="emailHelp">
                <div class="mb-3">
                    <label for="" class="form-label">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <span class="text-danger">
                        <strong id="errors_name"></strong>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tahap</label>
                    <input type="number" name="tahap" id="tahap" class="form-control" aria-describedby="emailHelp">
                    <span class="text-danger">
                        <strong id="errors_name"></strong>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" aria-describedby="emailHelp">
                    <span class="text-danger">
                        <strong id="errors_name"></strong>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" aria-describedby="emailHelp">
                    <span class="text-danger">
                        <strong id="errors_name"></strong>
                    </span>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" onclick="saveExam()">Save</button>
        </div>
          </form>
      </div>
    </div>
  </div>
  