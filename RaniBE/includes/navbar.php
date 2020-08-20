<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)"><?php echo ucfirst($page); ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                   <a class="nav-link" href="javascript:void(0)">
                     <i class="material-icons">dashboard</i>
                     <p class="d-lg-none d-md-block">
                       Stats
                     </p>
                   </a>
                 </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" id="navbarUserDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUserDropdown">
                        <a class="dropdown-item" href="user.php"><i class="fa fa-user-circle-o"></i>&nbsp;User Profile</a>
                        <a class="dropdown-item" href="includes/logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>