<?php
use App\Models\menu;
use App\Libraries\MyClass;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM menu wher status!=0 and id=1 order by created_at desc

$id=$_REQUEST['id'];
$menu=menu::find($id);
if($menu==null)
{
   MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=menu");
}
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      

<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thương hiệu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-12 text-right">
                        <a href="index.php?option=menu" class="btn btn-sm btn-info">
                              <i class="fa fa-arrow-left" aria-hidden="true"></i>
                               Về thương hiệu
                        </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>ID</td>
                                 <td><?=$menu->id;?></td>
                              </tr>
                              <tr>
                                 <td>Tên Menu</td>
                                 <td><?=$menu->name;?></td>
                              </tr>
                              <tr>
                                 <td>Link</td>
                                 <td><?=$menu->link;?></td>
                              </tr>
                              <tr>
                                 <td>type</td>
                                 <td><?=$menu->type;?></td>
                              </tr>
                              <tr>
                                 <td>Mã trong bảng</td>
                                 <td><?=$menu->table_id;?></td>
                              </tr>
                              <tr>
                                 <td>Thứ tự</td>
                                 <td><?=$menu->sort_order;?></td>
                              </tr>
                              <tr>
                                 <td>Vị trí</td>
                                 <td>  <?=$menu->position;?></td>
                              </tr>
                              <tr>
                                 <td>Level</td>
                                 <td><?=$menu->level;?></td>
                              </tr>
                              <tr>
                                 <td>Mã cấp cha</td>
                                 <td><?=$menu->parent_id;?></td>
                              </tr>
                              <tr>
                                 <td>Thời gian tạo</td>
                                 <td><?=$menu->created_at;?></td>
                              </tr>
                              <tr>
                                 <td>Người tạo</td>
                                 <td><?=$menu->created_by;?></td>
                              </tr>
                              <tr>
                                 <td>Thời gian nâng cấp</td>
                                 <td><?=$menu->updated_at;?></td>
                              </tr>
                              <tr>
                                 <td>Người nâng cấp</td>
                                 <td><?=$menu->updated_by;?></td>
                              </tr>
                              <tr>
                                 <td>Trạng thái</td>
                                 <td><?=$menu->status;?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
</section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>