<style>
    .order-details {
        max-width: 800px;
        margin: 0 auto;
    }

    .product {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
    }

    .product-image {
        width: 100px;
        height: 100px;
        overflow: hidden;
        margin-right: 20px;
    }

    .product-image img {
        width: 100%;
        height: auto;
    }

    .product-info {
        flex-grow: 1;
    }

    .product-info h3 {
        font-size: 22px;
        margin-bottom: 10px;
    }

    .quantity,
    .price {
        font-size: 16px;
        margin: 5px 0;
    }

    .order-info p {
        font-size: 16px;
        margin: 5px 0;
    }

    .actions {
        margin-left: 20px;
    }

    .cancel-order {
        background-color: #f44336;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .cancel-order:hover {
        background-color: #e53935;
    }

</style>
@foreach($orders as $order)
    @foreach($order->products as $product)
    <div class="order-details">
    <div class="product">
        <div class="product-image">
            <img src="{{asset('products/'.$product->product_name)}}.jpg" alt="Product"/>
        </div>
        <div class="product-info">
            <h3>Product 1</h3>
            <p class="quantity">Quantity: 2</p>
            <p class="price">$10</p>
        </div>
        <div class="order-info">
            <p>Order date: May 5, 2023</p>
            <p>Delivery date: May 8, 2023</p>
        </div>
        <div class="actions">
            <button class="cancel-order">Cancel Order</button>
        </div>
    </div>
</div>
    @endforeach
@endforeach
