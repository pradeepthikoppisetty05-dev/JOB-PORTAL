@include('templates.header')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container" >
                <h3>Register</h3>
                <hr>

                <form  action="/register" method="post" >
                    @csrf
                    <div class="row">
                        <div class="col-12 ">
                            <div class="form-group" >
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                        </div>
                    </div>
                    <div class="col-12 ">
                      <div class="form-group" >
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" >
                      </div>
                    </div>
                    <div class="col-12 ">
                      <div class="form-group" >
                        <label for="role">Register As  </label>
                        <select name="role" class="form-control" id="role" required>
                            <option selected value="">Choose Role</option>
                            <option value="applicant">Applicant</option>
                            <option value="employer">Employer</option>
                        </select><br>
                      </div>
                    </div>
                    <div class="col-12 ">
                      <div class="form-group" >
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                      </div>
                    </div>
                    
                    
                    </div>


                    <div class="row">
                    <div class="col-12 col-sm-4">
                      <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <div class="col-12 col-sm-8 text-right">
                      <a href="/">Already have an account?</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>