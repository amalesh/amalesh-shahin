<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                            <h2>Special Report List</h2>
                            <span class="add-new-content"><a onclick="specialReportsObject.showSpecialReportsCreateModal()">Add New Special Report</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Link Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="specialreports-list">
                                <?php
                                foreach ($AllSpecialReportss AS $specialreports) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="specialReportsObject.showSpecialReportsEditModal('.$specialreports['ID'].')">'.$specialreports['Title'].'</a></td>
                                    <td>'.$specialreports['LinkAddress'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="specialReportsObject.showSpecialReportsEditModal('.$specialreports['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="specialReportsObject.deleteSpecialReports('.$specialreports['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New SpecialReports Modal Start -->
<div class="modal modal-fix" id="addSpecialReportsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Special Reports</h4>
            </div>
            <form id="addNewSpecialReports" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="SpecialReportsTitle" name="Title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Link Address </span>
                        </label>
                        <div class="col-md-6">
                            <input id="SpecialReportsLinkAddress" name="LinkAddress" maxlength="300">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="SpecialReportsImagePath" name="SpecialReportsImagePath" type="file" onchange="specialReportsObject.setSpecialReportsImagePathThumbnail(this, 'SpecialReportsImagePathThumbnail')" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <img id="SpecialReportsImagePathThumbnail" src='' alt="Thumbnail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="SpecialReportsIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="SpecialReportsIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="specialreports_modal" class="btn btn-info" type="button" onclick="specialReportsObject.submitSpecialReportsModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New SpecialReports Modal End -->
