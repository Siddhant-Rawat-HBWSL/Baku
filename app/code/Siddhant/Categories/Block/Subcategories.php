<?php

namespace Siddhant\Categories\Block;

use Psr\Log\LoggerInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Api\CategoryRepositoryInterfaceFactory;
use Magento\Framework\View\Element\Template\Context;

class Subcategories extends \Magento\Framework\View\Element\Template {

    protected $categoryRepoFactory;
    protected $categoryFactory;
    protected $loggerInterface;

    public function __construct(
        CategoryRepositoryInterfaceFactory $categoryRepoFactory, 
        LoggerInterface $loggerInterface, 
        Context $context,
        CategoryFactory $categoryFactory
        ) {
        parent::__construct($context);
        $this->categoryRepoFactory = $categoryRepoFactory;
        $this->categoryFactory = $categoryFactory;
        $this->loggerInterface = $loggerInterface;
    }

    public function getSubCategories() {
        $categoryObj = $this->categoryRepoFactory->create();
        
        // sub categories for root(default) category (id = 2)
        $idSubCategories = $categoryObj->get(2)->getChildren();
        // dump($idSubCategories);
        $ids = explode(',', $idSubCategories);
        // dump($ids);
    
        $cat = $this->categoryFactory->create();
        
        $subCats = [];

        foreach($ids as $id) {
            array_push($subCats, $cat->load($id)->getName());
        }

        // String of id's sub categories of default category 
        // $this->loggerInterface->info($idSubCategories->getChildren());
        // print($idSubCategories);
        // $this->loggerInterface->info($idSubCategories->getName());
        // $this->loggerInterface->info(gettype($idSubCategories));
        // dump($idSubCategories);

        return $subCats;
    }
}
