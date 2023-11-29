<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>Issue from {{$issue->user->name}}</h1>
            <h3>Email: {{$issue->email}}</h3>
            <h3>Phone: {{$issue->phone}}</h3>
            <h3>Problem: {{$issue->issue}}</h3>
            <h3>Message: {{$issue->message}}</h3>
            @if($issue->status==0)
                <div class="col-md-7">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" wire:model="title">
                    <div>
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-7">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" wire:model="message"></textarea>
                    <div>
                        @error('message')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button type="button" wire:click="sendEmail" class="btn btn-primary">Send</button>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    window.addEventListener('alert:success', (event) => {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Send email successfully.",
            showConfirmButton: true,
        });
    });
</script>
