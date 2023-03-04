<!-- The Delete Item -->
<div class="modal" id="deleteModelId">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
            <form id="deleteFormId" method="post">
                @csrf
                <h4>Are you sure you wan't to delete this?</h4>
                <!-- Modal footer -->
                <div class="modal-footer bt-none">
                    <button type="submit" class="btn btn-danger px-5" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-info text-white px-5" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

