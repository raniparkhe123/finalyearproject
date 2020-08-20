<div class="sidebar" data-color="green" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="" class="simple-text logo-normal">COLLEGE MANAGEMENT</a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item <?php if($page == 'dashboard') echo 'active'; ?>  ">
                <a class="nav-link" href="dashboard.php">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <?php if($user_type == 3 || $user_type == 4) { ?>

            <li class="nav-item <?php if($page == 'concession') echo 'active'; ?>">
                <a class="nav-link" href="railway.php">
                    <i class="material-icons">dashboard</i>
                    <p>Railway Concessions</p>
                </a>
            </li>

            <?php } ?>

            <?php if($user_type == 2) { ?>

            <li class="nav-item <?php if($page == 'subjects') echo 'active'; ?>">
                <a class="nav-link" href="subjects.php">
                    <i class="material-icons">dashboard</i>
                    <p>Subjects</p>
                </a>
            </li>

            <li class="nav-item <?php if($page == 'departments') echo 'active'; ?>">
                <a class="nav-link" href="departments.php">
                    <i class="material-icons">dashboard</i>
                    <p>Departments</p>
                </a>
            </li>

            <li class="nav-item <?php if($page == 'class') echo 'active'; ?>">
                <a class="nav-link" href="class.php">
                    <i class="material-icons">dashboard</i>
                    <p>Class</p>
                </a>
            </li>

            <?php } ?>

            <?php if($user_type == 2 || $user_type == 4) { ?>

            <li class="nav-item <?php if($page == 'marks') echo 'active'; ?>">
                <a class="nav-link" href="marks.php">
                    <i class="material-icons">dashboard</i>
                    <p>Marks</p>
                </a>
            </li>

            <?php } ?>

            <li class="nav-item <?php if($page == 'events') echo 'active'; ?>">
                <a class="nav-link" href="events.php">
                    <i class="material-icons">dashboard</i>
                    <p>Upcoming Events</p>
                </a>
            </li>

        </ul>
    </div>
</div>