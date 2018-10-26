<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="delXuatRa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Xác nhận xóa</h3>
      </div>
      <div class="modal-body">
        <h5>Bạn có muốn xóa: <b style="color: green" id="del-ten"></b> - Mã Số: <b style="color: green">XR/</b><b style="color: green" id="del-ma-so"></b></h5>
      </div>
      <div class="modal-footer">
        <form action="{{route('del-xuat-ra')}}" method="POST">
          <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
          <input type="hidden" id="del-id" name="del_id" >
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Trở lại</button>
          <button  type="submit" class="btn btn-primary">Xóa</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
   $(document).ready(function(){
    var del_value;
    $('.btn-del').click(function(){
      del_value = $(this).val();
      del_value = JSON.parse(del_value);    
      $('#del-ten').html(del_value.ten);
      $('#del-ma-so').html(del_value.id);
      $('#del-id').val(del_value.id);
      //$('#alert-ten').html('kad');
    });
  });
</script>
