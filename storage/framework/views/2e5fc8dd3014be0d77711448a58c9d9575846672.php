

<?php $__env->startSection('content'); ?>
    <div class="container center">
        <div class="row">
            <div class="col-12 text-center ">
                <?php if(isset($client)): ?>
                    <form action="<?php echo e(route('client.update', ['client' => $client->id])); ?>" method="post">
                        <?php echo method_field('PUT'); ?>
                    <?php else: ?>
                        <form action="<?php echo e(route('client.store')); ?>" method="post">
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="card action">
                    <div class="card-body">
                        <?php if(isset($client)): ?>
                            <h4 class="card-title">Edit client</h4>
                        <?php else: ?>
                            <h4 class="card-title">Create Client</h4>
                        <?php endif; ?>
                        <p class="card-text">Body</p>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="<?php echo e(old('name') ?? @$client->name); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></label>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="ci">CI</label>
                            <input type="text" name="ci" id="ci" class="form-control"
                                value="<?php echo e(old('ci') ?? @$client->name); ?>">
                            <?php $__errorArgs = ['ci'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></label>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="<?php echo e(old('email') ?? @$client->email); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></label>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password">password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                value="<?php echo e(old('password') ?? @$client->password); ?>">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></label>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="age">age</label>
                            <input type="number" name="age" id="quality" class="form-control",
                                value="<?php echo e(old('age') ?? @$client->age); ?>">
                            <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></label>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gener</label>
                            <select class="form-select form-select-lg" name="" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php if(isset($client)): ?>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary">Create</button>
                        <?php endif; ?>
                    </div>
                    </form>


                </div>
            </div>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alexa\OneDrive\Escritorio\pruebaFernando\hotelmascotas\resources\views/client/create.blade.php ENDPATH**/ ?>