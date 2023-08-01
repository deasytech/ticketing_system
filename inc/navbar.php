<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-success">
    <a class="navbar-brand" href="ticket.php">
        <img src="images/logo.png" class="img-responsive" alt="ticket logo" height="40" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li id="ticket" class="nav-item <?php echo ($current_page == "ticket.php") ? "active" : ""; ?>">
                <a class="nav-link" href="ticket.php">Ticket</a>
            </li>
            <?php if (isset($_SESSION["admin"])) { ?>
                <li id="department" class="nav-item">
                    <a class="nav-link" href="department.php">Department</a>
                </li>
                <li id="user" class="nav-item">
                    <a class="nav-link" href="user.php">Users</a>
                </li>
            <?php } else { ?>
                <li id="user" class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
            <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
                    <img src="//gravatar.com/avatar/<?php echo md5($user['email']); ?>?s=100" width="20px">&nbsp;
                    <?php if (isset($_SESSION["userid"])) {
                        echo $user['name'];
                    } ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>