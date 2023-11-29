<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>List Orders</h1>
            <h3>Total: {{$total}}$</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Shipment</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Total_price</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                @foreach($bills as $bill)
                    <tr class="">
                        <th scope="row">{{$i++}}</th>
                        <td>{{$bill->user->name}}</td>
                        <td>{{$bill->phone}}</td>
                        <td>{{$bill->address}}</td>
                        <td>{{$bill->payment->name}}</td>
                        <td>{{$bill->shipment->name}}</td>
                        <td>{{$bill->created_at}}</td>
                        <td>{{$bill->total_price}}$</td>
                        <td>
                            <a href="{{route('admin.orderdetail', ['id'=>$bill->id])}}" class="m-1 btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
