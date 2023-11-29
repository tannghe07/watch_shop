<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div>
                <form autocomplete="off">
                    @csrf
                    <span>From:</span><input type="text" id="datepicker">
                    <span>To:</span><input type="text" id="datepicker2">
                    <input type="button" id="button-filter" value="Search">
                </form>
            </div>
            <div id="myfirstchart" style="height: 250px;"></div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
