<div class="vertical-menu" style="color:#0A1199;">

            <div data-simplebar class="h-100" style="color:#0A1199;">

                <!--- Sidemenu -->
                <div id="sidebar-menu" style="color:#0A1199;">
                    <!-- Left Menu Start -->
                    <?php if(Yii::$app->user->identity->role == 10){ ?>

                        <ul class="metismenu list-unstyled" style="color:#0A1199;" id="side-menu">  

                                <li >
                                    <a href="<?= \Yii::$app->request->baseurl ?>/admin/admin-dashboard" style="color:#0A1199;">
                                        <i data-feather="home" style="color:#0A1199;"></i>
                                        <!--<span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>-->
                                        <span data-key="t-dashboard" style="color:#0A1199;"S>Dashboard </span>
                                    </a>
                                </li>

                                
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i class="fa fa-users" style="font-size: 1rem;"></i>
                                        <span data-key="t-bookings">Categories </span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="<?= \Yii::$app->request->baseurl ?>/categories/create" key="t-bookings-list">Add Categories </a></li>
                                        <li><a href="<?= \Yii::$app->request->baseurl ?>/categories/index" key="t-bookings-list">Manage Categories  </a></li>
                                    </ul>
                                </li>                                                           
                            
                                <li>
                                    <a href="<?= \Yii::$app->request->baseurl ?>/site/logout">
                                        <i data-feather="log-out"></i>
                                        <span data-key="t-logout">Logout </span>
                                    </a>
                                </li>
                            

                        </ul>
                    <?php }else if(Yii::$app->user->identity->role == 20){ ?>

                        <ul class="metismenu list-unstyled" style="color:#0A1199;" id="side-menu">  

                                <li >
                                    <a href="<?= \Yii::$app->request->baseurl ?>/user/user-dashboard" style="color:#0A1199;">
                                        <i data-feather="home" style="color:#0A1199;"></i>
                                        <!--<span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>-->
                                        <span data-key="t-dashboard" style="color:#0A1199;"S>Dashboard </span>
                                    </a>
                                </li>

                                
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i class="fa fa-users" style="font-size: 1rem;"></i>
                                        <span data-key="t-bookings">Budget </span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="<?= \Yii::$app->request->baseurl ?>/budgets/create" key="t-bookings-list">Add Budget </a></li>
                                        <li><a href="<?= \Yii::$app->request->baseurl ?>/budgets/index" key="t-bookings-list">Manage Budgets  </a></li>
                                    </ul>
                                </li>                                                         
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i class="fa fa-users" style="font-size: 1rem;"></i>
                                        <span data-key="t-bookings">Transactions </span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="<?= \Yii::$app->request->baseurl ?>/transactions/create" key="t-bookings-list">Add Transaction </a></li>
                                        <li><a href="<?= \Yii::$app->request->baseurl ?>/transactions/index" key="t-bookings-list">Manage Transactions  </a></li>
                                    </ul>
                                </li>                                                         
                            
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i class="fas fa-cog" style="font-size: 1rem;"></i>
                                        <span data-key="t-bookings">Profile</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="<?= \Yii::$app->request->baseurl ?>/user/user" key="t-bookings-list">User </a></li>
                                        <!-- <li><a href="<?= \Yii::$app->request->baseurl ?>/admin/security" key="t-bookings-list">Security </a></li> -->
                                    </ul>
                                </li>
                                
                            
                                
                            
                            <li>
                                    <a href="<?= \Yii::$app->request->baseurl ?>/site/logout">
                                        <i data-feather="log-out"></i>
                                        <span data-key="t-logout">Logout </span>
                                    </a>
                                </li>
                            

                        </ul>

                        <?php } ?>
                </div>
                
            </div>
        </div>