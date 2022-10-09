<?php

abstract class CategoryComponent
{
    abstract public function render(): string;

    public function add(CategoryComponent $categoryComponent): void { }
}

class CategoryLink extends CategoryComponent
{
    function __construct(private string $title, private string $link){}

    public function render(): string
    {
        return "<li><a href='{$this->link}'>{$this->title}</a></li>". PHP_EOL;
    }
}

class CategoryList extends CategoryComponent
{
    private array $categoryComponents = [];

    function __construct(private string $title){}

    public function add(CategoryComponent $categoryComponent): void
    {
        $this->categoryComponents[] = $categoryComponent;
    }

    public function render(): string
    {
        $result = "<li>{$this->title}</li>".PHP_EOL."<ul>";
        foreach ($this->categoryComponents as $categoryComponent) 
        {
            $result .= $categoryComponent->render();
        }
        $result .= "</ul>" . PHP_EOL;
        return $result ;
    }
}

$categories = new CategoryList('Categories');

$category1 = new CategoryList('Category List 1');
$category1->add(new CategoryLink('Category 1', '/category-1'));
$category1->add(new CategoryLink('Category 2', '/category-2'));

$category2 = new CategoryList('Category List 2');
$category2->add(new CategoryLink('Category 3', '/category-3'));

$category3 = new CategoryList('Category List 3');
$category3->add(new CategoryLink('Category 4', '/category-4'));
$category3->add(new CategoryLink('Category 5', '/category-5'));

$category4 = new CategoryList('Category List 4');
$category4->add(new CategoryLink('Category 6', '/category-6'));

$category2->add($category3);
$category1->add($category4);

$categories->add($category2);
$categories->add($category1);

echo '<ul>'. PHP_EOL;
echo $categories->render();
echo '</ul>';

