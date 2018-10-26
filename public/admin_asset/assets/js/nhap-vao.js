    var thanh_tien = 0;         // TIEN CAN THANH TOAN
    var tt_thanh_toan = 10;         // TRANG THAI THANH TOAN:  HOAN_TAT(1) ; CHUA_HOAN_TAT(0)
    var gia_nhap_vao = 0;       
    var so_luong = 0;           
    var tra_truoc = 0          
    var tien_no = thanh_tien;

    function tinhtoan(){
        thanh_tien = so_luong * gia_nhap_vao;

        // Thanh toan hoan tat
        if (tt_thanh_toan == 1){      
            tra_truoc = thanh_tien;
            tien_no = 0;
            // Thanh toan chua hoan tat
        } else {
            tien_no = thanh_tien - tra_truoc;
        }
    }

    $(document).ready(function(){
        // INIT
        $('#tra-truoc').val(tra_truoc);
        $('#tien-no').val(tien_no);
        
        var thanh_toan = $("input[name='thanh_toan']:checked").val();
        if (thanh_toan == 1) {
            $('.form-thanh-toan').hide();
            tt_thanh_toan = 1;
        } else {
         $('.form-thanh-toan').show();
         tt_thanh_toan = 0;
     }
        ///////////////////////////////////////
        $('#gia-nhap-vao').change(function(){
            gia_nhap_vao = $('#gia-nhap-vao').val() 
            so_luong = $('#so-luong').val();
            tra_truoc = $('#tra-truoc').val();
            thanh_tien = $('#thanh-tien');
            tinhtoan();
            $('#thanh-tien').val(thanh_tien);
            $('#tra-truoc').val(tra_truoc);
            $('#tien-no').val(tien_no);
        });
        $('#so-luong').change(function(){
            gia_nhap_vao = $('#gia-nhap-vao').val() 
            so_luong = $('#so-luong').val();
            tra_truoc = $('#tra-truoc').val();
            thanh_tien = $('#thanh-tien');
            tinhtoan();
            $('#thanh-tien').val(thanh_tien);
            $('#tra-truoc').val(tra_truoc);
            $('#tien-no').val(tien_no);
        });


        $('#thanh-toan-radio input').on('change', function() {
            thanh_toan = $("input[name='thanh_toan']:checked").val();

            // THANH TOAN CHUA HOAN TAT
            if (thanh_toan == 0){
                tra_truoc = 0;
                tien_no = thanh_tien;
                tt_thanh_toan = 0;
                $('.form-thanh-toan').show();
                gia_nhap_vao = $('#gia-nhap-vao').val() 
                so_luong = $('#so-luong').val();
                tinhtoan();
                $('#thanh-tien').val(thanh_tien);
                $('#tra-truoc').val(tra_truoc);
                $('#tien-no').val(tien_no);
            }
            // THANH TOAN HOAN TAT
            else{
                tt_thanh_toan = 1;
                $('.form-thanh-toan').hide();

                gia_nhap_vao = $('#gia-nhap-vao').val() 
                so_luong = $('#so-luong').val();
                tra_truoc = $('#tra-truoc').val();
                tinhtoan();
                $('#thanh-tien').val(thanh_tien);
                $('#tra-truoc').val(tra_truoc);
                $('#tien-no').val(tien_no);
            } 
            
        });

        $('#tra-truoc').change(function(){
            gia_nhap_vao = $('#gia-nhap-vao').val() 
            so_luong = $('#so-luong').val();
            tra_truoc = $('#tra-truoc').val();
            thanh_tien = $('#thanh_tien').val();
            tinhtoan();
            $('#thanh-tien').val(thanh_tien);
            $('#tra-truoc').val(tra_truoc);
            $('#tien-no').val(tien_no);
        });    

        // THAY DOI GIA THEO TEN
        $('#ten-san-pham').change(function(){
            var id_san_pham = $(this).val();
            $.ajax({
                url: "{{route('get-gia-nhap-vao')}}", 
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_san_pham': id_san_pham
                },
                success: function(result){
                    $('#gia-nhap-vao').val(result);

                }
            });

            gia_nhap_vao = $('#gia-nhap-vao').val() 
            so_luong = $('#so-luong').val();
            tra_truoc = $('#tra-truoc').val();
            thanh_tien = $('#thanh_tien').val();
            tinhtoan();
            $('#thanh-tien').val(thanh_tien);
            $('#tra-truoc').val(tra_truoc);
            $('#tien-no').val(tien_no);
        });
    });