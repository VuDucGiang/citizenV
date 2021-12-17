
fetch("../public/manage.json").then((resp) => {
    if (resp.status == 200) {
      resp.json().then((ret) => {
        if (ret.status == "OK") {
            
          tbody = document.querySelector("#table tbody");

          for (i = 0; i < ret.data.length; i++) {
            let r = document.createElement("tr");
            let stt = document.createElement("td");
            stt.innerHTML = i + 1;
            let username = document.createElement("td");
            username.innerHTML = ret.data[i].username;
            let password = document.createElement("td")
            password.innerHTML = ret.data[i].password;
            let ngaydong = document.createElement("td")
            ngaydong.innerHTML = ret.data[i].ngaydong;
  
            r.appendChild(stt);
            r.appendChild(username);
            r.appendChild(password);
            r.appendChild(ngaydong);
            
            tbody.appendChild(r);
          }
        }
      });
    }
  });
  
$(document).ready(function () {
  $(function () {

    $('.datepicker').datepicker({
        dateFormat: "dd-mm-yy",
        defaultDate: "01/30/1960",
        yearRange: "c-30:c+60",
        dayNamesMin: [ "CN", "T2", "T3", "T4", "T5", "T6", "T7" ],
        monthNamesShort: [ "Th 1", "Th 2", "Th 3", "Th 4", "Th 5",
         "Th 6", "Th 7", "Th 8", "Th 9", "Th 10", "Th 11", "Th 12" ],
        changeMonth: true,
        changeYear: true
    });
  
  });
})

