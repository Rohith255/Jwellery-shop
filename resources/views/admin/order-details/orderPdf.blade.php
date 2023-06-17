<style>
    h3{
        font-family: Calibri;
        text-align: center;
        color: rgb(247,147,30);
    }
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, sans-serif;
        color: #333;
        margin-bottom: 30px;

    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ccc;

    }

    th {
        background-color: #f6f6f6;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
<div>
    <h3 class="text-center mt-3 text-primary">Sahana Jewels - Order details</h3>
    <table class="table table-bordered" style="border: 1px solid black">
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Metal type</th>
            <th>Weight</th>
            <th>Amount</th>
            <th>Quantity</th>
            <th>Ordered</th>
            <th>Delivered</th>
            <th>Invoice</th>
        </tr>
        @foreach($orders as $order)
            @foreach($order->products as $products)
                <tr>
                    <td>{{$order->customer->name}}</td>
                    <td>{{$products->product_name}}</td>
                    <td>{{$products->metal_type}}</td>
                    <td>{{$products->grams}}.gm</td>
                    <td>{{$products->pivot->amount}}</td>
                    <td>{{$products->pivot->quantity}}</td>
                    <td>{{$products->pivot->order_date}}</td>
                    <td>{{$products->pivot->delivery_date}}</td>
                    <td>{{$products->pivot->invoice_number}}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
</div>
