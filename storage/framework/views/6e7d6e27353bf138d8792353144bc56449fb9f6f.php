<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(Auth::user()->avatar ? Auth::user()->avatar : Gravatar::get($user->email)); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>




                    <?php if(isset(Auth::user()->membro)): ?>
                        <span><?php echo e(Auth::user()->membro->sigla); ?></span>
                      <?php else: ?>
                        <span>User sem acesso</span>
                    <?php endif; ?>

                    <!-- Status -->
                    
                        
                    
                </div>
            </div>
    <?php endif; ?>

    
    
    
    
    
    
    
    
    
    

    <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
                


                
                
                
                <?php if((Auth::user()->ativo)): ?>


                    <a href="<?php echo e(route('publicacoes.index')); ?>">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Publicações</span>
                        
                    </a>


                    <?php if(isset(Auth::user()->membro)): ?>
                        <?php if(Auth::user()->membro->sigla == 'CCS'): ?>


                            <a href="<?php echo e(route('coordenacoes.index')); ?>">
                                <i class="fa fa-users"></i>
                                <span>Coordenações</span>
                                
                            </a>

                            <a href="<?php echo e(route('usuarios.index')); ?>">
                                <i class="fa fa-user"></i>
                                <span>Usuários</span>
                                
                            </a>
                        <?php endif; ?>


                    <?php endif; ?>
                <?php endif; ?>

            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
