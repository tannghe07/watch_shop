<!--start page content-->
<div class="page-content">


    <!--start breadcrumb-->
    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class=""><a href="javascript:;">Home/</a></li>
                    <li class="active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <!--start product details-->
    <section class="section-padding">
        <div class="container">
            @if(\Illuminate\Support\Facades\Auth::user())
            <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Personal Details</h6>
            <form class="row g-3">
                <div class="card rounded-0 mb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" wire:model="username" class="form-control rounded-0" id="floatingFirstName" placeholder="Name" disabled>
                                    <label for="floatingFirstName">Name</label>
                                    <div>
                                        @error('username')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" wire:model="address" class="form-control rounded-0" id="floatingFirstName" placeholder="Address">
                                    <label for="floatingFirstName">Address</label>
                                    <div>
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" wire:model="phonenumber" class="form-control rounded-0" id="floatingFirstName" placeholder="Phone Number">
                                    <label for="floatingFirstName">Phone Number</label>
                                    <div>
                                        @error('phonenumber')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <select wire:model="payment" name="payments" id="payments" class="form-control rounded-0">
                                        <option value="">Choose payment method</option>
                                        @foreach($payments as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                        <div>
                                            @error('payment')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" wire:model="email" class="form-control rounded-0" id="floatingEmail" placeholder="Email" disabled>
                                    <label for="floatingEmail">Email</label>
                                    <div>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <select wire:model="shipment" wire:change="shipPriceChange" name="shipments" id="shipmentss" class="form-control rounded-0">
                                        <option value="">Choose shipment method</option>
                                        @foreach($shipments as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                        <div>
                                            @error('shipment')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </select>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Order Summary</h5>
                            <div class="hstack align-items-center justify-content-between">
                                <p class="mb-0">Bag Total</p>
                                <p class="mb-0">{{$total}}$</p>
                            </div>
                            <hr>
                            <div class="hstack align-items-center justify-content-between">
                                <p class="mb-0">Delivery</p>
                                <p class="mb-0">{{$shipPrice}}$</p>
                            </div>
                            <hr>
                            <div class="hstack align-items-center justify-content-between fw-bold text-content">
                                <p class="mb-0">Total Amount</p>
                                <p class="mb-0">{{$total + $shipPrice}}$</p>
                            </div>
                        </div>
                    </div>
                    <button type="button" wire:click="saveOrder" wire:confirm="Are you sure to purchase this order?" class="btn btn-ecomm btn-dark w-100 py-3 px-5">Pay Now</button>
                </div>
            </form>
            @else
                <div class="d-flex align-items-center px-3 py-2 border mb-4">
                    <div class="text-start">
                        <h4 class="mb-0 h4 fw-bold">Please Login to checkout</h4>
                    </div>
                    <div class="ms-auto">
                        <a class="btn btn-light btn-ecomm" href="{{ route('login')}}">Login</a>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--start product details-->




</div>
<!--end page content-->
<script>
    window.addEventListener('alert:success', (event) => {
        let data = event.detail;
        console.log();
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Checkout successfully, please check mail to see your order.",
            showConfirmButton: true,
        });
    });
</script>
<script>
    window.addEventListener('alert:fail', (event) => {
        let data = event.detail;
        console.log();
        Swal.fire({
            position: "center",
            icon: "warning",
            title: "Your cart must have at least 1 product to check out",
            showConfirmButton: true,
        });
    });
</script>
<script>
    window.addEventListener('alert:error', (event) => {
        let data = event.detail;
        console.log();
        Swal.fire({
            position: "center",
            icon: "warning",
            title: "send mail failed",
            showConfirmButton: true,
        });
    });
</script>
