<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.home')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<?php if((Auth::user()->ativo)): ?>

					<h1>Bem Vindo</h1>

				<?php else: ?>

				  <div class="row">
					  
					  <div class="col-md-4">
						  <div class="panel panel-default">
							  <div class="panel-body">
								  imagem
							  </div>
							  <div class="panel-footer">
								  titulo da noticia
							  </div>
						  </div>
					  </div>
				  </div>

					VC TA DESATIVADO

					<?php endif; ?>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>