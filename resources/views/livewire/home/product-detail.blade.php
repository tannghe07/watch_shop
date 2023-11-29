<!--start page content-->
<div class="page-content">


    <!--start breadcrumb-->
    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class=""><a href="javascript:;">Home/</a></li>
                    <li class="active" aria-current="page">Product Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <!--start product details-->
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-xl-7">
                    <div class="product-images">
                        <div class="product-zoom-images">
                            <div class="row g-3">
                                <div class="col">
                                    <div class="img-thumb-container overflow-hidden position-relative d-flex justify-content-center" data-fancybox="gallery">
                                        <img src="{{asset('storage/uploads/'.$product->image)}}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-5">
                    <div class="product-info">
                        <h4 class="product-title fw-bold mb-1">{{$product->name}}</h4>
                        {{--                        <p class="mb-0">Women Pink & Off-White Printed Kurta with Palazzos</p>--}}
                        <hr>
                        <div class="product-price d-flex align-items-center gap-3">
                            <div class="h4 fw-bold">{{$product->price}}$</div>
                            {{--                            <div class="h5 fw-light text-muted text-decoration-line-through">$2089</div>--}}
                            {{--                            <div class="h4 fw-bold text-danger">(70% off)</div>--}}
                        </div>
                        <p class="fw-bold mb-0 mt-1 text-success">{{$product->category->name}}</p>

                        {{--                        <div class="more-colors mt-4">--}}
                        {{--                            <h6 class="fw-bold mb-3">More Colors</h6>--}}
                        {{--                            <div class="d-flex align-items-center gap-3">--}}
                        {{--                                <div class="">--}}
                        {{--                                    <a href="javascript:;">--}}
                        {{--                                        <img src="assets/images/featured-products/01.webp" width="65" alt="">--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="">--}}
                        {{--                                    <a href="javascript:;">--}}
                        {{--                                        <img src="assets/images/featured-products/02.webp" width="65" alt="">--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="">--}}
                        {{--                                    <a href="javascript:;">--}}
                        {{--                                        <img src="assets/images/featured-products/03.webp" width="65" alt="">--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="">--}}
                        {{--                                    <a href="javascript:;">--}}
                        {{--                                        <img src="assets/images/featured-products/04.webp" width="65" alt="">--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="cart-buttons mt-3">
                            <div class="buttons d-flex flex-column flex-lg-row gap-3 mt-4">
                                <a href="javascript:;" wire:click="addToCart({{$product->id}})" class="btn btn-lg btn-dark btn-ecomm px-5 py-3 col-lg-6"><i class="bi bi-basket2 me-2"></i>Add to Cart</a>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="product-info">
                            <h6 class="fw-bold mb-3">Product Details</h6>
                            <p class="mb-1">{{$product->des}}</p>
                        </div>
                        <hr class="my-3">
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </section>
    <!--start product details-->

    <!--start product details-->
    <section class="section-padding">
        <div class="container">
            <div class="separator pb-3">
                <div class="line"></div>
                <h3 class="mb-0 h3 fw-bold">Similar Products</h3>
                <div class="line"></div>
            </div>
            <div class="similar-products">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
                    @foreach($related_Products as $product)
                        <div class="col">
                            <a href="{{route('home.detail', ['id'=>$product->id])}}">
                                <div class="card rounded-0">
                                    <img src="{{asset('storage/uploads/'.$product->image)}}" alt="" class="card-img-top rounded-0">
                                    <div class="card-body border-top">
                                        <h5 class="mb-0 fw-bold product-short-title">{{$product->name}}</h5>
                                        <p class="mb-0 product-short-name">{{$product->category->name}}</p>
                                        <div class="product-price d-flex align-items-center gap-3 mt-2">
                                            <div class="h6 fw-bold">{{$product->price}}$</div>
                                            {{--                                        <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>--}}
                                            {{--                                        <div class="h6 fw-bold text-danger">(70% off)</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end product details-->


</div>
<!--end page content-->
<script>
    window.addEventListener('alert', (event) => {
        let data = event.detail;
        console.log();
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Add to cart successfully.",
            showConfirmButton: true,
        });
    });
</script>

