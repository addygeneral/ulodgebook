<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            
            <div class="panel-body">
                <?php echo form_open('expend_iture/expend_iture/create') ?>
                <?php echo form_hidden('categorytypeid', (!empty($intinfo->categorytypeid)?$intinfo->categorytypeid:null)) ?>
                <div class="form-group row">
                    <label for="categoryname" class="col-sm-4 col-form-label"><?php echo display('category_name') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="categoryname" class="form-control" type="text" placeholder="Add <?php echo display('category_name') ?>" id="tablename" value="<?php echo html_escape((!empty($intinfo->categorytypetitle)?$intinfo->categorytypetitle:null)) ?>">
                    </div>
                </div>
                
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>