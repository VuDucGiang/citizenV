<?php
    require_once('../controllers/infoController.php');
    require_once('../controllers/updateController.php');
    require_once('../controllers/deleteController.php');
    $ctl = new InfoController();
    $ret = $ctl -> proc();
    //generate json file cập nhật lại sau mỗi lần truy cập
    $bytes = file_put_contents("../public/info.json", $ret); 

    $ctl2 = new UpdateController();
    $ctl2 -> proc();
    $ctl3 = new DeleteController();
    $ctl3 -> proc();
    
?>
<html>
  <section class="navbar-after">
      <style scoped>
        .header-container {
          padding-top: 60px;
          padding-bottom: 5px;
          width: 100%;
          /* margin-bottom: 0px; */
          margin-left: auto;
          margin-right: auto;
          background-color: white;
          z-index: 1;
          position: fixed;
        }
      </style>
      <div class="container-fluid header-container">
        <div class="row col-sm-offset-1 col-sm-10">
          <div class="col-md-offset-3 col-md-6 col-sm-10">
            <div id="search-box">
              <input
                type="search"
                id="search"
                placeholder="Nhập thông tin cần tìm"
              />
              <span class="search"
                ><i class="fa fa-search" aria-hidden="true"></i
              ></span>
            </div>
          </div>
        </div>
        <div class="row col-sm-offset-1 col-sm-10">
          <form class="custom-form select-form" method="post">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-3 tam-tru">
                <select
                  class="form-control thanh_pho"
                  id="chon_tinh"
                  name="chon_tinh"
                  style="width: 100%"
                  
                >
                  <option value="">-Tỉnh/Thành Phố-</option>
                  //Lấy danh sách các Tỉnh/Thành Phố 
                  <?php $thanhPho = $ctl -> getThanhPho($_SESSION['login']);?>
                  <?php foreach ($thanhPho as $output) {?>
                  <option value="<?php echo $output['ma']?>"><?php echo $output['ten']?></option>
                  <?php }?>
                </select>
              </div>
              <div class="col-sm-3 tam-tru">
                <select
                  class="form-control"
                  id="chon_huyen"
                  name="chon_huyen"
                  style="width: 100%"
                  onchange="add_huyen(this.value);"
                >
                  <option value="">-Quận/Huyện/Thị Xã-</option>
                  //Lấy danh sách các Quận/Huyện theo Tỉnh/Thành phố
                  //Ajax api
                </select>
              </div>
              <div class="col-sm-3 tam-tru">
                <select
                  class="form-control"
                  id="chon_xa"
                  name="chon_xa"
                  style="width: 100%"
                  onchange="add_xa(this.value);"
                >
                  <option value="">-Xã/Phường-</option>
                  //Lấy danh sách các Phường/Xã
                  //Ajax api
                </select>
              </div>
              <div class="col-sm-2">
                <button
                  class="btn btn-block submit-button"
                  type="submit"
                  id="submit-button"
                  name="submit";
                >
                  Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script>
      $(document).ready(function(){
        $("#chon_tinh").change(function(){
          var ma = $(this).val();
          $.ajax({
            url: "../models/infoModel.php",
            //url: "test.php",
            method: "POST",
            data:{maThanhPho:ma},
            success:function(data) {
              $('#chon_huyen').html(data);
            }
          });
        });

        $("#chon_huyen").change(function(){
          var ma = $(this).val();
          $.ajax({
            url: "../models/infoModel.php",
            //url: "test.php",
            method: "POST",
            data:{maQuan:ma},
            success:function(data) {
              $('#chon_xa').html(data);
            }
          });
        });
      });
    </script>
</html>

<?php
    require_once('../public/html/info.html');
?>
