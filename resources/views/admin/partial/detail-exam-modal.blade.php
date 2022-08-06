<div class="modal fade" role="dialog" id="quizModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleQuizModal">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form id="quizForm" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" id="id" class="form-control" aria-describedby="emailHelp">
                <input type="hidden" name="exam_id" id="exam_id" class="form-control" value="{{ $id }}" aria-describedby="emailHelp">
                <div class="mb-5">
                    <label for="" class="form-label">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <span class="text-danger">
                        <strong id="errors_name"></strong>
                    </span>
                </div>
                <div class="mb-5">
                    <label for="" class="form-label">Quiz Title</label>
                    <input type="text" name="title" id="title" class="form-control" aria-describedby="emailHelp">
                    <span class="text-danger">
                        <strong id="errors_name"></strong>
                    </span>
                </div>
                
                <div class="mb-5">
                  <label class="form-label">Quiz Model</label>
                  <div class="p-t-5" style="display: flex; gap: 2rem;">
                    <div class="form-check" id="pilgan">
                      <input class="form-check-input" type="radio" name="quiz_model" id="pilihan_ganda" value="pilihan_ganda">
                      <label class="form-check-label" for="gridRadios1">
                        Pilihan Ganda
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="quiz_model" id="gridRadios1" value="lisan">
                      <label class="form-check-label" for="gridRadios1">
                        Lisan
                      </label>
                    </div>
                  </div>
              </div>

                <div class="form-group" id="choice-container"> 
                  <label for="exampleInputEmail1">Choice</label>
                  <input name="choice" type="text" class="form-control mb-1" id="added_choice" placeholder="add choice">
                  <button type="button" class="btn btn-success mb-5 mt-3" id="add-choice">Add choice</button>
                  <div class="choice-wrapper" id="choice-wrapper" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem">
                      
                  </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" onclick="saveExam()">Save</button>
        </div>
          </form>
      </div>
    </div>
  </div>
  