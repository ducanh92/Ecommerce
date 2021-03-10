<?php

namespace App\Components;

class Recursive {
    private $categories;
    private $htmlCategoryString = '';
    

    public function __construct($categories) {
        $this->categories = $categories;
    }

    public function categoryRecursive($parentId, $id = 0, $indentText = '') {
        foreach ($this->categories as $category) {
            if ($category['parent_id'] == $id) {
                if ( !empty($parentId) && $parentId == $category['id']) {
                    $this->htmlCategoryString .= "<option selected value='" . $category['id'] . "'>" . $indentText . $category['name'] . "</option>";
                }
                else {
                    $this->htmlCategoryString .= "<option value='" . $category['id'] . "'>" . $indentText . $category['name'] . "</option>";
                }
                
                $this->categoryRecursive($parentId, $category['id'], $indentText . '--');
            }
        }
        return $this->htmlCategoryString;
    }
}
