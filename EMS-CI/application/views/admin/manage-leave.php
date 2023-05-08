<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý nghỉ phép
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="#">Quản lý nghỉ phép</a></li>
        <li class="active">Xem nghỉ phép</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

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

        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Xem nghỉ phép</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nhân viên</th>
                    <th>Ảnh</th>
                    <th>Phòng</th>
                    <th>Lý do</th>
                    <th>Từ</th>
                    <th>Đến</th>
                    <th>Trạng thái</th>
                    <th>Mô tả</th>
                    <th>Áp dụng trên</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['staff_name']; ?></td>
                        <td><img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" class="img-circle" width="50px" alt="User Image"></td>
                        <td><?php echo $cnt['department_name']; ?></td>
                        <td><?php echo $cnt['leave_reason']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['leave_from'])); ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['leave_to'])); ?></td>
                        <td>
                          <?php if($cnt['status']==0): ?>
                          <span class="label label-info">Đang duyệt</span>
                          <?php elseif($cnt['status']==1): ?>
                          <span class="label label-success">Đã hoàn thành</span>
                          <?php elseif($cnt['status']==2): ?>
                          <span class="label label-danger">Từ chối</span>
                          <?php endif; ?>
                        </td>
                        <td><?php echo $cnt['description']; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($cnt['applied_on'])); ?></td>
                      </tr>
                    <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?> 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    