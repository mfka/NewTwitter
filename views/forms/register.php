<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
    <div class="text-center">
        <h1>Sign up</h1>
    </div>
    <hr>
    <div class="col-lg-6 col-lg-offset-3">
        <form method="post" action="/register" name="signup">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" id="surname" name="surname">
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>