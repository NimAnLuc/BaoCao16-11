<?php
use App\Models\Banner;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$banner =  Banner::find($id);
if($banner==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=banner&cat=trash");
}
$banner->delete();// xóa khỏi CSDL
MyClass::set_flash('message',['msg'=>'Xóa Khỏi thành công','type'=>'success']);
header("location:index.php?option=banner&cat=trash");