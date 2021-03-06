<?php $__env->startSection('content'); ?>

    <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sat Auctions St Extensions Lookup</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <?php echo Form::open(array('role'=>'form','url'=>'/admin/lookup/sat_auction_st_extension','action'=>'POST', 'files'=>'true')); ?>

                        <?php echo e(csrf_field()); ?>

                        <div class="col-md-2">
                            <?php echo Form::file('csv', null, ['class'=>'form-control']); ?>

                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Start Import</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    </div>



    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>View Table</strong></h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <button id="btn-add" name="btn-add" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> Add New Record</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="data_table" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Code</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($results as $result): ?>
                            <tr>
                                <td><a><strong><?php echo e($result->name); ?></strong></a></td>
                                <td class="text-center"><?php echo e($result->code); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>

    <?php echo $__env->make('components.batches',['application'=>'Recent Sales'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('components.dialog',['dialog_type'=>'modal-danger','title'=>'Confirm','action'=>'/admin/batch/delete','message'=>'Are you sure you want to delete this record?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if($errors->any()): ?>
        <ul class="alert alert-danger">
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.admin',['title'=>'Lookup','icon'=> 'fa fa-pencil-square'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>