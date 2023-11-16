<?php

use App\Models\Topic;

$list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'DESC')
   ->get();
$topic_id_html = '';
foreach ($list_topic as $topic) {
   $topic_id_html .= "<option value='$topic->id'>$topic->name</option>";
}
?>
<?php require_once "../views/backend/header.php"; ?>
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
   <!-- CONTENT -->
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thêm mới bài viết</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=page">Tất cả(12)</a>
                     <a href="index.php?option=page&cat=trash">Thùng rác(12)</a>
                  </div>
                  <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-success" type="sumbit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=post" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               
               <div class="row">
                  <div class="col-md-9">
                     <div class="mb-3">
                        <label>Tiêu đề bài viết (*)</label>
                        <input type="text" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết (*)</label>
                        <textarea name="detail" rows="5" class="form-control"></textarea>
                     </div>
                  </div>

                  <div class="col-md-3">
                     <div class="mb-3">
                        <label>Chủ đề (*)</label>
                        <select name="topic_id" class="form-control">
                           <option value="">None</option>
                           <?= $topic_id_html; ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô Tả</label>
                        <textarea name="description" class="form-control"></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- END CONTENT-->

   <?php require_once "../views/backend/footer.php"; ?>