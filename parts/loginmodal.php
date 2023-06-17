<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginmodalLabel">Login to Coder Bench</h1>
                <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="parts/hanlog.php">
                    <div class="mb-3">
                        <label for="lemail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="lemail" name="lemail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="lPass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="lpass" name="lpass">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

            </div>


            </form>
        </div>
    </div>
</div>