<?php
use App\Models\Menu;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$menu =  menu::find($id);
//
$list_menu = Menu::where([['table_id','=',$id],['type','=','menu']])->get();
if($menu==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=menu&cat=trash");
}
$menu->delete();// xóa khỏi CSDL
MyClass::set_flash('message',['msg'=>'Xóa Khỏi thành công','type'=>'success']);
header("location:index.php?option=menu&cat=trash");