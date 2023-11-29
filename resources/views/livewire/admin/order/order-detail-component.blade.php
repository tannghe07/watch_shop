<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>Order detail</h1>
            <h3>Order id: {{$bill->id}}</h3>
            <h3>Ship price {{$bill->shipment->price}}$</h3>
            <h3>Total price: {{$bill->total_price}}$</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total price</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                @foreach($billdetails as $item)
                    <tr class="">
                        <th scope="row">{{$i++}}</th>
                        <td class="w-25">
                            <img class="w-25 h-auto m-0 p-0" src="{{asset('storage/uploads/'.$item->product->image)}}" alt="">
                        </td>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->product->price}}$</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}$</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
