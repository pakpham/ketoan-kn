
<div class="modal fade" id="formEditXR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Chỉnh sửa thanh toán: <b id="edit_ten" style="color: green"></b></h3>

      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('edit-xuat-ra')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="edit_id" id="edit_id">

          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-12 pt-0" style="color: green">Tổng tiền cần thanh toán: <b id="edit-thanh-tien"></b></legend>
              <legend class="col-form-label col-sm-12 pt-0" ><b>Thanh toán</b></legend>
              <div class="col-sm-10" id="edit-thanh-toan-radio">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="edit_thanh_toan" id="edit-gridRadios1" value="1" checked>
                  <label class="form-check-label" for="edit-gridRadios1">
                    Thanh toán hoàn tất
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="edit_thanh_toan" id="edit-gridRadios2" value="0">
                  <label class="form-check-label" for="edit-gridRadios2">
                    Thanh toán chưa hoàn tất
                  </label>
                </div>
              </div>
            </div>
          </fieldset>

          <div class="form-group" id="form-edit-tra-truoc">
            <label for="edit-tra-truoc" class="col-form-label"><b>Trả trước</b></label>
            <input type="number" class="form-control" id="edit-tra-truoc" name="edit_tra_truoc">
          </div>
          <div class="form-group">
            <label for="edit-ghi-chu"><b>Ghi Chú</b></label>
            <textarea class="form-control" id="edit-ghi-chu" rows="3" name="edit_ghi_chu"></textarea>
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

<div class="modal fade" id="alertEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >RẤT TIẾC</h3>
      </div>
      <div class="modal-body">
        <h4>Sản Phẩm: <b id="alert-ten"></b></h4>
        <br>
        <h5>Bạn không thể chỉnh sửa thanh toán sản phẩm hỏng</h5>
        
      </div>
      <div class="modal-footer">
        <form action="{{route('del-xuat-ra')}}" method="POST">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    var old_value;
    $('.btn-edit').click(function(){
      // Default Value  -- INIT  --
      old_value = $(this).val();
      old_value = JSON.parse(old_value);
      var $radios = $('input:radio[name=edit_thanh_toan]');
      var edit_thanh_tien = old_value.so_luong * old_value.gia;
      $radios.filter('[value=0]').prop('checked', true);

      $('#edit_ten').html(old_value.ten);
      $('#edit-ghi-chu').val(old_value.ghi_chu);
      $('#edit-tra-truoc').val(old_value.tra_truoc); 
      $('#edit_id').val(old_value.id);
      $('#edit-thanh-tien').html(edit_thanh_tien);

      // Thanh toan hoan tat
      if(old_value.thanh_toan==1){
        $('#form-edit-tra-truoc').hide();
        $radios.filter('[value=1]').prop('checked', true);
      } else{
        $('#form-edit-tra-truoc').show();
        $radios.filter('[value=0]').prop('checked', true);
      }  

    });

    $('#edit-thanh-toan-radio input').on('change', function() {
      var edit_thanh_toan = $("input[name='edit_thanh_toan']:checked").val();
      //Thanh toan chua hoan tat
      if (edit_thanh_toan == 0){
        $('#form-edit-tra-truoc').show();
        $('#edit-tra-truoc').val(0); 
      }else {
        var edit_thanh_tien_1 = old_value.so_luong * old_value.gia;
        $('#edit-tra-truoc').val(edit_thanh_tien_1); 
        $('#form-edit-tra-truoc').hide();
      }
    });

    $('.btn-alert').click(function(){
      old_ten = $(this).val();
      old_ten = JSON.parse(old_ten).ten;
      $('#alert-ten').html(old_ten);
    })
  });
</script>

