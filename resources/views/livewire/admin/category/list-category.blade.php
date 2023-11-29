<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>List Category</h1>
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                            <button wire:navigate href="{{route('admin.editcategory', ['id'=>$category->id])}}" class="btn btn-primary">Edit</button>
                            <button wire:click="deleteCate({{$category->id}})" wire:confirm="Are you sure you want to delete this category?" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
