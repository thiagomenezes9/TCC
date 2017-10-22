<?php $__env->startSection('htmlheader_title'); ?>
    Coordenação
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    Lista das Coordenações
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Coordenação</h3>
                        <div align="right"><a href="<?php echo e(route('coordenacoes.create')); ?>" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped" id="tabCoordenacoes">
                            <thead>
                            <tr>
                                <td class="col-md-5"><strong>Nome</strong></td>
                                <td class="col-md-2"><strong>Sigla</strong></td>
                                <td class="col-md-2"><strong>Ativo</strong></td>
                                <td class="col-mb-4" align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            <?php $__currentLoopData = $coordenacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr align="center">
                                    <td align="left"><?php echo e($c->nome); ?></td>
                                    <td align="left"><?php echo e($c->sigla); ?></td>
                                    <td align="left"><?php echo e($c->ativo ? 'Sim' : 'Não'); ?></td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="<?php echo e(route('coordenacoes.show',$c->id)); ?>" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="<?php echo e(route('coordenacoes.edit',$c->id)); ?>" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>


                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        
                            
                        


                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>




<?php $__env->startSection('scriptlocal'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabCoordenacoes').DataTable( {
                "language": {
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próxima"
                    },
                    "sSearch": "<span>Pesquisar</span> _INPUT_", //search
                    "lengthMenu": "Exibir _MENU_ registros por página",
                    "zeroRecords": "Não há resultados para esta busca",
                    "info": "Exibindo página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(Filtrado de _MAX_ registros)"

                }
            } );
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>