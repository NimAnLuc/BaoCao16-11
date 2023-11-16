<?php
use App\Models\user;
use App\Models\Menu;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$user =  user::find($id);
//
$list_menu = Menu::where([['table_id','=',$id],['type','=','customer']])->get();
if($user==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=customer&cat=trash");
}
if($user->delete())
{
    if(count($list_menu)>0)
    {
        foreach($list_menu as $menu)
        {
            $menu->delete();
        }
    }
    MyClass::set_flash('message',['msg'=>'Xóa Khỏi thành công','type'=>'success']);
    header("location:index.php?option=customer&cat=trash");
}
