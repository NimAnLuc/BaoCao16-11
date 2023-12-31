<?php

use App\Models\topic;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM topic wher status!=0 and id=1 order by created_at desc

$list = topic::where('status', '=', 0)->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->


<?php require_once "../views/backend/header.php"; ?>
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">
   <!-- CONTENT -->
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thùng rác chủ đề</h1>
               </div>
            </div>
         </div>
      </section>

      <!-- Main content -->
      <section class="content">
      <?php require_once "../views/backend/message.php"; ?>
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=topic" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <div class="col-md-8">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Tên chủ đề</th>
                           <th>Tên slug</th>
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
                                    <div class="name">
                                       <?= $item->name; ?>
                                    </div>
                                    <div class="function_style">
                                       <a href="index.php?option=topic&cat=restore&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                          <i class="fas fa-undo"></i> Khôi Phục
                                       </a>
                                       <a href="index.php?option=topic&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                          <i class="fas fa-trash"></i> Xoá Vĩnh Viễn

                                       </a>
                                    </div>
                                 </td>
                                 <td><?= $item->slug ?></td>
                              </tr>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
   </div>
   </section>
   </div>
   <!-- END CONTENT-->
   <?php require_once "../views/backend/footer.php"; ?>