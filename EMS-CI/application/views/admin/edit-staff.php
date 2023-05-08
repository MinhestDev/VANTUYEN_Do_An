  <style>
  .floatybox {
     display: inline-block;
     width: 123px;
}
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý nhân viên
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="#">Quản lý nhân viên</a></li>
        <li class="active">Sửa nhân viên</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Thành công!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Lỗi!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sửa nhân viên</h3>
            </div>
            <!-- /.box-header -->

            <?php if(isset($content)): ?>
              <?php foreach($content as $cnt): ?>
                  <!-- form start -->
                  <?php echo form_open_multipart('Staff/update');?>
                    <div class="box-body">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Họ tên</label>
                          <input type="hidden" name="txtid" value="<?php echo $cnt['id'] ?>" class="form-control" placeholder="Full Name">
                          <input type="text" name="txtname" value="<?php echo $cnt['staff_name'] ?>" class="form-control" placeholder="Full Name">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Phòng</label>
                          <select class="form-control" name="slcdepartment">
                            <option value="">Chọn</option>
                            <?php
                            if(isset($department))
                            {
                              foreach($department as $cnt1)
                              {
                                if($cnt1['id']==$cnt['department_id'])
                                {
                                  print "<option value='".$cnt1['id']."' selected>".$cnt1['department_name']."</option>";
                                }
                                else{
                                  print "<option value='".$cnt1['id']."'>".$cnt1['department_name']."</option>";
                                }
                              }
                            } 
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Giới tính</label>
                          <select class="form-control" name="slcgender">
                            <option value="">Chọn</option>
                            <?php
                            if($cnt['gender']=='Male')
                            {
                              print '<option value="Male" selected>Nam</option>
                                    <option value="Female">Nữ</option>
                                    <option value="Others">Khác</option>';
                            }
                            elseif($cnt['gender']=='Femle')
                            {
                              print '<option value="Male">Nam</option>
                                    <option value="Female" selected>Nữ</option>
                                    <option value="Others">Khác</option>';
                            }
                            elseif($cnt['gender']=='Others')
                            {
                              print '<option value="Male">Nam</option>
                                    <option value="Female">Nữ</option>
                                    <option value="Others" selected>Khác</option>';
                            }
                            else{
                              print '<option value="Male">Nam</option>
                              <option value="Female">Nữ</option>
                              <option value="Others">Khác</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="txtemail" value="<?php echo $cnt['email'] ?>" class="form-control" placeholder="Email" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Số diện thoại</label>
                          <input type="text" name="txtmobile" value="<?php echo $cnt['mobile'] ?>" class="form-control" placeholder="Mobile" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ảnh</label>
                          <input type="file" name="filephoto" value="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ngày sinh</label>
                          <input type="date" name="txtdob" value="<?php echo $cnt['dob'] ?>" class="form-control" placeholder="DOB">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ngày tham gia</label>
                          <input type="date" name="txtdoj" value="<?php echo $cnt['doj'] ?>" class="form-control" placeholder="DOJ">
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Thành phố</label>
                          <input type="text" name="txtcity" value="<?php echo $cnt['city'] ?>" class="form-control" placeholder="City">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tỉnh</label>
                          <input type="text" name="txtstate" value="<?php echo $cnt['state'] ?>" class="form-control" placeholder="State">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Quốc gia</label>
                          <select class="form-control" name="slccountry">
                            <option value="">Chọn</option>
                            <?php
                              if(isset($country))
                              {
                                foreach ($country as $cnt1)
                                {
                                  if($cnt1['country_name']==$cnt['country'])
                                  {
                                    print "<option value='".$cnt1['country_name']."' selected>".$cnt1['country_name']."</option>";
                                  }
                                  else{
                                    print "<option value='".$cnt1['country_name']."'>".$cnt1['country_name']."</option>";
                                  }
                                  
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Địa chỉ</label>
                          <textarea class="form-control" name="txtaddress"><?php echo $cnt['address'] ?></textarea>
                        </div>
                      </div>
                      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-success pull-right">Gửi</button>
                    </div>
                  </form>
                <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
