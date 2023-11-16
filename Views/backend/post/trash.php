<?php

use App\Models\Post;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM post wher status!=0 and id=1 order by created_at desc

$list = Post::join('topic', 'post.topic_id', '=','topic.id')
 ->where('post.status', '=', 0)
 ->where('post.type', '=', 'post')
 ->orderBy('post.created_at', 'desc')
 ->select("post.*", "topic.name as topic_name")
 ->get();
?>
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
               <h1 class="d-inline">Thùng rác bài viết</h1>
               <a href="index.php?option=post" class="btn btn-sm btn-primary">Về danh sách</a>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-6">
                  <a href="index.php?option=post">Tất Cả</a> |
                  <a href="index.php?option=post&cat=trash">Thùng rác</a>
               </div>
               <div class="col-md-6 text-right">
                  <a href="index.php?option=post" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về thương hiệu
                  </a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <?php require_once "../views/backend/message.php"; ?>
            <div class="row">
               <div class="col-md-12">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Tên thương hiệu</th>
                           <th>Tên thương hiệu</th>
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
                                    <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->title; ?>
                                    </div>
                                    <div class="function_style">
                                       <a href="index.php?option=post&cat=restore&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                          <i class="fas fa-undo"></i> Khôi Phục
                                       </a>
                                       <a href="index.php?option=post&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                          <i class="fas fa-trash"></i> Xoá Vĩnh Viễn

                                       </a>
                                    </div>
                                 </td>
                                 <td class="text-center"><?= $item->topic_name; ?> </td>
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