<?php

use App\Models\Contact;

$list = Contact::where('status', '=', 0)->orderBy('created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Thùng rác liên hệ</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
   <?php require_once "../views/backend/message.php"; ?>
      <div class="card">
         <div class="col-md-12 text-right">
            <a href="index.php?option=contact" class="btn btn-sm btn-info">
               <i class="fa fa-arrow-left" aria-hidden="true"></i>
               Về thương hiệu
            </a>
         </div>
         <div class="card-header text-right">
            Noi dung
         </div>

         <div class="card-body">
            <table class="table table-bordered" id="mytable">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th>Họ tên</th>
                     <th>Điện thoại</th>
                     <th>Email</th>
                     <th>Tiêu đề</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($list as $item) : ?>
                     <tr class="datarow">
                        <td>
                           <input type="checkbox">
                        </td>
                        <td>
                           <div class="name">
                              <?php echo $item->name; ?>
                           </div>
                           <div class="function_style">
                              <a href="index.php?option=contact&cat=restore&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                 <i class="fas fa-undo"></i> Khôi Phục
                              </a>
                              <a href="index.php?option=contact&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                 <i class="fas fa-trash"></i> Xoá Vĩnh Viễn

                              </a>
                           </div>
                        </td>
                        <td> <?php echo $item->phone; ?></td>
                        <td> <?php echo $item->email; ?></td>
                        <td> <?php echo $item->title; ?></td>
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