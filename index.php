<?php

require('razorpay-php/Razorpay.php');
session_start();
use Razorpay\Api\Api;

$api_key = "ccccc";
$api_secret = "cccccc";

$api = new Api($api_key, $api_secret);

$order_Id = '';

try{
    $orderId = $api->order->create(
        array('receipt' => '123',
                'amount' => 100,
                'currency' => 'INR',
                'notes'=> array(
                'name'=> 'Raman Kumar',
                'mobile'=> '6565656566')
            )
        );
    
    
    $order_Id = $orderId->id;
}catch(Exception $e) {
    print_r($e);
    echo 'Message: ' .$e->getMessage();
  }


echo "<pre>";
 //print_r($order_Id);
 echo $order_Id;
echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<style>
    body{margin-top:20px;}
    select.form-control:not([size]):not([multiple]) {
        height: 44px;
    }
    select.form-control {
        padding-right: 38px;
        background-position: center right 17px;
        background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNv…9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K);
        background-repeat: no-repeat;
        background-size: 9px 9px;
    }
    .form-control:not(textarea) {
        height: 44px;
    }
    .form-control {
        padding: 0 18px 3px;
        border: 1px solid #dbe2e8;
        border-radius: 22px;
        background-color: #fff;
        color: #606975;
        font-family: "Maven Pro",Helvetica,Arial,sans-serif;
        font-size: 14px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .shopping-cart,
    .wishlist-table,
    .order-table {
        margin-bottom: 20px
    }

    .shopping-cart .table,
    .wishlist-table .table,
    .order-table .table {
        margin-bottom: 0
    }

    .shopping-cart .btn,
    .wishlist-table .btn,
    .order-table .btn {
        margin: 0
    }

    .shopping-cart>table>thead>tr>th,
    .shopping-cart>table>thead>tr>td,
    .shopping-cart>table>tbody>tr>th,
    .shopping-cart>table>tbody>tr>td,
    .wishlist-table>table>thead>tr>th,
    .wishlist-table>table>thead>tr>td,
    .wishlist-table>table>tbody>tr>th,
    .wishlist-table>table>tbody>tr>td,
    .order-table>table>thead>tr>th,
    .order-table>table>thead>tr>td,
    .order-table>table>tbody>tr>th,
    .order-table>table>tbody>tr>td {
        vertical-align: middle !important
    }

    .shopping-cart>table thead th,
    .wishlist-table>table thead th,
    .order-table>table thead th {
        padding-top: 17px;
        padding-bottom: 17px;
        border-width: 1px
    }

    .shopping-cart .remove-from-cart,
    .wishlist-table .remove-from-cart,
    .order-table .remove-from-cart {
        display: inline-block;
        color: #ff5252;
        font-size: 18px;
        line-height: 1;
        text-decoration: none
    }

    .shopping-cart .count-input,
    .wishlist-table .count-input,
    .order-table .count-input {
        display: inline-block;
        width: 100%;
        width: 86px
    }

    .shopping-cart .product-item,
    .wishlist-table .product-item,
    .order-table .product-item {
        display: table;
        width: 100%;
        min-width: 150px;
        margin-top: 5px;
        margin-bottom: 3px
    }

    .shopping-cart .product-item .product-thumb,
    .shopping-cart .product-item .product-info,
    .wishlist-table .product-item .product-thumb,
    .wishlist-table .product-item .product-info,
    .order-table .product-item .product-thumb,
    .order-table .product-item .product-info {
        display: table-cell;
        vertical-align: top
    }

    .shopping-cart .product-item .product-thumb,
    .wishlist-table .product-item .product-thumb,
    .order-table .product-item .product-thumb {
        width: 130px;
        padding-right: 20px
    }

    .shopping-cart .product-item .product-thumb>img,
    .wishlist-table .product-item .product-thumb>img,
    .order-table .product-item .product-thumb>img {
        display: block;
        width: 100%
    }

    @media screen and (max-width: 860px) {
        .shopping-cart .product-item .product-thumb,
        .wishlist-table .product-item .product-thumb,
        .order-table .product-item .product-thumb {
            display: none
        }
    }

    .shopping-cart .product-item .product-info span,
    .wishlist-table .product-item .product-info span,
    .order-table .product-item .product-info span {
        display: block;
        font-size: 13px
    }

    .shopping-cart .product-item .product-info span>em,
    .wishlist-table .product-item .product-info span>em,
    .order-table .product-item .product-info span>em {
        font-weight: 500;
        font-style: normal
    }

    .shopping-cart .product-item .product-title,
    .wishlist-table .product-item .product-title,
    .order-table .product-item .product-title {
        margin-bottom: 6px;
        padding-top: 5px;
        font-size: 16px;
        font-weight: 500
    }

    .shopping-cart .product-item .product-title>a,
    .wishlist-table .product-item .product-title>a,
    .order-table .product-item .product-title>a {
        transition: color .3s;
        color: #374250;
        line-height: 1.5;
        text-decoration: none
    }

    .shopping-cart .product-item .product-title>a:hover,
    .wishlist-table .product-item .product-title>a:hover,
    .order-table .product-item .product-title>a:hover {
        color: #0da9ef
    }

    .shopping-cart .product-item .product-title small,
    .wishlist-table .product-item .product-title small,
    .order-table .product-item .product-title small {
        display: inline;
        margin-left: 6px;
        font-weight: 500
    }

    .wishlist-table .product-item .product-thumb {
        display: table-cell !important
    }

    @media screen and (max-width: 576px) {
        .wishlist-table .product-item .product-thumb {
            display: none !important
        }
    }

    .shopping-cart-footer {
        display: table;
        width: 100%;
        padding: 10px 0;
        border-top: 1px solid #e1e7ec
    }

    .shopping-cart-footer>.column {
        display: table-cell;
        padding: 5px 0;
        vertical-align: middle
    }

    .shopping-cart-footer>.column:last-child {
        text-align: right
    }

    .shopping-cart-footer>.column:last-child .btn {
        margin-right: 0;
        margin-left: 15px
    }

    @media (max-width: 768px) {
        .shopping-cart-footer>.column {
            display: block;
            width: 100%
        }
        .shopping-cart-footer>.column:last-child {
            text-align: center
        }
        .shopping-cart-footer>.column .btn {
            width: 100%;
            margin: 12px 0 !important
        }
    }

    .coupon-form .form-control {
        display: inline-block;
        width: 100%;
        max-width: 235px;
        margin-right: 12px;
    }

    .form-control-sm:not(textarea) {
        height: 36px;
    }

    img{width: 70% !important;}


</style>


<div class="container padding-bottom-3x mb-1">
    <!-- Alert-->
    <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;">
        With this purchase you will earn <strong>500</strong> Reward Points.</div>
    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
        <form method="POST" action="https://api.razorpay.com/v1/checkout/embedded">
            <input type="hidden" name="key_id" value="Razor_pay_key_id"/>
            <input type="hidden" name="amount" value=1001/>
            <input type="hidden" name="order_id" value="<?php echo $order_Id;?>"/>
            <input type="hidden" name="name" value="DevstackGeek.com - razorpay integration"/>
            <input type="hidden" name="description" value="A Wild Sheep Chase"/>
            <input type="hidden" name="image" value="https://cdn.razorpay.com/logos/BUVwvgaqVByGp2_large.jpg"/>
            <input type="hidden" name="prefill[name]" value="Vivek J"/>
            <input type="hidden" name="prefill[contact]" value="989898989"/>
            <input type="hidden" name="prefill[email]" value="vivek@yahoooo.com.com"/>
            <input type="hidden" name="notes[shipping address]" value="L-16, The Business Centre, 61 Wellfield Road, New Delhi - 110001"/>
            <input type="hidden" name="callback_url" value="https://devstackgeek.com/payment-callback"/>
            <input type="hidden" name="cancel_url" value="https://devstackgeek.com/payment-cancel"/>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="product-item">
                                <a class="product-thumb" href="#"><img src="images/no-image-available-icon.jpg" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a href="#">Men Printed Round T-shirt</a></h4>
                                    <span><em>Size:</em> M</span><span><em>Color:</em> White</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="count-input">
                                <input type="number" class="form-control" min="1" max="20" placeholder="1">
                            </div>
                        </td>
                        <td class="text-center text-lg text-medium">$40.90</td>
                        <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="product-item">
                                <a class="product-thumb" href="#"><img src="images/no-image-available-icon.jpg" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a href="#">Men Printed Hooded</a></h4><span><em>Size:</em> XL</span><span><em>Color:</em> Black</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="count-input">
                                <input type="number" class="form-control" min="1" max="20" placeholder="1">
                            </div>
                        </td>
                        <td class="text-center text-lg text-medium">$20.89</td>
                        <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="product-item">
                                <a class="product-thumb" href="#"><img src="images/no-image-available-icon.jpg" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a href="#">Men Solid Polo Neck T-shirt</a></h4>
                                    <span><em>Size:</em> M</span><span><em>Color:</em> White</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                        <div class="count-input">
                            <input type="number" class="form-control" min="1" max="20" placeholder="1">
                        </div>
                        </td>
                        <td class="text-center text-lg text-medium">$84.00</td>
                        <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                    </tr>


                    <tr>
                        <td>
                        <div class="column">
                            <a class="btn btn-outline-secondary" href="#"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
                        </td>
                        <td class="text-center">
                            <div class="column">
                                <a class="btn btn-primary" href="#" data-toast=""
                                    data-toast-type="success" data-toast-position="topRight"
                                    data-toast-icon="icon-circle-check" data-toast-title="Your cart"
                                    data-toast-message="is updated successfully!">Update Cart</a>
                            </div>
                        </td>
                        <td class="text-center text-lg text-medium"><strong>Total: $84.00</strong></td>
                        <td class="text-center">
                        <div class="column">

                            <button class="btn btn-success" id="rzp" href="#">Checkout</button></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <div class="shopping-cart-footer">

    </div>
</div>
</body>
<!-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script> -->
</html>
