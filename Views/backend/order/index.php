<?php

use App\Models\Order;

$list = Order::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả đơn hàng</h1>
               <a href="index.php?option=import" class="btn btn-sm btn-primary">Thêm đơn hàng</a>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <?php require_once "../views/backend/message.php"; ?>
      <div class="card">
         <div class="card-header p-2">
            Noi dung
         </div>
         <div class="card-body p-2">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th>Mã khách hàng</th>
                     <th>Tên người nhận</th>
                     <th>Code đơn hàng</th>
                     <th>SDT người nhận</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($list) > 0) : ?>
                     <?php foreach ($list as $item) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <div class="user_id">
                                 <?php echo $item->user_id; ?>
                              </div>

                              <div class="function_style">
                                 <?php if ($item->status == 1) : ?>
                                    <a class="btn btn-success btn xs" href="index.php?option=order&cat=status&id=<?php echo $item->id; ?>">
                                       <i class="fas fa-toggle-on"></i>Hiện</a> |
                                 <?php else : ?>
                                    <a class="btn btn-danger btn xs" href="index.php?option=order&cat=status&id=<?php echo $item->id; ?>">
                                       <i class="fas fa-toggle-off"></i>Ẩn</a> |
                                 <?php endif; ?>
                                 <a class="btn btn-primary btn xs" href="index.php?option=order&cat=edit&id=<?php echo $item->id; ?>">
                                    <i class="fas fa-edit"></i>Chỉnh sửa

                                 </a> |
                                 <a class="btn btn-info btn xs" href="index.php?option=order&cat=show&id=<?php echo $item->id; ?>">
                                    <i class="fas fa-eye"></i>Chi tiết</a> |
                                 <a class="btn btn-danger btn xs" href="index.php?option=order&cat=delete&id=<?php echo $item->id; ?>">
                                    <i class="fas fa-trash"></i>Xoá</a>
                              </div>
                           </td>
                           <td>
                              <?php echo $item->deliveryname; ?>
                           </td>
                           <td>
                              <?php echo $item->note; ?>
                           </td>
                           <td>
                              <?php echo $item->deliveryphone; ?>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  <?php endif; ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>