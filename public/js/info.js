// thêm nút lưu, sửa, xóa vào bảng, dòng có stt 1 nút xóa có id=del_1, nút sửa có id=edit_1
// ban đầu để lưu disable, chỉ được enable khi nút sửa/xóa được bấm
// chưa xử lý event, 
$(document).ready(function() {
  $("#search").keyup(function () {
    _this = this;
    // Show only matching TR, hide rest of them
    $.each($("#table tbody tr"), function () {
      if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
        $(this).hide();
      else
        $(this).show();
    });
  });
});

fetch("http://localhost/city/public/info.json").then((resp) => {
  if (resp.status == 200) {
    console.log(resp);
    resp.json().then((ret) => {
      if (ret.status == "OK") {
        tbody = document.querySelector("#table tbody");
        for (i = 0; i < ret.data.length; i++) {
          let r = document.createElement("tr");
          let stt = document.createElement("td");
          stt.innerHTML = i + 1;
          let cccd = document.createElement("td");
          cccd.innerHTML = ret.data[i].cccd;
          let ten = document.createElement("td");
          ten.innerHTML = ret.data[i].ten;
          let ngaySinh = document.createElement("td");
          ngaySinh.innerHTML = ret.data[i].ngaySinh;
          let gioiTinh = document.createElement("td");
          gioiTinh.innerHTML = ret.data[i].gioiTinh;
          let queQuan = document.createElement("td");
          queQuan.innerHTML = ret.data[i].queQuan;
          let diaChiThuongTru = document.createElement("td");
          diaChiThuongTru.innerHTML = ret.data[i].diaChiThuongTru;
          let diaChiTamTru = document.createElement("td");
          diaChiTamTru.innerHTML = ret.data[i].diaChiTamTru;
          let tonGiao = document.createElement("td");
          tonGiao.innerHTML = ret.data[i].tonGiao;
          let trinhDoVanHoa = document.createElement("td");
          trinhDoVanHoa.innerHTML = ret.data[i].trinhDoVanHoa;
          let ngheNghiep = document.createElement("td");
          ngheNghiep.innerHTML = ret.data[i].ngheNghiep;
          let del_button = document.createElement("BUTTON");
          del_button.innerHTML = "Xóa";
          del_button.id = "del_" + (i+1);
          del_button.classList.add("btn");
          del_button.classList.add("btn-danger");
          del_button.classList.add("del_btn");
          let edit_button = document.createElement("BUTTON");
          edit_button.innerHTML = "Sửa";
          edit_button.id = "edit_" + (i+1);
          edit_button.classList.add("btn");
          edit_button.classList.add("btn-primary");
          edit_button.classList.add("edit_btn");
          let del_edit = document.createElement("td");
          del_edit.appendChild(del_button);
          del_edit.appendChild(edit_button);
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
          r.appendChild(del_edit);
          tbody.appendChild(r);
        }
      }
    });
  }
});

