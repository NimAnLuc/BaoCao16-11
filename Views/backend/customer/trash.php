<?php

use App\Models\User;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc

$list = User::where([['status', '=', 0], ['roles', '=', 2]])->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->


<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Thùng rác khách hàng</h1>
               <div class="card-header text-right">
                  <a href="index.php?option=customer" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <?php require_once "../views/backend/message.php"; ?>
      <div class="card">
         <div class="card-header">
            Noi dung
         </div>
         <div class="card-body">
            <table class="table table-bordered" id="mytable">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th class="text-center" style="width:130px;">Hình ảnh</th>
                     <th>Họ tên</th>
                     <th>Điện thoại</th>
                     <th>Email</th>
                     <th>Địa chỉ</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($list as $item) : ?>
                     <tr class="datarow">
                        <td>
                           <input type="checkbox">
                        </td>
                        <td>
                           <img class="img-fluid" src="../public/images/user/<?php echo $item->image; ?>" alt="<?php echo $item->image; ?>">
                        </td>
                        <td>
                           <div class="name">
                              <?php echo $item->name; ?>
                           </div>
                           <div class="function_style">
                              <a href="index.php?option=customer&cat=restore&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                 <i class="fas fa-undo"></i> Khôi Phục
                              </a>
                              <a href="index.php?option=customer&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                 <i class="fas fa-trash"></i> Xoá Vĩnh Viễn

                              </a>
                           </div>
                        </td>
                        <td><?php echo $item->phone; ?></td>
                        <td><?php echo $item->email; ?></td>
                        <td><?php echo $item->address; ?></td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>