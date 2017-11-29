<?php
// класс ценника
class PriceTag
{
    // рекомендованная цена
    public $rsp;
    // валюта
    public $currency;

    public function __construct($rsp, $currency = 'USD') {
        $this->rsp = $rsp;
        $this->currency = $currency;
    }

    // метод получения ценника с рекомендованной ценой
    public function getRspTag() {
        return "<span class='rsp'>".$this->rsp." ".$this->currency."</span>";
    }
}

// класс ценника со скидкой
class DiscountTag extends PriceTag
{
    // скидка, %
    public $discount;

    public function __construct($rsp, $discount, $currency = 'USD')
    {
        parent::__construct($rsp, $currency);
        $this->discount = $discount;
    }

    // метод получения цены со скидкой
    public function getDiscountedPrice() {
        return $this->rsp * (1 - $this->discount / 100);
    }

    // метод получения ценника со скидкой
    public function getDiscountTag() {
        return "<span class='rsp'><del>".$this->rsp." ".$this->currency."</del></span><span class='discount'>".
            $this->discount."</span><span class='discounted-price'>".$this->getDiscountedPrice()."</span>";
    }
}

// класс ценника на развес
class ByWeightTag extends PriceTag
{
    // вес товара
    public $weight;
    // единица измерения
    public $unit;

    public function __construct($rsp, $weight, $currency = 'USD', $unit = 'pound')
    {
        parent::__construct($rsp, $currency);
        $this->weight = $weight;
        $this->unit = $unit;
    }

    // метод получения цены взвешенного товара
    public function getWeightedPrice() {
        return $this->rsp * $this->weight;
    }

    // метод получения ценника на развес
    public function getByWeightTag() {
        return "<span class='rsp'>".$this->rsp." per ".$this->unit."</span><span class='weight'>".$this->weight." ".
            $this->unit."s</span><span class='weighted-price'>".$this->getWeightedPrice()."</span>";
    }
}