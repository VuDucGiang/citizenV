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
  
  