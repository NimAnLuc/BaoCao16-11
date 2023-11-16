<?php
use App\Libraries\MyClass;
use App\Models\Topic;
$id=$_REQUEST['id'];
$topic=Topic::find($id);
if($topic==null)
{    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=topic");
}
?>

<?php require_once "../views/backend/header.php";?>
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả chủ đề</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <button class="btn btn-sm btn-success" type="sumbit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
                  <a href="index.php?option=topic" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                        <input type="hidden" value="<?=$topic->id;?>" name="id">
                           <label>Tên chủ đề (*)</label>
                           <input type="text" value="<?=$topic->name;?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" value="<?=$topic->slug;?>" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Từ Khóa Seo</label>
                           <textarea name="metakey" value="<?=$topic->metakey;?>" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Mô Tả SEO</label>
                           <textarea name="metadesc" value="<?=$topic->metadesc;?>" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($topic->status==1)? 'select' :'';?>>Xuất bản</option>
                              <option value="2"<?=($topic->status==2)? 'select' :'';?>>Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>