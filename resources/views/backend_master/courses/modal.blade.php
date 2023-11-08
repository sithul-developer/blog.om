<!-- Start-Delete-Modal-->

<div class="modal fade" id="deletetModal">
    <form action="{{ url('panel/dashboard/courses/delete') }} " method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="display: flex;
            align-items: center;">
                        <i class="bi bi-exclamation-octagon text-xl text-danger"
                            style="font-size: 2rem;    margin-right: 1rem"> </i>Are you sure you want to go?
                        <input type='hidden' name='courses' id='deleteid' />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="bi bi-backspace"></i> No </button>
                    <button type="submit"
                            class="btn btn-sm  btn-primary"><i class="bi bi-check2-circle"> </i>Yes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End-Delete-Modal-->
