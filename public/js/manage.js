  
$(document).ready(function () {
  

  $.getJSON("../public/manage.json", function (ret) {
    if (ret.status == "OK") {
      for (i = 0; i < ret.data.length; i++) {
        $("#table tbody").append(
          "<tr>" +
          "<td id=don-vi-" + (i + 1) + ">" + ret.data[i].donVi + "</td>" +
          "<td id=user-" + (i + 1) + ">" + ret.data[i].username + "</td>" +
          "<td id=pass-" + (i + 1) + ">" + ret.data[i].password + "</td>" +
          "<td id=o-date-" + (i + 1) + ">" + ret.data[i].ngayMo + "</td>" +
          "<td id=c-date-" + (i + 1) + ">" + ret.data[i].ngayDong + "</td>" +
          "<td id=tien-do-" + (i + 1) + ">" + ret.data[i].tienDo + "</td>" +
          "<td>" +
          "<button class='btn btn-default' id=open-" + (i + 1) + ">Mở</button>" +
          "<button class='btn btn-info hidden' id=close-" + (i + 1) + ">Khóa</button>" +
          "</td>" +
          "<td>" +
          "<button class='btn btn-primary' id=edit-" + (i + 1) + ">Sửa</button>" +
          "<button class='btn btn-danger' id=del-" + (i + 1) + ">Xóa</button>" +
          "</td>" +
          + "</tr>"
        )
      }
    }
  });

  // click nút mở
  $(document).on('click','.btn-default', function(event) {
    get_id = $(this).attr('id');
    get_row = get_id.split('-')[1]; //lấy row bằng số sau dấu -
    $(this).hide();
    $('#close-' + get_row).removeClass('hidden');


  })

  //click nut dong
  $(document).on('click','.btn-info', function(event) {
    get_id = $(this).attr('id');
    get_row = get_id.split('-')[1]; //lấy row bằng số sau dấu -
    $(this).addClass('hidden');
    $('#open-' + get_row).show();
  })

  // click nút sửa
  $(document).on('click','.btn-primary', function(event) {
    get_id = $(this).attr('id');
    get_row = get_id.split('-')[1]; //lấy row bằng số sau dấu -

    $('#userEditModal #don_vi').val($("#don-vi-" + get_row).text());
    $('#userEditModal #username').val($("#user-" + get_row).text());
    $('#userEditModal #password').val($("#pass-" + get_row).text());

    $('#userEditModal').modal('show');
  });

  //click nút xóa
  $(document).on('click','.btn-danger', function(event) {
    get_id = $(this).attr('id');
    get_row = get_id.split('-')[1]; //lấy row bằng số sau dấu -
    
    $('#userDelModal').modal('show');
  });

  $(function () {

    $('.datepicker').datepicker({
        dateFormat: "yy-mm-dd",
        defaultDate: "2021-12-26",
        yearRange: "c-30:c+60",
        dayNamesMin: [ "CN", "T2", "T3", "T4", "T5", "T6", "T7" ],
        monthNamesShort: [ "Th 1", "Th 2", "Th 3", "Th 4", "Th 5",
         "Th 6", "Th 7", "Th 8", "Th 9", "Th 10", "Th 11", "Th 12" ],
        changeMonth: true,
        changeYear: true
    });
  
  });
})

