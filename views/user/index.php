<?php
?>
<div class="col-lg-7 col-lg-offset-2 col-md-7 col-md-offset-2 col-sm-12 col-xs-12">
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