<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">NewTwitter</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">User <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/user">My Profile</a></li>
                        <li><a href="#">Edit Account</a></li>
                        <li><a href="#">My Comments</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Action</li>
                        <li><a href="/user/logout">Log Out</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Twitts <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/twitt">Show all</a></li>
                        <li><a href="/twitt/add">Add new</a></li>
                        <li><a href="/twitt/delete">Delete Twitt</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Coments</li>
                        <li><a href="/twitt/comment">Show</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

