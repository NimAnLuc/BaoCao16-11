<?php

use App\Models\Post;

$listid = Post::join('topic', 'post.topic_id', '=','topic.id')
 ->where('post.status', '!=', 0)
 ->where('post.type', '=', 'post')
 ->orderBy('post.created_at', 'desc')
 ->select("post.*", "topic.name as topic_name")
 ->get();
?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả bài viết</h1>
               <a href="index.php?option=post&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
               <div class="col-md-6">
                     <a class="btn btn-info btn xs" href="index.php?option=post">Tất cả</a>
                     <a class="btn btn-danger btn xs" href="index.php?option=post&cat=trash"><i class="fas fa-trash"></i>Thùng rác</a>
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
                     <th>Tiêu đề bài viết</th>
                     <th>Tên danh mục</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($listid as $item) : ?>
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
                                 <a class="btn btn-success btn xs" href="index.php?option=post&cat=status&id=<?php echo $item->id; ?>">
                                    <i class="fas fa-toggle-on"></i>Hiện</a> |
                              <?php else : ?>
                                 <a class="btn btn-danger btn xs" href="index.php?option=post&cat=status&id=<?php echo $item->id; ?>">
                                    <i class="fas fa-toggle-off"></i>Ẩn</a> |
                              <?php endif; ?>
                              <a class="btn btn-primary btn xs" href="index.php?option=post&cat=edit&id=<?php echo $item->id; ?>">
                                 <i class="fas fa-edit"></i>Chỉnh sửa

                              </a> |
                              <a class="btn btn-info btn xs" href="index.php?option=post&cat=show&id=<?php echo $item->id; ?>">
                                 <i class="fas fa-eye"></i>Chi tiết</a> |
                              <a class="btn btn-danger btn xs" href="index.php?option=post&cat=delete&id=<?php echo $item->id; ?>">
                                 <i class="fas fa-trash"></i>Xoá</a>
                           </div>
                        </td>
                        <td class="text-center"><?= $item->topic_name; ?> </td>
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