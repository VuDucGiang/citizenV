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
                  class="form-control"
                  id="chon_tinh"
                  name="chon_tinh"
                  style="width: 100%"
                  onchange="add_tinh(this.value);"
                >
                  <option value="">-Tỉnh/Thành Phố-</option>
                  //Lấy danh sách các Tỉnh/Thành Phố 
                  <?php $thanhPho = $ctl -> getThanhPho($_SESSION['login']);?>
                  <?php foreach ($thanhPho as $output) {?>
                  <option value="<?php echo $output['ten']?>"><?php echo $output['ten']?></option>
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
                  <?php 
                    //if(isset($_POST['chon_tinh'])) echo $_POST['chon_tinh']; 
                    $quan = $ctl -> getQuan();?>
                  <?php foreach ($quan as $output) {?>
                  <option ><?php echo $output['ten']?></option>
                  <?php }?>
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
                  <?php 
                    $phuong = $ctl -> getPhuong();?>
                  <?php foreach ($phuong as $output) {?>
                  <option ><?php echo $output['ten']?></option>
                  <?php }?>
                </select>
              </div>
              <div class="col-sm-2">
                <button
                  class="btn btn-block submit-button"
                  type="submit"
                  id="submit-button"
                >
                  Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
</html>

<?php
    require_once('../public/html/info.html');
?>
