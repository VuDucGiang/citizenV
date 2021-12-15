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
          tbody.appendChild(r);
        }
      }
    });
  }
});
