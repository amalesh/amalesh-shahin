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
                            <h2>Dosage Form List</h2>
                            <span class="add-new-content"><a onclick="dosageFormObject.showDosageFormCreateModal()">Add New Dosage Form</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Dosage Form Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="dosageform-list">
                                <?php
                                foreach ($AllDosageForm AS $dosageform) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="dosageFormObject.showDosageFormEditModal('.$dosageform['ID'].')">'.$dosageform['Name'].'</a></td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="dosageFormObject.showDosageFormEditModal('.$dosageform['ID'].', \''.$dosageform['Name'].'\')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="dosageFormObject.deleteDosageForm('.$dosageform['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New DosageForm Modal Start -->
<div class="modal modal-fix" id="addDosageFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Dosage Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewDosageForm" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="DosageFormName" name="DosageFormName" required>
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
                    <button id="dosageform_modal" class="btn btn-info" type="button" onclick="dosageFormObject.submitDosageFormModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New DosageForm Modal End -->
