<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1 class="text-center">Your account:</h1>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $this->user->name; ?></td>
                    <td><?php echo $this->user->surname; ?></td>
                    <td><?php echo $this->user->email; ?></td>
                </tr>
                <tr>
                    <th>Last login</th>
                    <th>Register date</th>
                    <th>Your Avatar</th>
                </tr>
                <tr>
                    <td><?php echo $this->user->login_date; ?></td>
                    <td><?php echo $this->user->register_date; ?></td>
                    <td><?php echo $this->user->photo; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <hr>
                <a href="user/editAccount/" class="btn btn-primary">Edit Profile</a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Delete Account</button>
            </div>
        </div>
    </div>
</div>

<div id="confirmDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm deleting account!</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="/user/deleteAccount/">
                    <div class="form-group">
                        <label class="control-label" for="pass">To confirm enter your password:</label>
                        <input type="password" id="pass" name="pass" placeholder="Enter Password Here">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="button" class="close" data-dismiss="modal">Cancel
                        </button>
                        <button class="btn btn-danger" type="submit">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
