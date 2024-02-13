<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            <div class="panel-body">
                <?php echo form_open_multipart('expend_iture/expen_ses/create', ['id' => 'edit-expenditure-form']) ?>
                <?php echo form_hidden('mesurementid', (!empty($intinfo->mesurementid) ? $intinfo->mesurementid : null)) ?>
                <div class="form-group row">
                    <label for="categoritypeyname"
                           class="col-sm-4 col-form-label"><?php echo display('add_category_type') ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('categoritypeyname', $categorytype, $categorytype = $intinfo->categorytypeid, 'class="selectpicker form-control" data-live-search="true" id="categoritypeyname"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expen_ses" class="col-sm-4 col-form-label"><?php echo display('expen_ses') ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="expen_ses" class="form-control" type="text"
                               placeholder="Add <?php echo display('expen_ses') ?>" id="tablename"
                               value="<?php echo html_escape((!empty($intinfo->expensesmesurementitle) ? $intinfo->expensesmesurementitle : null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expen_sesmamount"
                           class="col-sm-4 col-form-label"><?php echo display('expen_sesmamount') ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="expen_sesmamount" class="form-control" type="text"
                               placeholder="Add <?php echo display('expen_sesmamount') ?>" id="tablename"
                               value="<?php echo html_escape((!empty($intinfo->expensesmamount) ? $intinfo->expensesmamount : null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expen_sesmrecorder"
                           class="col-sm-4 col-form-label"><?php echo display('expen_sesmrecorder') ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="expen_sesmrecorder" class="form-control" type="text"
                               placeholder="Add <?php echo display('expen_sesmrecorder') ?>" id="tablename"
                               value="<?php echo html_escape((!empty($intinfo->expensesmrecorder) ? $intinfo->expensesmrecorder : null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="firstname" class="col-sm-4 col-form-label"><?php echo display('image') ?></label>
                    <div class="col-sm-8">
                        <input type="file" accept="image/*" name="categorypicture" onchange="loadFile(event)"><a
                                class="cattooltipsimg" data-toggle="tooltip" data-placement="top"
                                title="Use only .jpg,.jpeg,.png,.pdf,.docx and .xls Files"><i
                                    class="fa fa-question-circle" aria-hidden="true"></i></a>

                        <input type="hidden" name="old_image"
                               value="<?php echo html_escape(base_url(!empty($intinfo->image) ? $intinfo->image : 'assets/img/room-setting/room_images.png')); ?>">
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>
