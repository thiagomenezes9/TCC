<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo e(url('/home')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>I</b>FG</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>IFG</b> News </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"><?php echo e(trans('adminlte_lang::message.togglenav')); ?></span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                
                    
                    
                        
                        
                    
                    
                        
                        
                            
                            
                                
                                    
                                        
                                            
                                            
                                        
                                        
                                        
                                            
                                            
                                        
                                        
                                        
                                    
                                
                            
                        
                        
                    
                

                
                
                    
                    
                        
                        
                    
                    
                        
                        
                            
                            
                                
                                    
                                        
                                    
                                
                            
                        
                        
                    
                
                
                
                    
                    
                        
                        
                    
                    
                        
                        
                            
                            
                                
                                    
                                        
                                        
                                            
                                            
                                        
                                        
                                        
                                            
                                            
                                                
                                            
                                        
                                    
                                
                            
                        
                        
                            
                        
                    
                
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/register')); ?>"><?php echo e(trans('adminlte_lang::message.register')); ?></a></li>
                    <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('adminlte_lang::message.login')); ?></a></li>
                <?php else: ?>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu" id="user_menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo e(Gravatar::get($user->email)); ?>" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo e(Gravatar::get($user->email)); ?>" class="img-circle" alt="User Image" />
                                <p>
                                    <?php echo e(Auth::user()->name); ?>

                                    <small><?php echo e(trans('adminlte_lang::message.login')); ?> <?php echo e(Auth::user()->email); ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            
                                
                                    
                                
                                
                                    
                                
                                
                                    
                                
                            
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                
                                    
                                
                                <div class="pull-right">
                                    <a href="<?php echo e(route('auth.logout')); ?>" class="btn btn-default btn-flat" id="logout"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <?php echo e(trans('adminlte_lang::message.signout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('auth.logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                
                
                    
                
            </ul>
        </div>
    </nav>
</header>
