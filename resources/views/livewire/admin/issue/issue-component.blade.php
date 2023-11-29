<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>List Issue Of Customer {{$user->name}}</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Message</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                @foreach($issues as $issue)
                    <tr class="">
                        <th scope="row">{{$i++}}</th>
                        <td>{{$issue->email}}</td>
                        <td>{{$issue->phone}}</td>
                        <td>{{$issue->issue}}</td>
                        <td>{{$issue->message}}</td>
                        <td>{{$issue->created_at}}</td>
                        <td>
                            @if($issue->status==0)
                                <p class="text-danger">In Processing</p>
                            @else
                                <p class="text-success">Processed</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.sendmailissue', ['id'=>$issue->id])}}" class="btn btn-dark">Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

