    <div class="col-lg-offset-2 col-md-offset-1 col-lg-4 col-md-4 col-sm-10 col-xs-10">
        <div class="text-center">
            <h1>Sign in</h1>
        </div>
        <hr>
        <div class="col-lg-6 col-lg-offset-3">
            <form method="post" action="/user/login">
                <div class="form-group">
                    <label for="lemail">Email address:</label>
                    <input type="email" class="form-control" id="lemail" name="email">
                </div>
                <div class="form-group">
                    <label for="lpass">Password:</label>
                    <input type="password" class="form-control" id="lpass" name="pass">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
