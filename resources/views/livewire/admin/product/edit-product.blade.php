<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>Edit Product</h1>
            <form class="row g-3" wire:submit="updatePro">
                <div class="col-md-7">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" wire:model="name">
                    <div>
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-7">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" wire:model="price" min="0" maxlength="10">
                    <div>
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-7">
                    <label for="describe" class="form-label">Describe</label>
                    <input type="text" class="form-control" id="price" wire:model="des">
                    <div>
                        @error('des')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-7">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" wire:model="image" value="{{$image}}">
                    <div>
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <span>Image Preview</span>
                    <div>
                        @if ($image)
                            <img class="w-50 h-auto" src="{{ $image->temporaryUrl() }}">
                        @endif
                    </div>
                </div>
                <div class="col-md-7">
                    <label for="category" class="form-label">Category</label>
                    <select wire:model="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('category_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
