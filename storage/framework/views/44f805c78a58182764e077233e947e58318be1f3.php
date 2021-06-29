<?php
$activeName = \Request::segment(1); 
?>
<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Chat with user</title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg myprofile">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2044,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2044,$translate)); ?></span></p>
      </div>
    </section>
 <main role="main">
      <div class="container-fluid page-white-box mt-3">
         <div>
             <?php if($message = Session::get('success')): ?>
             <div class="alert alert-success" role="alert">
                 <span class="alert_icon lnr lnr-checkmark-circle"></span>
                     <?php echo e($message); ?>

                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                     </button>
            </div>
            <?php endif; ?>
            <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                   <?php echo e($message); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                     </button>
            </div>
            <?php endif; ?>
            <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            <?php endif; ?>
            </div>
           <div class="row">
            <?php echo $__env->make('layouts.user_sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-10">
                <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
             
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php if(!empty($list_data)): ?>
                        <?php $__currentLoopData = $list_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                              <div class="icheck-primary">
                                <input type="checkbox" value="" id="check1">
                                <label for="check1"></label>
                              </div>
                            </td>
                            <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                            <td class="mailbox-name">
                                <a href="<?php echo e(url('inbox/'.$list_data->id)); ?>">
                                <?php echo e((Auth::user()->user_type == 'vendor') ? $list_data->user_info->name : $list_data->vendor_info->name); ?>

                                </a>
                            </td>
                            <td class="mailbox-subject">
                                <?php if(!empty($list_data->last_msg)): ?>
                                    <?php echo $list_data->last_msg[0]->message; ?>

                                <?php endif; ?>
                            </td>
                            <td class="mailbox-date">
                                <?php if(!empty($list_data->last_msg)): ?>
                                    <?php echo e($list_data->last_msg[0]->created_at); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">
                                No Chat data found
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>  

         	</div>
         </div>
      </div>
    </main>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH E:\ritesh\htdocs\Office\office\office\zigkart\zigkart\resources\views/inbox.blade.php ENDPATH**/ ?>