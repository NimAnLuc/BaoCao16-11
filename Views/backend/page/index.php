<?php

use App\Models\Post;
$list = Post::where([['status', '!=', 0],['type', '=', 'page']])->orderBy('created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả trang đơn</h1>
                     <a href="index.php?option=page&cat=create" class="btn btn-sm btn-primary">Thêm trang đơn</a>
                     <div class="col-md-6">
                     <a class="btn btn-info btn xs" href="index.php?option=page">Tất cả</a>
                     <a class="btn btn-danger btn xs" href="index.php?option=page&cat=trash"><i class="fas fa-trash"></i>Thùng rác</a>
                  </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
         <?php require_once "../views/backend/message.php";?>
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
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Tên trang đơn</th>
                           <th>slug</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tbody>
                  <?php foreach ($list as $item) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                           <img class="img-fluid" src="../public/images/post/<?php echo $item->image; ?>" alt="<?php echo $item->image; ?>">
                        </td>
                           <td>
                           <div class="name">
                              <?php echo $item->title; ?>
                           </div>
                           <div class="function_style">
                              <?php if ($item->status == 1) : ?>
                                 <a class="btn btn-success btn xs" href="index.php?option=page&cat=status&id=<?php echo $item->id; ?>">
                                    <i class="fas fa-toggle-on"></i>Hiện</a> |
                              <?php else : ?>
                                 <a class="btn btn-danger btn xs" href="index.php?option=page&cat=status&id=<?php echo $item->id; ?>">
                                    <i class="fas fa-toggle-off"></i>Ẩn</a> |
                              <?php endif; ?>
                              <a class="btn btn-primary btn xs" href="index.php?option=page&cat=edit&id=<?php echo $item->id; ?>">
                                 <i class="fas fa-edit"></i>Chỉnh sửa

                              </a> |
                              <a class="btn btn-info btn xs" href="index.php?option=page&cat=show&id=<?php echo $item->id; ?>">
                                 <i class="fas fa-eye"></i>Chi tiết</a> |
                              <a class="btn btn-danger btn xs" href="index.php?option=page&cat=delete&id=<?php echo $item->id; ?>">
                                 <i class="fas fa-trash"></i>Xoá</a>
                           </div>
                           </td>
                           <td><?= $item->slug ?></td>
                        </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>