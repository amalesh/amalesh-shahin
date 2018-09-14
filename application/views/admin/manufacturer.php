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
                            <h2>Manufacturer List</h2>
                            <span class="add-new-content"><a onclick="manufacturerObject.showManufacturerCreateModal()">Add New Manufacturer</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Manufacturer Name</th>
                                    <th>Email ID</th>
                                    <th>Phone No</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="manufacturer-list">
                                <?php
                                foreach ($AllManufacturer AS $manufacturer) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="manufacturerObject.showManufacturerEditModal('.$manufacturer['ID'].')">'.$manufacturer['Name'].'</a></td>
                                    <td>'.$manufacturer['EmailID'].'</td>
                                    <td>'.$manufacturer['PhoneNo'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="manufacturerObject.showManufacturerEditModal('.$manufacturer['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="manufacturerObject.deleteManufacturer('.$manufacturer['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Manufacturer Modal Start -->
<div class="modal modal-fix" id="addManufacturerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Manufacturer</h4>
            </div>
            <form id="addNewManufacturer" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ManufacturerName" name="ManufacturerName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Email ID </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="EmailID" name="EmailID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Phone No </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="PhoneNo" name="PhoneNo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Mobile No </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="MobileNo" name="MobileNo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Fax No </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="FaxNo" name="FaxNo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Address </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerAddressID" name="AddressID" onclick="manufacturerObject.changeManufacturerAddress(this.value)"></select>
                        </div>
                    </div>
                    <div class="form-group manufacturer-existing-address">
                        <label class="control-label col-md-3">
                            <span>Address Detail</span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="ManufacturerAddressDetail" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-3">
                            <span>Country </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerCountryID" name="CountryID"></select>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-3">
                            <span>State </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerStateID" name="StateID"></select>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-3">
                            <span>City </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerCityID" name="CityID"></select>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-3">
                            <span>Address</span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="ManufacturerAddress" rows="6" class="form-control" type="text" maxlength="500" name="Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-3">
                            <span>Longitude </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="Longitude" name="Longitude" type="number" maxlength="17">
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-3">
                            <span>Latitude </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="Latitude" name="Latitude" type="number" maxlength="17">
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
                    <button id="manufacturer_modal" class="btn btn-info" type="button" onclick="manufacturerObject.submitManufacturerModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Manufacturer Modal End -->
