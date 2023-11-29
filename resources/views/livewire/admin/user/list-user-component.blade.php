<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>List User</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Issues</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                @foreach($users as $user)
                    <tr class="">
                        <th scope="row">{{$i++}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role?'Admin':'Customer'}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            @if($user->role!=1)
                                <a href="{{route('admin.issue', ['id'=>$user->id])}}" class="btn btn-dark">Detail</a>
                                <?php $j=0?>
                                @foreach($user->issue as $iss)
                                    @if($iss->status==0)
                                        <?php $j++?>
                                    @endif
                                @endforeach
                                @if($j > 0)
                                    <span class="badge badge-info right">{{$j}}</span>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
