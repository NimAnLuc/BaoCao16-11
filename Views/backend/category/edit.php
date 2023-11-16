<?php
use App\Models\Category;
$id=$_REQUEST['id'];
$category=Category::find($id);
if($category==null)
{
    header("location:index.php?option=Category");
}
?>
<?php require_once "../views/backend/header.php";?>
<form action="index.php?option=category&cat=process" method="post" enctype="multipart/form-data">
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật danh mục</h1>
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
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                        <input type="hidden" value="<?=$category->id;?>" name="id">
                           <label>Tên danh mục (*)</label>
                           <input type="text" name="name" value="<?=$category->name;?>" id="name" placeholder="Nhập tên danh mục" class="form-control"
                              onkeydown="handle_slug(this.value);">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" id="slug" value="<?=$category->slug;?>" placeholder="Nhập slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mô Tả</label>
                           <textarea name="description" class="form-control"><?=$category->name;?></textarea>
                        </div>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1"<?=($category->status==1)? 'select' :'';?> >Xuất bản</option>
                              <option value="2"<?=($category->status==2)? 'select' :'';?> >Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once '../views/backend/footer.php';?>