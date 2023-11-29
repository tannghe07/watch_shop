<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>List Product</h1>
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <select wire:model="category_id" wire:change="filterProduct" id="category" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Describe</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                @foreach($products as $product)
                    <tr class="">
                        <th scope="row">{{$i++}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}$</td>
                        <td>{{$product->des}}</td>
                        <td>
                            <img class="w-25 h-auto" src="{{asset('storage/uploads/'.$product->image)}}" alt="">
                        </td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <button wire:navigate href="{{route('admin.editproduct', ['id'=>$product->id])}}" class="m-1 btn btn-primary">Edit</button>
                            <button wire:click="deletePro({{$product->id}})" wire:confirm="Are you sure to delete this product?" class="m-1 btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
