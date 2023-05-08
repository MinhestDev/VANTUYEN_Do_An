  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hóa đơn
        <small>#00<?php echo rand(1000,100)?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="#">Quản lý lương</a></li>
        <li class="active">Hóa đơn</li>
      </ol>
    </section>

    <?php 
      if(isset($content)):
      $i=1; 
      foreach($content as $cnt): 
    ?>
    <!-- Main content -->
    <section class="invoice" id="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            Phần mềm quản lý nhân sự
            <small class="pull-right">Ngày: <?php echo date('d-m-Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Từ
          <address>
            <strong>Admin</strong><br>
            Hanoi City, Vietnam<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $cnt['staff_name']; ?></strong><br>
            <?php echo $cnt['city']; ?><br>
            <?php echo $cnt['state']; ?>, <?php echo $cnt['country']; ?><br>
            Số điện thoại: <?php echo $cnt['mobile']; ?><br>
            Email: <?php echo $cnt['email']; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Hóa đơn #00<?php echo $cnt['id']; ?></b><br>
          <br>
          <b>Đã thanh toán:</b> <?php echo date('d-m-Y', strtotime($cnt['added_on'])); ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Lương cơ bản</th>
              <th>Phụ cấp</th>
              <th>Tổng phụ</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>$ <?php echo $cnt['basic_salary']; ?></td>
                <td>$ <?php echo $cnt['allowance']; ?></td>
                <td>$ <?php echo $cnt['total']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Phương thức thanh toán:</p>
          <img src="<?php echo base_url(); ?>assets/dist/img/credit/visa.png" alt="Visa">
          <img src="<?php echo base_url(); ?>assets/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="<?php echo base_url(); ?>assets/dist/img/credit/american-express.png" alt="American Express">
          <img src="<?php echo base_url(); ?>assets/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Dear <?php echo $cnt['staff_name']; ?>, Our Company has just processed your payments. Your payment has been deposited electronically in your account on <?php echo date('d-m-Y', strtotime($cnt['added_on'])); ?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Thông tin lương</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Tổng phụ:</th>
                <td>$ <?php echo $cnt['total']; ?></td>
              </tr>
              <tr>
                <th>Tax (0%)</th>
                <td>$ 0</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$ <?php echo $cnt['total']; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo base_url(); ?>print-invoice/<?php echo $cnt['id']; ?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> In</a>
          <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button> -->
          <button type="button" id="cmd" class="btn btn-danger pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Xuất PDF
          </button>
      </div>
    </section>
    <!-- /.content -->

    <?php 
      $i++;
      endforeach;
      endif; 
    ?>

    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->



  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
  <script>
  $(document).ready(function() {
      var doc = new jsPDF("l", "pt", "letter");
      $('#cmd').click(function () {
        let doc = new jsPDF('p','pt','a4');
        doc.addHTML($('#invoice'),function() {
            doc.save('invoice.pdf');
        }); 
      });
  });
  </script>
