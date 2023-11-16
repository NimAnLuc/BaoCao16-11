<?php
use App\Models\Banner;
$id=$_REQUEST['id'];
$banner=Banner::find($id);
if($banner==null)
{
    header("location:index.php?option=banner");
}
?>
<?php require_once "../views/backend/header.php";?>
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chỉnh sửa banner</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=banner">Tất cả(12)</a>
                     <a href="index.php?option=banner&cat=trash">Thùng rác(12)</a>
                  </div>
                     <div class="col-md-6 text-right">
                     <a href="index.php?option=banner" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" type="sumbit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
               </div>
                  </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="mb-3">
                        <input type="hidden" value="<?=$banner->id;?>" name="id">
                           <label>Tên banner (*)</label>
                           <input type="text" value="<?=$banner->name;?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Liên kết</label>
                           <input type="text" value="<?=$banner->link;?>" name="link" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mô tả (*)</label>
                           <textarea name="detail" value="<?=$banner->detail;?>" rows="5" class="form-control"></textarea>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label>Vị trí (*)</label>
                           <select name="position" value="<?=$banner->position;?>" class="form-control">
                              <option value="">None</option>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình (*)</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                           <option value="1" <?=($banner->status==1)? 'select' :'';?>>Xuất bản</option>
                              <option value="2"<?=($banner->status==2)? 'select' :'';?>>Chưa xuất bản</option>
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