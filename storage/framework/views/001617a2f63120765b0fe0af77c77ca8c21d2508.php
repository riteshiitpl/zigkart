<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php if(Auth::user()->user_type == 'vendor'): ?><?php echo e(Helper::translation(1927,$translate)); ?><?php else: ?><?php echo e(Helper::translation(1912,$translate)); ?><?php endif; ?>  - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(Auth::user()->user_type == 'vendor'): ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(1927,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(1927,$translate)); ?></span></p>
      </div>
    </section>
    <main role="main">
     <div class="container-fluid page-white-box mt-3">
     <div class="row">
         <div class="col-md-12">
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
        </div>
    <div class="row">
        <?php echo $__env->make('layouts.user_sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-10">
             <form action="<?php echo e(route('add-product')); ?>" class="setting_form" id="contact_form" method="post" enctype="multipart/form-data">
             <?php echo e(csrf_field()); ?>

                <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <?php $j = 1; ?>
            <?php $__currentLoopData = $language_page['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php if($j == 1): ?> active show <?php endif; ?>"  data-toggle="tab" href="#<?php echo e($language->language_name); ?>" role="tab"  aria-selected="true"><?php echo e($language->language_name); ?></a>
            </li>
            <?php $j++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <?php $i = 1; ?>
          <?php $__currentLoopData = $languages_page['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tab-pane fade <?php if($i == 1): ?> show active <?php endif; ?> mt-4" id="<?php echo e($language->language_name); ?>" role="tabpanel">
            <div class="form-group row">
              <div class="col-sm-6">
                        <label for="name"><?php echo e(Helper::translation(1928,$translate)); ?><span class="required">*</span></label>
                        <input id="product_name" name="product_name[]" type="text" class="form-control" data-bvalidator="required">
                    </div>
              <div class="col-sm-6">
                        <label for="site_keywords"><?php echo e(Helper::translation(1930,$translate)); ?><span class="required">*</span></label>
                        <textarea name="product_short_desc[]" id="product_short_desc" rows="3" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"></textarea>
                    </div>
                    <div class="col-sm-12">
                         <label for="site_desc"><?php echo e(Helper::translation(1931,$translate)); ?><span class="required">*</span></label>
                        <textarea name="product_desc[]" id="summary-ckeditor<?php echo e($language->language_id); ?>" rows="3"  class="form-control" data-bvalidator="required"></textarea>
                    </div>
                    </div>
          </div>
          <input type="hidden" name="language_code[]" value="<?php echo e($language->language_code); ?>">
          <?php $i++; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
                
                <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="name">Slug<span class="required">*</span></label>
                        <input id="product_slug" name="product_slug" type="text" class="form-control" data-bvalidator="required">
                    </div>
                    <div class="col-sm-6">
                         <label for="name"><?php echo e(Helper::translation(1929,$translate)); ?><span class="required">*</span></label>
                        <input id="product_sku" name="product_sku" type="text" class="form-control" data-bvalidator="required">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="site_title"><?php echo e(Helper::translation(1932,$translate)); ?><span class="required">*</span></label>
                        <select name="product_category[]" class="form-control" data-bvalidator="required" multiple>
                             <?php $__currentLoopData = $categories['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($translate == 'en') { $menuu_id = $menu->cat_id; } else { $menuu_id = $menu->category_page_parent; } ?>
                             <option value="cat-<?php echo e($menuu_id); ?>"><?php echo e($menu->category_name); ?></option>
                             <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($translate == 'en') { $submenuu_id = $sub_category->subcat_id; } else { $submenuu_id = $sub_category->subcategory_page_parent; } ?>
                             <option value="subcat-<?php echo e($submenuu_id); ?>" class="ml-2">- <?php echo e($sub_category->subcategory_name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                     </select>
                    </div>
                    <div class="col-sm-6">
                         <label for="name"><?php echo e(Helper::translation(1933,$translate)); ?></label>
                        <input id="product_video_url" name="product_video_url" type="text" class="form-control">
                        <small>( Example : https://www.youtube.com/watch?v=C0DPdy98e4c )</small>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="name">Single Price<span class="required">*</span></label>
                        <input name="product_price_type" class="product_price_type" type="radio" value="single_price" checked >
                        &nbsp;&nbsp;&nbsp;
                         <label for="name">Bulk Price<span class="required">*</span></label>
                        <input name="product_price_type" class="product_price_type" type="radio" value="bulk_price" >
                    </div>
                </div>

                <div class="form-group row single_price">
                    <div class="col-sm-6">
                         <label for="name"><?php echo e(Helper::translation(1934,$translate)); ?> (<?php echo e($allsettings->site_currency_symbol); ?>)<span class="required">*</span></label>
                        <input id="product_price" name="product_price" type="text" class="form-control" data-bvalidator="required,min[1]">
                    </div>
                    <div class="col-sm-6">
                        <label for="name"><?php echo e(Helper::translation(1935,$translate)); ?> (<?php echo e($allsettings->site_currency_symbol); ?>)</label>
                        <input id="product_offer_price" name="product_offer_price" type="text" class="form-control" data-bvalidator="min[1]">
                    </div>
                </div>


                <div class="form-group row bulk_price">
                    <?php for($i=0; $i<6; $i++): ?>
                        <div class="col-sm-2">
                             <label for="name"><?php if($i==0): ?> (>) <?php endif; ?> Qty <?php if($i==5): ?> (<) <?php endif; ?>  <span class="required">*</span></label>
                            <input id="product_qty_<?php echo e($i); ?>" name="product_qty_[]" type="text" class="form-control product_bulk_qnty">
                        
                             <label for="name">Price($)<span class="required">*</span></label>
                            <input id="product_price_<?php echo e($i); ?>" name="product_price_[]" type="text" class="form-control product_bulk_price">
                        </div>
                    <?php endfor; ?>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="customer_earnings"><?php echo e(Helper::translation(1936,$translate)); ?> <span class="required">*</span></label>
                         <input type="file" id="product_image" name="product_image" class="form-control-file" data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="<?php echo e(Helper::translation(1937,$translate)); ?>"></div>
                    <div class="col-sm-6">
                        <label for="customer_earnings"><?php echo e(Helper::translation(1938,$translate)); ?></label>
                        <input type="file" id="product_gallery[]" name="product_gallery[]" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="<?php echo e(Helper::translation(1937,$translate)); ?>" multiple>
                    </div>
               </div>
               <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="site_keywords"><?php echo e(Helper::translation(1939,$translate)); ?></label>
                        <textarea name="product_tags" id="product_tags" rows="4" placeholder="<?php echo e(Helper::translation(1940,$translate)); ?>" class="form-control noscroll_textarea"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="site_title"><?php echo e(Helper::translation(1941,$translate)); ?><span class="required">*</span></label>
                        <select name="product_allow_seo" id="product_allow_seo" class="form-control" data-bvalidator="required">
                           <option value=""></option>
                           <option value="1"><?php echo e(Helper::translation(1942,$translate)); ?></option>
                           <option value="0"><?php echo e(Helper::translation(1943,$translate)); ?></option>
                       </select>
                    </div>
                </div>
                <div id="ifseo">
                <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="site_keywords"><?php echo e(Helper::translation(1944,$translate)); ?><span class="required">*</span></label>
                        <textarea name="product_seo_keyword" id="product_seo_keyword" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="site_desc"><?php echo e(Helper::translation(1945,$translate)); ?><span class="required">*</span></label>
                        <textarea name="product_seo_desc" id="product_seo_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"></textarea>
                    </div>
                </div>
                </div>
               <div class="form-group row">
                    <div class="col-sm-12">
                         <label for="site_title"><?php echo e(Helper::translation(1946,$translate)); ?><span class="required">*</span></label>
                        <?php /*?><select name="product_type" id="product_type" class="form-control" data-bvalidator="required">
                             <option value=""></option>
                             @foreach($product_type as $type)
                             <option value="{{ $type }}">{{ $type }}</option>
                             @endforeach
                        </select><?php */?>
                        <select name="product_type" id="product_type" class="form-control" data-bvalidator="required">
                             <option value=""></option>
                             <option value="physical"><?php echo e(Helper::translation(2165,$translate)); ?></option>
                             <option value="digital"><?php echo e(Helper::translation(2167,$translate)); ?></option>
                             <?php if($allsettings->display_external_product == 1): ?>
                             <option value="external"><?php echo e(Helper::translation(2166,$translate)); ?></option>
                             <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div id="ifphysical_external">
                <div class="form-group row">
                    <div class="col-sm-12">
                         <label for="site_keywords"><?php echo e(Helper::translation(1947,$translate)); ?></label>
                        <select name="product_brand" id="product_brand" class="form-control">
                             <option value=""></option>
                             <?php $__currentLoopData = $brand['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($brand->brand_id); ?>"><?php echo e($brand->brand_name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="site_keywords"><?php echo e(Helper::translation(1948,$translate)); ?></label>
                        <textarea name="product_return_policy" id="product_return_policy" rows="6" class="form-control noscroll_textarea"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="name"><?php echo e(Helper::translation(1949,$translate)); ?><span class="required">*</span></label>
                        <input id="product_estimate_time" name="product_estimate_time" type="number" class="form-control" data-bvalidator="required,digit,min[1]">
                        <small>Days</small>
                    </div>
               </div>
               <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="site_title"><?php echo e(Helper::translation(1950,$translate)); ?><span class="required">*</span></label>
                        <select name="product_condition" class="form-control" data-bvalidator="required">
                           <option value=""></option>
                           <option value="new"><?php echo e(Helper::translation(1951,$translate)); ?></option>
                           <option value="used"><?php echo e(Helper::translation(1952,$translate)); ?></option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="name"><?php echo e(Helper::translation(1953,$translate)); ?></label>
                        <input id="product_stock" name="product_stock" type="number" class="form-control" data-bvalidator="digit,min[0]">
                        <small><span class="red-color"><?php echo e(Helper::translation(1954,$translate)); ?></span></small>
                    </div>
                </div>
                <?php if(count($attributer['display']) != 0): ?>
                <div class="form-group row">
                    <?php $__currentLoopData = $attributer['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6">
                         <label for="site_title"><?php echo e($attribute->attribute_name); ?></label>
                        <select name="product_attribute[]" class="form-control" multiple>
                           <?php $__currentLoopData = $attribute->attributeagain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($product_value->attribute_value_id); ?>-<?php echo e($attribute->attribute_id); ?>"><?php echo e($product_value->attribute_value); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                </div>
                <?php endif; ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6" id="ifdigital">
                         <label for="customer_earnings"><?php echo e(Helper::translation(1955,$translate)); ?><span class="required">*</span></label>
                        <input type="file" id="product_file" name="product_file" class="form-control-file" data-bvalidator="required,extension[zip]" data-bvalidator-msg="<?php echo e(Helper::translation(1956,$translate)); ?>">                   </div>
                    <div class="col-sm-6" id="ifexternal">
                        <label for="name"><?php echo e(Helper::translation(1957,$translate)); ?><span class="required">*</span></label>
                        <input id="product_external_url" name="product_external_url" type="text" class="form-control" data-bvalidator="required,url">
                    </div>
                </div>
                <div id="ifphysical">
                <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="name"><?php echo e(Helper::translation(1958,$translate)); ?> (<?php echo e($allsettings->site_currency_symbol); ?>)</label>
                        <input id="product_local_shipping_fee" name="product_local_shipping_fee" type="text" class="form-control" data-bvalidator="min[0]">
                        <small>(Vendor country based shipping) <span class="red-color"> - <?php echo e(Helper::translation(1959,$translate)); ?></span></small>
                    </div>
                    <div class="col-sm-6">
                        <label for="name"><?php echo e(Helper::translation(1960,$translate)); ?> (<?php echo e($allsettings->site_currency_symbol); ?>)</label>
                        <input id="product_global_shipping_fee" name="product_global_shipping_fee" type="text" class="form-control" data-bvalidator="min[0]">
                        <small>(Vendor non country based shipping) <span class="red-color"> - <?php echo e(Helper::translation(1959,$translate)); ?></span></small>
                    </div>
                    
                </div>
<br/>
                <div class="form-group row">
                    <div class="col-sm-12">
                         <label for="Length">USPS Shipping ( Single Piece Product Dimensions )</label>
                    </div>
                </div>
                <div class="form-group row">
                
                    <div class="col-sm-4">
                         <label for="product_weight">Product weight</label>
                        <input id="product_weight" name="product_weight" type="text" class="form-control" value="0.0"  data-bvalidator="min[0]">
                        <small>In KG</small>
                    </div>
                    
                    <div class="col-sm-2">
                         <label for="Length">Length</label>
                        <input id="length" name="product_length" type="text" class="form-control" data-bvalidator="min[0]">
                    </div>
                    <div class="col-sm-2">
                         <label for="Width">Width</label>
                        <input id="Width" name="product_width" type="text" class="form-control" data-bvalidator="min[0]">
                    </div>
                    <div class="col-sm-2">
                         <label for="Height">Height</label>
                        <input id="Height" name="product_height" type="text" class="form-control" data-bvalidator="min[0]">
                    </div>
                    <div class="col-sm-2">
                         <label for="Girth">Girth</label>
                        <input id="Girth" name="product_girth" type="text" class="form-control" data-bvalidator="min[0]">
                    </div>
                </div>

                </div>
                
                <div class="form-group row">
                    <div class="col-sm-12">
                         <label for="site_title"><?php echo e(Helper::translation(1961,$translate)); ?><span class="required">*</span></label>
                        <select name="flash_deals" id="flash_deals" class="form-control" data-bvalidator="required">
                           <option value=""></option>
                           <option value="1"><?php echo e(Helper::translation(1942,$translate)); ?></option>
                           <option value="0"><?php echo e(Helper::translation(1943,$translate)); ?></option>
                        </select>
                    </div>
                </div>
                <div id="ifdeal">
                <div class="form-group row">
                    <div class="col-sm-6">
                         <label for="site_keywords"><?php echo e(Helper::translation(1962,$translate)); ?><span class="required">*</span></label>
                        <input id="flash_deal_start_date" name="flash_deal_start_date" type="text" class="form-control" autocomplete="off" data-bvalidator="required">
                    </div>
                    <div class="col-sm-6">
                        <label for="site_desc"><?php echo e(Helper::translation(1963,$translate)); ?><span class="required">*</span></label>
                        <input id="flash_deal_end_date" name="flash_deal_end_date" type="text" class="form-control" autocomplete="off" data-bvalidator="required">
                    </div>
                 </div>
                </div>
                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                <input type="hidden" name="image_size" value="<?php echo e($allsettings->site_max_image_size); ?>"> 
                <input type="hidden" name="file_size" value="<?php echo e($allsettings->site_max_zip_size); ?>">
                <input type="hidden" name="token" value="<?php echo e(uniqid()); ?>"> 
                <button type="submit" class="btn button-color float-left"><?php echo e(Helper::translation(1919,$translate)); ?></button>
            </form>
        </div>
    </div>
</div>
</main>
<?php else: ?>
<?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    $('.product_price_type').click(function(){
        var type = $(this).val();
        
        if(type=='bulk_price'){
            $('.product_bulk_qnty').attr('required','required');
            $('.product_bulk_price').attr('required','required');
            $('.bulk_price').show();
            $('.single_price').hide();
        } else{

            $('.product_bulk_qnty').removeAttr('required','required');
            $('.product_bulk_price').removeAttr('required','required');
            $('.bulk_price').hide();
            $('.single_price').show();
        }
    });
</script>


</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH E:\ritesh\htdocs\Office\office\office\zigkart\zigkart\resources\views/add-product.blade.php ENDPATH**/ ?>