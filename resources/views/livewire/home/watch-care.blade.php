<!--start page content-->
<div class="page-content">


    <!--start breadcrumb-->
    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class=""><a href="javascript:;">Home/</a></li>
                    <li class="active" aria-current="page">Watch Care</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <!--start product details-->
    <section class="section-padding">
        <div class="container">

            <div class="row g-4">
                <div class="col-xl-8">
                    <div class="p-4 border">
                        <form>
                            <div class="form-body">
                                <h4 class="mb-0 fw-bold">Send Us your problem</h4>
                                <div class="my-3 border-bottom"></div>
                                <div class="mb-3">
                                    <label class="form-label">Your Name</label>
                                    <input wire:model="username" type="text" class="form-control rounded-0" disabled>
                                    <div>
                                        @error('username')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Your Email</label>
                                    <input wire:model="email" type="text" class="form-control rounded-0" disabled>
                                    <div>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input wire:model="phone" type="text" class="form-control rounded-0">
                                    <div>
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Your Problem:</label><br>
                                    <input wire:model="issue" type="radio" id="repair" name="a" value="repair">
                                    <label for="repair">Repair your watch</label><br>
                                    <input wire:model="issue" type="radio" id="problem" name="a" value="problem">
                                    <label for="css">A problem with our product</label><br>
                                    <input wire:model="issue" type="radio" id="other" name="a" value="other">
                                    <label for="javascript">Other</label>
                                    <div>
                                        @error('issue')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea wire:model="message" class="form-control rounded-0" rows="4" cols="4"></textarea>
                                </div>
                                <div class="mb-0">
                                    <button type="button" wire:click="sendMessage" class="btn btn-dark btn-ecomm">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="p-3 border">
                        <div class="address mb-3">
                            <h5 class="mb-0 fw-bold">Address</h5>
                            <p class="mb-0 font-12">Pham Van Dong Street, Ha Noi, Viet Nam</p>
                        </div>
                        <hr>
                        <div class="phone mb-3">
                            <h5 class="mb-0 fw-bold">Phone</h5>
                            <p class="mb-0 font-13">Hot line 1900 1900</p>
                            <p class="mb-0 font-13">Mobile : 0123456789</p>
                        </div>
                        <hr>
                        <div class="email mb-3">
                            <h5 class="mb-0 fw-bold">Email</h5>
                            <p class="mb-0 font-13">nghetan07@gmail.com</p>
                        </div>
                        <hr>
                        <div class="working-days mb-0">
                            <h5 class="mb-0 fw-bold">Working Days</h5>
                            <p class="mb-0 font-13">Mon - Sat / 8:30 AM - 7:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--start product details-->

</div>
<!--end page content-->
<script>
    window.addEventListener('alert:success', (event) => {
        let data = event.detail;
        console.log();
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Thank for send us your problem, we will send you a email in 24h",
            showConfirmButton: true,
        });
    });
</script>
