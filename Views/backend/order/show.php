<?php
use App\Models\order;
use App\Libraries\MyClass;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM order wher status!=0 and id=1 order by created_at desc

$id=$_REQUEST['id'];
$order=order::find($id);
if($order==null)
{
   MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=order");
}
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      

<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết đơn hàng</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-12 text-right">
                        <a href="index.php?option=order" class="btn btn-sm btn-info">
                              <i class="fa fa-arrow-left" aria-hidden="true"></i>
                               Về đơn hàng
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>ID</td>
                                 <td><?=$order->id;?></td>
                              </tr>
                              <tr>
                                 <td>Tên người nhận</td>
                                 <td><?=$order->deliveryname;?></td>
                              </tr>
                              <tr>
                                 <td>Mã khách hàng</td>
                                 <td><?=$order->user_id;?></td>
                              </tr>
                              <tr>
                                 <td>Đia chỉ người nhận</td>
                                 <td><?=$order->deliveryaddress;?></td>
                              </tr>
                              <tr>
                                 <td>Điện thoại người nhận</td>
                                 <td><?=$order->deliveryphone;?></td>
                              </tr>
                              <tr>
                                 <td>Code người nhận</td>
                                 <td><?=$order->note;?> </td>
                              </tr>
                              <tr>
                                 <td>Thời gian tạo</td>
                                 <td><?=$order->created_at;?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td><?=$order->created_by;?></td>
                              </tr>
                              <tr>
                                 <td>Thời gian nâng cấp</td>
                                 <td><?=$order->updated_at;?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td><?=$order->updated_by;?></td>
                              </tr>
                              <tr>
                                 <td>Trạng thái</td>
                                 <td><?=$order->status;?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
</section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>