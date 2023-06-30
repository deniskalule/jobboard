<nav class="navbar bg-light shadow ml-1">
    <a class="navbar-brand" href="#" style="color: #aee615;"><i class="fas fa-bars    "></i></a>
    
    <div class="dropdown" style="margin-right: -80%; color: #aee615;">
        <button class="btn btn-light dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                    <i class="fas fa-user    "></i>
                </button>
        <div class="dropdown-menu" aria-labelledby="triggerId">
            <h6 class="dropdown-header"><?= $admin['name'] ?></h6>
        </div>
    </div>
    <a href="logout.php" class="text-danger mr-5">
        <i class="fas fa-power-off    "></i>
        <span>Logout</span>
    </a>
</nav>