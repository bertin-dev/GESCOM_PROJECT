<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php
                $connexion = \App::getDB();
                $result = $connexion->rowCount('SELECT * FROM notification_templates');
                if(intval($result)<100)
                    echo '<span class="badge badge-danger badge-counter">'.$result.'</span>';
                else
                    echo '<span class="badge badge-danger badge-counter">99+</span>';
                ?>
            </a>
            <!-- Dropdown - Alerts -->
            <div id="notif" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notifications
                </h6>
                    <?php
                    foreach($connexion->query('SELECT * FROM notification_templates
                                                      ORDER BY id DESC 
                                                      LIMIT 4 
                                                      ') as $retour):

                        echo '<a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle">
                        <img class="img-thumbnail" src="" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><time class="timeago" datetime="'.$retour->created_at.'"></time></div>
                        <span class="font-weight-bold">'.$retour->template_for.'</span><br>
                        <span class="small text-gray-500">'.$retour->subject.'</span>
                           <span class="small text-gray-500"><small></small></span>
                    </div>
                </a>';
                    endforeach;
                    ?>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>


    </ul>

</nav>