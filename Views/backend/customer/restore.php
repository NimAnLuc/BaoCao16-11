<?php
use App\Libraries\MyClass;
use App\Models\user;

$id = $_REQUEST['id'];
$user =  user::find($id);
if($user==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=customer&cat=trash");
}
//
$user->status = 2;
$user->updated_at = date('Y-m-d H:i:s');
$user->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$user->save();
MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
header("location:index.php?option=customer&cat=trash");