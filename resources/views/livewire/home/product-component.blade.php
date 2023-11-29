<!--start page content-->
<div class="page-content">


    <!--start breadcrumb-->
    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class=""><a href="{{route('home.home')}}">Home/</a></li>
                    <li class="active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <!--start product grid-->
    <section class="section-padding">
        <h5 class="mb-0 fw-bold d-none">Product Grid</h5>
        <div class="container">
            <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class="bi bi-funnel me-1"></i> Filters</span></div>
            <div class="row">
                <div class="col-12 col-xl-3 filter-column">
                    <nav class="navbar navbar-expand-xl flex-wrap p-0">
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarFilter" aria-labelledby="offcanvasNavbarFilterLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title mb-0 fw-bold" id="offcanvasNavbarFilterLabel">Filters</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="filter-sidebar">
                                    <div class="card rounded-0">
                                        <div class="card-header d-none d-xl-block bg-transparent">
                                            <h5 class="mb-0 fw-bold">Filters</h5>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="p-1 fw-bold bg-light">Categories</h6>
                                            <div class="categories">
                                                <div class="categories-wrapper height-1 p-1">
                                                    <div class="form-check">
                                                        <input wire:model="category_id" wire:change="filterProduct" type="radio" id="category" name="category" value="all">
                                                        <label for="category">
                                                            <span>All</span><span class="product-number">({{$All_Pro->count()}})</span>
                                                        </label>
                                                    </div>
                                                    @foreach($categories as $category)
                                                        <div class="form-check">
                                                            <input wire:model="category_id" wire:change="filterProduct" type="radio" id="category" name="category" value="{{$category->id}}">
                                                            <label for="category">
                                                                <span>{{$category->name}}</span><span class="product-number">({{$category->product->count()}})</span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-12 col-xl-9">
                    <div class="shop-right-sidebar">
                        <div class="card rounded-0">
                            <div class="card-body p-2">
                                <div class="d-flex align-items-center justify-content-between bg-light p-2">
                                    <div class="product-count">{{$productts->count()}} Items found
                                        @if($cate_name)
                                            for {{$cate_name->name}}
                                        @endif
                                    </div>

{{--                                    <form>--}}
{{--                                        <div class="input-group">--}}
{{--                                            <span class="input-group-text bg-transparent rounded-0 border-0">Sort By</span>--}}
{{--                                            <select class="form-select rounded-0">--}}
{{--                                                <option selected>Whats'New</option>--}}
{{--                                                <option value="1">Popularity</option>--}}
{{--                                                <option value="2">Better Discount</option>--}}
{{--                                                <option value="3">Price : Hight to Low</option>--}}
{{--                                                <option value="4">Price : Low to Hight</option>--}}
{{--                                                <option value="5">Custom Rating</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
                                </div>
                            </div>
                        </div>

                        <div class="product-grid mt-4">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @foreach($products as $product)
                                    <div class="col">
                                        <div class="card border shadow-none">
                                            <div class="position-relative overflow-hidden">
                                                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                                                    {{--                                                <a href="javascript:;"><i class="bi bi-heart"></i></a>--}}
{{--                                                    <a href="javascript:;" wire:click="addToCart({{$product->id}})"><i class="bi bi-basket3"></i></a>--}}
                                                    {{--                                                <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>--}}
                                                </div>
                                                <a href="{{route('home.detail', ['id'=>$product->id])}}">
                                                    <img src="{{asset('storage/uploads/'.$product->image)}}" class="card-img-top" alt="...">
                                                </a>
                                            </div>
                                            <div class="card-body border-top">
                                                <h5 class="mb-0 fw-bold product-short-title">{{$product->name}}</h5>
                                                <p class="mb-0 product-short-name">{{$product->category->name}}</p>
                                                <div class="product-price d-flex align-items-center gap-2 mt-2">
                                                    <div class="h6 fw-bold">{{$product->price}}$</div>
                                                    {{--                                                <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>--}}
                                                    {{--                                                <div class="h6 fw-bold text-danger">(70% off)</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div><!--end row-->
                        </div>

                        <hr class="my-4">

                        <div class="product-pagination">
                            {{$products->links('vendor.pagination.my-paginate')}}
                        </div>

                    </div>
                </div>
            </div><!--end row-->


        </div>
    </section>
    <!--start product details-->




</div>
<!--end page content-->
