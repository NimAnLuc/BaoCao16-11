<?php
use App\Libraries\MyClass;
use App\Models\user;
$id=$_REQUEST['id'];
$user=user::find($id);
if($user==null)
{    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=user");
}
?>
<?php require_once "../views/backend/header.php";?>

<form action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
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
                  <a href="index.php?option=user" class="btn btn-sm btn-info">
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
                        <input type="hidden" value="<?=$user->id;?>" name="id">
                           <label>Họ tên (*)</label>
                           <input type="text" value="<?=$user->name;?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Điện thoại</label>
                           <input type="text" value="<?=$user->phone;?>" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Email</label>
                           <input type="text" value="<?=$user->email;?>" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Tên đăng nhập</label>
                           <input type="text" value="<?=$user->username;?>" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mật khẩu</label>
                           <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Địa chỉ</label>
                           <input type="text" value="<?=$user->address;?>" name="address" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label>Vai trò</label>
                           <select name="roles" class="form-control">
                           <option value="1" <?=($user->roles==1)? 'select' :'';?>>Admin</option>
                              <option value="2"<?=($user->roles==2)? 'select' :'';?>>Khách</option>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Giới tính</label>
                           <select name="gender" class="form-control">
                           <option value="1" <?=($user->gender==1)? 'select' :'';?>>Nam</option>
                              <option value="2"<?=($user->gender==2)? 'select' :'';?>>Nữ</option>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($user->status==1)? 'select' :'';?>>Xuất bản</option>
                              <option value="2"<?=($user->status==2)? 'select' :'';?>>Chưa xuất bản</option>
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