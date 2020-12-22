<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $guarded = [];



    public $_items = null;
    public $_totalPrice = 0;
    public $_totalQty = 0;


    public function __construct($oldCart = null)
    {
        if($oldCart)
        {
            $this->_items = $oldCart->_items;
            $this->_totalPrice = $oldCart->_totalPrice;
            $this->_totalQty = $oldCart->_totalQty;
        }
    }


    public function add($id, $product, $size, $quantity)
    {
        $size = $size ? trim($size) : 'unspecified';
        $stored_item = ['product_id' => $id, 'product' => $product, 'size' => $size, 'price' => $product->products_price, 'quantity' => 0 , 'total' => 0];
       
        $key = $size.'_'.$id;
        if($this->_items)
        {
            if(array_key_exists($key, $this->_items))
            {
                $stored_item = $this->_items[$key];
            }
        }

        
        $stored_item['quantity'] += $quantity;
        $stored_item['total'] += $product->products_price * $quantity;
        $this->_items[$key] = $stored_item;
        $this->_totalPrice += $product->products_price * $quantity;
        $this->_totalQty += $quantity;
    }

   




    public function update_quantity($id, $product, $size, $quantity)
    {
        $storedd_item = ['product_id' => $id, 'product' => $product, 'size' => $size, 'price' => $product->products_price, 'quantity' => 0 , 'total' => 0];
       
        $key = $size.'_'.$id;
        if($this->_items)
        {
            if(array_key_exists($key, $this->_items))
            {
                $stored_item = $this->_items[$key];
                $oldTotal = $stored_item['total'];
                $oldQuantity = $stored_item['quantity'];

                $stored_item['quantity'] = $quantity;
                $stored_item['total'] = $product->products_price * $quantity;
                $this->_items[$key] = $stored_item;

                $this->_totalPrice -= $oldTotal;
                $this->_totalPrice += $product->products_price * $quantity;

                $this->_totalQty -= $oldQuantity;
                $this->_totalQty += $quantity;
            }
        }
    }





    public function delete_cart($id, $size)
    {       
        $stored_item = [];
        
        $key = $size.'_'.$id;
        if($this->_items)
        {
            if(array_key_exists($key, $this->_items))
            {
                $stored_item = $this->_items[$key];
                unset($this->_items[$key]);
            }
        }

        $this->_totalPrice -= $stored_item['price'];
        $this->_totalQty -= $stored_item['quantity'];
    }







    public function wishlist_add_to_cart($id, $product, $wishlist, $size)
    {
        $storedd_item = ['product_id' => $id, 'product' => $product, 'size' => $size, 'price' => $product->products_price, 'quantity' => 0 , 'total' => 0];        
        
        $key = $size.'_'.$id;
        if($this->_items)
        {
            if(array_key_exists($key, $this->_items))
            {
                $stored_item = $this->_items[$key];
            }
        }

        $stored_item['quantity'] += $quantity;
        $stored_item['total'] += $product->products_price * $quantity;
        $this->_items[$key] = $stored_item;
        $this->_totalPrice += $product->products_price * $quantity;
        $this->_totalQty += $quantity;
    }




    
    // end
}


















