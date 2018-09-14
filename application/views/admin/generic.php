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
                            Generic List <span class="add-new-content"><a onclick="genericObject.showGenericCreateModal()">Add New Generic</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Generic Name</th>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Generic</h4>
            </div>
            <form id="addNewGeneric" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="GenericName" name="GenericName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Classification </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="Classification" name="Classification" required maxlength="100"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Safety Remark </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="SafetyRemark" name="SafetyRemark" required maxlength="100"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Indication</label>
                        <div class="col-md-6">
                            <textarea id="Indication" name="Indication" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Dosage Administration</label>
                        <div class="col-md-6">
                            <textarea id="DosageAdministration" name="DosageAdministration" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Contraindication Precaution</label>
                        <div class="col-md-6">
                            <textarea id="ContraindicationPrecaution" name="ContraindicationPrecaution" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Side Effect</label>
                        <div class="col-md-6">
                            <textarea id="SideEffect" name="SideEffect" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Pregnancy Lactation</label>
                        <div class="col-md-6">
                            <textarea id="PregnancyLactation" name="PregnancyLactation" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Is Active</label>
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
