<div class="card">
    <?php if($this->permission->method('expend_iture','create')->access()): ?>
    <div class="card-header">
        <h4><?php echo display('incomes_list')?><small class="float-right"><button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="fa fa-plus-circle" aria-hidden="true"></i>
        <?php echo display('incomes_name')?></button></small></h4>
    </div>
    <?php endif; ?>
    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('incomes_name');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel">
                                
                                <div class="panel-body">
                                    <?php echo form_open_multipart('expend_iture/incom_es/create') ?>
                                    <?php echo form_hidden('mesurementid', (!empty($type->mesurementid)?$type->mesurementid:null)) ?>
                                    <div class="form-group row">
                                        <label for="categoritypeyname" class="col-sm-4 col-form-label"><?php echo display('add_category_type') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <?php echo form_dropdown('categoritypeyname',$categorytype,'', 'class="selectpicker form-control" data-live-search="true" id="categoritypeyname"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="incom_es" class="col-sm-4 col-form-label"><?php echo display('incom_es') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="incom_es" class="form-control" type="text" placeholder="<?php echo display('incom_es') ?>" id="categoryname" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="incom_esamount" class="col-sm-4 col-form-label"><?php echo display('incom_esamount') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="incom_esamount" class="form-control" type="text" placeholder="<?php echo display('incom_esamount') ?>" id="categoryname" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="incom_esrecorder" class="col-sm-4 col-form-label"><?php echo display('incom_esrecorder') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="incom_esrecorder" class="form-control" type="text" placeholder="<?php echo display('incom_esrecorder') ?>" id="categoryname" value="" required>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="firstname" class="col-sm-4 col-form-label"><?php echo display('imag') ?></label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" accept="image/*" name="facilitypicture" onchange="loadFile(event)"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif,.docx,.pdf and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                            
                                            <input type="hidden" class="form-control" name="old_image" value="<?php echo html_escape((!empty($intinfo->image)?$intinfo->image:null)) ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
                
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('update');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body editinfo">
                    
                </div>
                
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display('add_category_type') ?></th>
                            <th><?php echo display('incom_es') ?></th>
                            <th><?php echo display('incom_esamount') ?></th>
                            <th><?php echo display('incom_esrecorder') ?></th>
                            <th><?php echo display('imag')?></th>
                            <th><?php echo display('action') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($incomeslist)) {
                        ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($incomeslist as $type) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($type->categorytypetitle); ?></td>
                            <td><?php echo html_escape($type->incomesmesurementitle); ?></td>
                            <td><?php echo html_escape($type->incomesmamount); ?></td>
                            <td><?php echo html_escape($type->incomesmrecorder); ?></td>
                            
                            <td>
                                <?php if ($type->image): ?>
                                    <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] .'/' . $type->image; ?>" download>
                                        <i class="fa fa-download" aria-hidden="true"></i> Download
                                    </a>
                                <?php endif; ?>
                                </td>
                            <td class="center">
                                <?php if($this->permission->method('expend_iture','update')->access()): ?>
                                <input name="url" type="hidden" id="url_<?php echo html_escape($type->mesurementid); ?>" value="<?php echo base_url("expend_iture/incom_es/updateintfrm") ?>" />
                                <a onclick="editinfo('<?php echo html_escape($type->mesurementid); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                <?php endif;
                                if($this->permission->method('expend_iture','delete')->access()): ?>
                                <a href="<?php echo base_url("expend_iture/incom-es-delete/".html_escape($type->mesurementid)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash"></i></a>
                                <?php endif; ?>
                            </td>
                            
                        </tr>
                        <?php $sl++; ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                    </table>  <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/roomCategoryDetail.js"></script>
