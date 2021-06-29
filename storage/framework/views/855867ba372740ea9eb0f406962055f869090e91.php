<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2912,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2912,$translate)); ?> <?php echo e(Helper::translation(2918,$translate)); ?> </h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2912,$translate)); ?></span></p>
      </div>
    </section>
   <main role="main">
      <div class="container-fluid page-white-box mt-3">
      <div>
        <?php if($message = Session::get('success')): ?>
         <div class="alert alert-success" role="alert">
           <span class="alert_icon lnr lnr-checkmark-circle"></span>
             <?php echo $message; ?>

             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span class="fa fa-close" aria-hidden="true"></span>
             </button>
         </div>
        <?php endif; ?>
        <?php if($message = Session::get('error')): ?>
        <div class="alert alert-danger" role="alert">
           <span class="alert_icon lnr lnr-warning"></span>
             <?php echo $message; ?>

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
           <div class="col-md-10 mt-1 mb-1 pt-1 pb-1">
                <div class="container emp-profile">
                  <div class="row">
                  
                  <div class="col-md-12 ash-bg">
                        <div class="comments">
        <div class="comment-wrap">
                <div class="photo">
                <?php 
                $uphoto = Auth::user()->user_photo; 
                if($uphoto != "")
                {
                $path = 'public/storage/users/'.$uphoto;
                }
                else
                {
                 $path = 'public/img/no-user.png';
                }
                ?>
                        <div class="avatar" style="background-image: url('<?php echo e(url('/')); ?>/<?php echo e($path); ?>')"></div>
                </div>
                <div class="comment-block">
                        <form method="POST" action="<?php echo e(route('inbox.store')); ?>" id="conversation_form"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                                <textarea name="message" id="" cols="30" rows="3" placeholder="<?php echo e(Helper::translation(2928,$translate)); ?>" data-bvalidator="required"></textarea>
                                
                                <input type="hidden" name="sender_id" value="<?php echo e(Auth::user()->id); ?>">
                                <input type="hidden" name="inbox_id" value="<?php echo e($messageList[0]->id); ?>">
                                <?php if(Auth::user()->user_type == 'customer'): ?>
                                    <input type="hidden" name="receiver_id" value="<?php echo e($messageList[0]->vendor_id); ?>">
                                <?php else: ?>
                                    <input type="hidden" name="receiver_id" value="<?php echo e($messageList[0]->user_id); ?>">
                                <?php endif; ?>
                                <input type="submit" value="<?php echo e(Helper::translation(2931,$translate)); ?>" class="btn button-color btn-sm px-4 py-2"> 
                                <?php if(Auth::user()->user_type == 'vendor'): ?>
                                    <button type="button" class="btn btn-info btn-sm px-4 py-2" data-toggle="modal" data-target="#vendor_quotation">Create quote</button>
                                <?php endif; ?>
                        </form>
                </div>
        </div>
        <div id="listShow" class="message-height">

            <?php $__currentLoopData = $messageList[0]->message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <div class="comment-wrap li-item">
                        <div class="photo">
                               <?php 
                                $uphoto = $data->sender_info->user_photo; 
                                if($uphoto != "")
                                {
                                $paths = 'public/storage/users/'.$uphoto;
                                }
                                else
                                {
                                 $paths = 'public/img/no-user.png';
                                }
                                ?> 
                            <div class="avatar"style="background-image: url('<?php echo e(url('/')); ?>/<?php echo e($paths); ?>')">
                                
                            </div>
                        </div>
                        <div class="comment-block">
                                <p><b><?php echo e($data->sender_info->name); ?></b></p>
                                <p class="comment-text"><?php echo $data->message; ?></p>
                                <div class="bottom-comment">
                                        <div class="comment-date">
                                            <?php echo e(ZigKart\Helpers\Helper::humanReadDate($data->updated_at)); ?>

                                        </div>
                                        
                                </div>
                        </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

        </div>
        <div class="row mt-9" align="center">
              <div class="turn-page" id="pager"></div>
         </div>
         </div>
         </div>
        </div>
            </div>
           </div>
         </div>
      </div>
    </main>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('component.vendor_quotation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH E:\ritesh\htdocs\Office\office\office\zigkart\zigkart\resources\views/inbox_message.blade.php ENDPATH**/ ?>