<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تغير حاله الطلب</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('order.update','test') }}" method="POST">
            @method('PUT')
            @csrf

            <input type="hidden" value="{{ $row->id }}" name="id">
            <div class="row">
                <div class="col">
                    <label>تفير الحاله الطلب</label>
                    <select class="form-control" name="status">
                        <option value="0" {{ $row->status == 0 ?'selected' : null }}>طلب جديد </option>
                        <option value="1" {{ $row->status == 1 ?'selected' : null }}>متكمل </option>
                        <option value="2" {{ $row->status == 2 ?'selected' : null }}>مرفوض  </option>
                        <option value="4" {{ $row->status == 4 ?'selected' : null }}>مرتجع  </option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button type="submit" class="btn btn-primary">تغير الحاله</button>
              </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>