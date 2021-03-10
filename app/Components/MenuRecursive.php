<?php

namespace App\Components;
use App\Menu;

class MenuRecursive {
    private $htmlOptions;

    public function __construct()
    {
        $this->htmlOptions = '';
    }

    public function menuRecursiveAdd($parentId = 0, $indentText = '')
    {
        $menus = Menu::where('parent_id', $parentId)->get();

        foreach ($menus as $menu) {
            $this->htmlOptions .= '<option value="' . $menu->id . '">' . $indentText . $menu->name . '</option>';
            $this->menuRecursiveAdd($menu->id, $indentText . '--'); 
        }

        return $this->htmlOptions;
    }

    public function menuRecursiveEdit($menuParentIdEdit, $parentId = 0, $indentText = '')
    {
        $menus = Menu::where('parent_id', $parentId)->get();

        foreach ($menus as $menu) {
            if ($menu->id == $menuParentIdEdit) {
                $this->htmlOptions .= '<option selected value="' . $menu->id . '">' . $indentText . $menu->name . '</option>';
            }
            else {
                $this->htmlOptions .= '<option value="' . $menu->id . '">' . $indentText . $menu->name . '</option>';
            }
            
            $this->menuRecursiveEdit($menuParentIdEdit, $menu->id, $indentText . '--'); 
        }

        return $this->htmlOptions;
    }


}

?>