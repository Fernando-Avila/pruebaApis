

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">

                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
                <?php if($message = Session::get('fail')): ?>
                <div class="alert alert-danger">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>
                <a href="<?php echo e(route('client.create')); ?>" class="btn btn-primary">create</a>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Ci</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($client->name); ?></td>
                                    <td><?php echo e($client->ci); ?></td>
                                    <td><?php echo e($client->email); ?></td>
                                    <td> <a href="<?php echo e(route('client.edit', ['client' => $client->id])); ?>"
                                            class=" btn btn-primary"> Edit</a><a href="<?php echo e(route('client.show', ['client' => $client->id])); ?>" class=" btn btn-success">
                                            Review</a>
                                        <form action="<?php echo e(route('client.destroy', ['client' => $client->id])); ?>"
                                            method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class=" btn btn-danger" onclick="return confirm('Are you sure to delete the client??')">
                                                Delete</button>
                                        </form>
                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <?php if($clients->hasPages()): ?>
                                        <?php echo e($clients->links()); ?>

                                    <?php endif; ?>
                                    <?php if($clients->total() == 0): ?>
                                        <H3 class="text-center">No clients found</H3>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tfoot>


                    </table>
                </div>

            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alexa\OneDrive\Escritorio\pruebaFernando\hotelmascotas\resources\views/client/index.blade.php ENDPATH**/ ?>