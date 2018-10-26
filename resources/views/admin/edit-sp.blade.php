
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="edit_ten"></h3>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('edit-sp')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" id="edit_id">
          <div class="form-group">
            <label for="edit-gia-nhap-vao" class="col-form-label">Giá nhập vào</label>
            <input type="number" class="form-control" id="edit-gia-nhap-vao" name="gia_nhap_vao">
          </div>
          <div class="form-group">
            <label for="edit-gia-xuat-ra" class="col-form-label">Giá xuất ra</label>
            <input type="number" class="form-control" id="edit-gia-xuat-ra" name="gia_xuat_ra">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
            <button type="submit" class="btn btn-primary" id="btn">Chỉnh sửa</button>
          </div>
        </form>
      </div>
      

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.btn-edit').click(function(){
      var old_value = $(this).val();
      old_value = JSON.parse(old_value);

      // Default Value
      $('#edit_ten').html('Chỉnh sửa sản phẩm: '+old_value.ten);
      $('#edit-gia-xuat-ra').val(old_value.gia_xuat_ra);  
      $('#edit-gia-nhap-vao').val(old_value.gia_nhap_vao); 
      $('#edit_id').val(old_value.id);
    });
  });
</script>