<?php
use App\Models\product;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$product =  product::find($id);
if($product==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=product&cat=trash");
}
$product->delete();// xóa khỏi CSDL
MyClass::set_flash('message',['msg'=>'Xóa khỏi thành công','type'=>'success']);
header("location:index.php?option=product&cat=trash");