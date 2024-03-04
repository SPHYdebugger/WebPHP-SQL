<?php

class Buy implements JsonSerializable
{
    private $id_buy;
    private $client;
    private $product;
    private $buyDate;

    public function __construct($id_buy, $client, $product, $buyDate)
    {
        $this->id_buy = $id_buy;
        $this->client = $client;
        $this->product = $product;
        $this->buyDate = $buyDate;
    }


    public function getIdBuy()
    {
        return $this->id_buy;
    }


    public function setIdBuy($id_buy)
    {
        $this->id_buy = $id_buy;
    }


    public function getClient()
    {
        return $this->client;
    }


    public function setClient($client)
    {
        $this->client = $client;
    }


    public function getProduct()
    {
        return $this->product;
    }


    public function setProduct($product)
    {
        $this->product = $product;
    }


    public function getBuyDate()
    {
        return $this->buyDate;
    }


    public function setBuyDate($buyDate)
    {
        $this->buyDate = $buyDate;
    }


    public function jsonSerialize()
    {
        return [
            'idBuy' => $this->id_buy,
            'client' => $this->client,
            'product' => $this->product,
            'buyDate' => $this->buyDate,
        ];
    }
}