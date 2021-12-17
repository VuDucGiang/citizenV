// thêm nút lưu, sửa, xóa vào bảng, dòng có stt 1 nút xóa có id=del_1, nút sửa có id=edit_1
// ban đầu để lưu disable, chỉ được enable khi nút sửa/xóa được bấm
// chưa xử lý event, 
// danger - xóa
// primary - sửa
// warning - hủy
// success - lưu
info_length = 0;
cached_cmnd = "";
cached_ten = "";
cached_ngaysinh = "";
cached_que = "";
cached_thuongtru = "";
cached_tamtru = "";
cached_tongiao = "";
cached_vanhoa = "";
cached_nghenghiep = "";


$(document).ready(function() {
  $("#search").keyup(function() {
    _this = this;
    // Show only matching TR, hide rest of them
    $.each($("#table tbody tr"), function () {
      if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
        $(this).hide();
      else
        $(this).show();
    });
  });

  function editableToggle(edit, del, save, cancel) {
    $(edit).toggle();
    $(del).toggle();
    $(save).toggle();
    $(cancel).toggle();
  }
  //nút sửa được ấn
  $(document).on('click','.btn-primary', function(event) {
    get_id = $(this).attr('id');
    get_row = get_id.split('-')[1]; //lấy row bằng số sau dấu -
    //lấy id các nút
    edit = "#edit-" + get_row;
    del = "#del-" + get_row;
    save = "#save-" + get_row;
    cancel = "#cancel-" + get_row;
    //lấy class cho các div trong hàng 
    div_class = ".row-" + get_row; 

    editableToggle(edit, del, save, cancel);
    $(div_class).attr('contentEditable','true');

  });

  // nút lưu được ấn
  $(document).on('click','.btn-success', function(event) {    get_id = $(this).attr('id');
    get_row = get_id.split('-')[1]; //lấy row bằng số sau dấu -
    //lấy id các nút
    edit = "#edit-" + get_row;
    del = "#del-" + get_row;
    save = "#save-" + get_row;
    cancel = "#cancel-" + get_row;
    //lấy class cho các div trong hàng 
    div_class = ".row-" + get_row; 

    editableToggle(edit, del, save, cancel);
    $(div_class).attr('contentEditable','false');

  });

});

// tạo nút sửa xóa lưu hủy
function createBtn(action, index) {
  let button = document.createElement("BUTTON");
  button.id = action + '-' + index;
  button.classList.add("btn");
  if (action == "del") {
    button.innerHTML = "Xoá";
    button.classList.add("btn-danger")
  } else if (action == "edit") {
    button.innerHTML = "Sửa";
    button.classList.add("btn-primary")
  } else if (action == "save") {
    button.innerHTML = "Lưu";
    button.style.display = "none";
    button.classList.add("btn-success")
  } else if (action == "cancel") {
    button.innerHTML = "Hủy";
    button.style.display = "none";
    button.classList.add("btn-warning")
  }
  return button;
}

//tạo các cell data
function cellData(data, row) {
  let div = document.createElement("div");
  div.innerHTML = data;
  div.contentEditable = "false";
  // assign class cho div để dễ truy vấn
  div_class = "row-" + row;
  div.classList.add(div_class);
  let cell = document.createElement("td");
  cell.appendChild(div);
  return cell;
}

fetch("../public/info.json").then((resp) => {
  if (resp.status == 200) {
    console.log(resp);
    resp.json().then((ret) => {
      if (ret.status == "OK") {
        tbody = document.querySelector("#table tbody");
        info_length = ret.data.length;
        for (i = 0; i < ret.data.length; i++) {
          let r = document.createElement("tr");
          let stt = document.createElement("td");
          stt.innerHTML = i + 1;
          let cccd = cellData(ret.data[i].cccd, i+1);
          let ten = cellData(ret.data[i].ten, i+1);
          let ngaySinh = cellData(ret.data[i].ngaySinh, i+1);
          let gioiTinh = cellData(ret.data[i].gioiTinh, i+1);
          let queQuan = cellData(ret.data[i].queQuan, i+1);
          let diaChiThuongTru = cellData(ret.data[i].diaChiThuongTru, i+1);
          let diaChiTamTru = cellData(ret.data[i].diaChiTamTru, i+1);
          let tonGiao = cellData(ret.data[i].tonGiao, i+1);
          let trinhDoVanHoa = cellData(ret.data[i].trinhDoVanHoa, i+1);
          let ngheNghiep = cellData(ret.data[i].ngheNghiep, i+1);

          let del_button = createBtn("del", i+1);
          let edit_button = createBtn("edit", i+1);
          let save_button = createBtn("save", i+1);
          let cancel_button = createBtn("cancel", i+1);
          let buttons = document.createElement("td");
          buttons.appendChild(edit_button);
          buttons.appendChild(del_button);
          buttons.appendChild(save_button);
          buttons.appendChild(cancel_button);

          r.appendChild(stt);
          r.appendChild(cccd);
          r.appendChild(ten);
          r.appendChild(ngaySinh);
          r.appendChild(gioiTinh);
          r.appendChild(queQuan);
          r.appendChild(diaChiThuongTru);
          r.appendChild(diaChiTamTru);
          r.appendChild(tonGiao);
          r.appendChild(trinhDoVanHoa);
          r.appendChild(ngheNghiep);
          r.appendChild(buttons);
          tbody.appendChild(r);
        }
      }
    });
  }
});