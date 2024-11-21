<form action="<?php echo e(route('showroomcategory.index')); ?>" method="GET">
    <?php if($config == 'deleted'): ?>
        <input type="hidden" name="deleted" value="daxoa">
    <?php endif; ?>
    <div class="fill-deleted">
        <a class="all" href="<?php echo e(route('showroomcategory.index')); ?>"> Tất cả</a> |
        <a class="trash" href="<?php echo e(route('showroomcategory.index', ['deleted' => 'daxoa'])); ?>">Thùng rác <span>(<?php echo e($countDeleted); ?>)</span></a>
    </div>

    <div class="flex items-center justify-between gap10 flex-wrap">
        <div class="wg-filter wg-filter-product">
            <fieldset class="search" style="width: 70%">
                <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." class="input-filter"
                    tabindex="2" value="<?php echo e(request('keyword') ?: old('keyword')); ?>" aria-required="true">
            </fieldset>
            <fieldset class="publish" style="width: 40%">
                <div class="select">
                    <?php
                        $publish = request('publish') ?: old('publish');
                    ?>
                    <select class="input-filter" name="publish">
                        <?php $__currentLoopData = Config('general.publish'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?php echo e($publish == $key ? 'selected' : ''); ?>>
                                <?php echo e($val); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </fieldset>

            <div class="button-submit">
                <button class="btn-filter" type="submit"><span>Tìm kiếm</span></button>
            </div>
        </div>
        <a class="tf-button style-1 w208" href="<?php echo e(route('showroom.create')); ?>">
            <i class="icon-plus"></i>Thêm mới
        </a>
    </div>
</form><?php /**PATH E:\laragon2\www\dat\TuneNest_DATN\resources\views/admin/showroom/showroom_category/component/filter.blade.php ENDPATH**/ ?>