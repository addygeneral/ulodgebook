<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            <div class="panel-body">
                <?php echo form_open_multipart('expend_iture/incom_es/create', ['id' => 'edit-expenditure-form']) ?>
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
                    <label for="incom_es" class="col-sm-4 col-form-label"><?php echo display('incom_es') ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="incom_es" class="form-control" type="text"
                               placeholder="Add <?php echo display('incom_es') ?>" id="tablename"
                               value="<?php echo html_escape((!empty($intinfo->incomesmesurementitle) ? $intinfo->incomesmesurementitle : null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="incom_esmamount"
                           class="col-sm-4 col-form-label"><?php echo display('incom_esmamount') ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="incom_esmamount" class="form-control" type="text"
                               placeholder="Add <?php echo display('incom_esmamount') ?>" id="tablename"
                               value="<?php echo html_escape((!empty($intinfo->incomesmamount) ? $intinfo->incomesmamount : null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="incom_esmrecorder"
                           class="col-sm-4 col-form-label"><?php echo display('incom_esmrecorder') ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="incom_esmrecorder" class="form-control" type="text"
                               placeholder="Add <?php echo display('incom_esmrecorder') ?>" id="tablename"
                               value="<?php echo html_escape((!empty($intinfo->incomesmrecorder) ? $intinfo->incomesmrecorder : null)) ?>">
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
