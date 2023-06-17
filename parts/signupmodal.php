<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signupmodalLabel">Signup to Coder Bench</h1>
                    <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">

                    <form method= "post" action ="parts/han.php">
                    <div class="mb-3">
                              <label for="sname" class="form-label">Enter your name </label>
                              <input type="text" class="form-control" id="sname" name="sname"
                                   aria-describedby="">
                             
                         </div>
                         <div class="mb-3">
                              <label for="semail" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="semail" name="semail"
                                   aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                         </div>
                         <div class="mb-3">
                              <label for="spass" class="form-label">Password</label>
                              <input type="password" class="form-control" id="spassword" name ="spassword">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" id="scpassword" name="scpassword">
                         </div>

                         <button type="submit" class="btn btn-primary">Signup</button>

               </div>

               </form>
          </div>
     </div>
</div>