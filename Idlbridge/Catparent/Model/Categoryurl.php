<?php
namespace Idlbridge\Catparent\Model;

class Categoryurl extends \Magento\CatalogUrlRewrite\Model\CategoryUrlPathGenerator
{ 
	 public function getUrlPath($category)
    {
		/*die('instart');
      if (in_array($category->getParentId(), [Category::ROOT_CATEGORY_ID, Category::TREE_ROOT_ID])) {
		  die('in array');
            return '';
        }*/
        $path = $category->getUrlPath();
        if ($path !== null && !$category->dataHasChangedFor('url_key') && !$category->dataHasChangedFor('parent_id')) {
            return $path;
        }
        $path = $category->getUrlKey();
        if ($path === false) {
            return $category->getUrlKey();
        }
        /*if ($this->isNeedToGenerateUrlPathForParent($category)) {
            $parentPath = $this->getUrlPath(
                $this->categoryRepository->get($category->getParentId(), $category->getStoreId())
            );
            $path = $parentPath === '' ? $path : $parentPath . '/' . $path;
        }*/
        return $path;
    }
}