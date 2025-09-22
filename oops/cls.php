<?php 
class Products{
        
    public $name;
    public $price;
    public function display(){
        echo "produtcs: $this->name <br>price:$this->price";
    }
}

$items=new Products();
$items->name="Shoe";
$items->price=2000;
$items->display();

?>