<?php
use App\Libraries\MyClass;
use App\Models\menu;
$id=$_REQUEST['id'];
$menu=menu::find($id);
if($menu==null)
{    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=menu");
}
?>
<?php require_once "../views/backend/header.php";?>

<form action="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chỉnh sửa thành viên</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=menu" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" type="sumbit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="mb-3">
                        <input type="hidden" value="<?=$menu->id;?>" name="id">
                           <label>Tên Menu</label>
                           <input type="text" value="<?=$menu->name;?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Link</label>
                           <input type="text" value="<?=$menu->link;?>" name="link" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mã cấp cha(ko nên đụng)</label>
                           <input type="text" value="<?=$menu->parent_id;?>" name="parent_id" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Level</label>
                           <input type="text" value="<?=$menu->level;?>" name="level" class="form-control">
                        </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label>Vị trí</label>
                           <select name="position" class="form-control">
                           <option value="mainmenu">Main Menu</option>
                              <option value="footermenu">Footer Menu</option>
                           <option value="mainmenu" <?=($menu->position=="mainmenu")? 'select' :'';?>>Main Menu</option>
                              <option value="footermenu"<?=($menu->position=="footermenu")? 'select' :'';?>>Footer Menu</option>
                           </select>
                        </div>
                        <div class="mb-3">
                        <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($menu->status==1)? 'select' :'';?>>Xuất bản</option>
                              <option value="2"<?=($menu->status==2)? 'select' :'';?>>Chưa xuất bản</option>
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