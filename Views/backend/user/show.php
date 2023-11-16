<?php
use App\Models\user;
use App\Libraries\MyClass;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM user wher status!=0 and id=1 order by created_at desc

$id=$_REQUEST['id'];
$user=user::find($id);
if($user==null)
{
   MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=user");
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
                        <a href="index.php?option=user" class="btn btn-sm btn-info">
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
                                 <td><?=$user->id;?></td>
                              </tr>
                              <tr>
                                 <td>Tên</td>
                                 <td><?=$user->name;?></td>
                              </tr>
                              <tr>
                                 <td>Tên đăng nhập</td>
                                 <td><?=$user->username;?></td>
                              </tr>
                              <tr>
                                 <td>email</td>
                                 <td><?=$user->email;?></td>
                              </tr>
                              <tr>
                                 <td>SĐT</td>
                                 <td><?=$user->phone;?></td>
                              </tr>
                              <tr>
                                 <td>Địa chỉ</td>
                                 <td><?=$user->address;?></td>
                              </tr>
                              <tr>
                                 <td>Hình</td>
                                 <td>  <img style="width:100px" src="../public/images/user/<?=$user->image;?>" alt="<?=$user->image;?>"></td>
                              </tr>
                              <tr>
                                 <td>Vai trò</td>
                                 <td><?=$user->roles;?></td>
                              </tr>
                              <tr>
                                 <td>Giới tính</td>
                                 <td><?=$user->gender;?></td>
                              </tr>
                              <tr>
                                 <td>Thời gian tạo</td>
                                 <td><?=$user->created_at;?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td><?=$user->created_by;?></td>
                              </tr>
                              <tr>
                                 <td>Thời gian nâng cấp</td>
                                 <td><?=$user->updated_at;?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td><?=$user->updated_by;?></td>
                              </tr>
                              <tr>
                                 <td>Trạng thái</td>
                                 <td><?=$user->status;?></td>
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