<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/17/2018
 * Time: 10:01 PM
 */
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading edit-link-title">
                            <h2>Generic List </h2>
                            <span class="add-new-content"><a onclick="genericObject.showGenericCreateModal()">Add New Generic</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Generic Name</th>
                                    <th>Indication Tags</th>
                                    <th>Classification</th>
                                    <th>Safety Remark</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="generic-list">
                                <?php
                                foreach ($AllGeneric AS $generic) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="genericObject.showGenericEditModal('.$generic['ID'].')">'.$generic['Name'].'</a></td>
                                    <td>'.$generic['IndicationTags'].'</td>
                                    <td>'.$generic['Classification'].'</td>
                                    <td>'.$generic['SafetyRemark'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="genericObject.showGenericEditModal('.$generic['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="genericObject.deleteGeneric('.$generic['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
                                        </div>
                                    </td>
                                </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </section>

                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--common script init for all pages-->
<!-- Add New Generic Modal Start -->
<div class="modal modal-fix" id="addGenericModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Generic</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewGeneric" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="GenericName" name="GenericName" required>
                            <span class="generic-name-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Classification </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="Classification" name="Classification" required maxlength="100">
                            <span class="classification-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Safety Remark </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="SafetyRemark" name="SafetyRemark" required maxlength="100">
                            <span class="safety-remark-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Indication</label>
                        <div class="col-md-6">
                            <textarea id="Indication" name="Indication" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Indication Tags </span>
                        </label>
                        <div class="col-md-6">
                            <input id="IndicationTags" name="IndicationTags" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Dosage Administration</label>
                        <div class="col-md-6">
                            <textarea id="DosageAdministration" name="DosageAdministration" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Contraindication Precaution</label>
                        <div class="col-md-6">
                            <textarea id="ContraindicationPrecaution" name="ContraindicationPrecaution" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Side Effect</label>
                        <div class="col-md-6">
                            <textarea id="SideEffect" name="SideEffect" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Pregnancy Lactation</label>
                        <div class="col-md-6">
                            <textarea id="PregnancyLactation" name="PregnancyLactation" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="IsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="IsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="generic_modal" class="btn btn-info" type="button" onclick="genericObject.submitGenericModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Generic Modal End -->
