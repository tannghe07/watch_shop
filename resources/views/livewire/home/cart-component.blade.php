<!--start page content-->
<div class="page-content">


    <!--start breadcrumb-->
    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class=""><a href="javascript:;">Home/</a></li>
                    <li class="active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <!--start product details-->
    <section class="section-padding">
        <div class="container">
            @if(\Illuminate\Support\Facades\Auth::user())
            <div class="d-flex align-items-center px-3 py-2 border mb-4">
                <div class="text-start">
                    <h4 class="mb-0 h4 fw-bold">My Cart ({{$cart->count()}} items)</h4>
                </div>
                <div class="ms-auto">
                    <a class="btn btn-light btn-ecomm" href="{{ route('home.product', ['id'=>'all']) }}">Continue Shopping</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-xl-8">
                    @foreach($cart as $item)
                      <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-lg-row gap-3">
                                <div class="product-img">
                                    <img src="{{asset('storage/uploads/'.$item->product->image)}}" width="150" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <h5 class="fw-bold mb-0">{{$item->product->name}}</h5>
                                    <div class="product-price d-flex align-items-center gap-2 mt-3">
                                        <div class="h6 fw-bold">{{$item->product->price}}$</div>
{{--                                        <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>--}}
{{--                                        <div class="h6 fw-bold text-danger">(70% off)</div>--}}
                                    </div>
                                    @if($check[$item->id] == true)
                                        <div class="mt-3 hstack gap-2">
                                            <span>Quantity:</span>
                                            <button type="button" wire:click="changeQuantity({{$item->id}})" style="border: 1px solid black; border-radius: 50%; padding: 10px 19px; color: white; background-color: black">{{$item->quantity}}</button>
                                        </div>
                                    @else
                                        <div class="mt-3 hstack gap-2">
                                            <button wire:click.prevent="decreaseQty({{$item->id}})" class="btn btn-sm btn-light border rounded-0">-</button>
                                            <span>{{$item->quantity}}</span>
                                            <button wire:click.prevent="increaseQty({{$item->id}})" class="btn btn-sm btn-light border rounded-0">+</button>
                                            <button type="button" wire:click="changeQuantity({{$item->id}})" class="btn btn-dark">OK</button>
                                        </div>
                                    @endif
                                    <div class="product-price d-flex align-items-center gap-2 mt-3">
                                        <div class="h6 fw-bold">Total: {{$item->total_price}}$</div>
                                    </div>
                                </div>
                                <div class="d-none d-lg-block vr"></div>
                                <div class="d-grid gap-2 align-self-start align-self-lg-center">
                                    <button type="button" wire:click.prevent="deleteItem({{$item->id}})" wire:confirm="Are you sure?" class="btn btn-ecomm"><i class="bi bi-x-lg me-2"></i>Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Order Summary</h5>
                            <div class="hstack align-items-center justify-content-between fw-bold text-content">
                                <p class="mb-0">Total Amount</p>
                                <p class="mb-0">{{$total}}$</p>
                            </div>
                            <div class="d-grid mt-4">
                                <a href="{{route('home.checkout')}}" class="btn btn-dark btn-ecomm py-3 px-5">Check out</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!--end row-->
            @else
                <div class="d-flex align-items-center px-3 py-2 border mb-4">
                    <div class="text-start">
                        <h4 class="mb-0 h4 fw-bold">Please Login to view cart</h4>
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
