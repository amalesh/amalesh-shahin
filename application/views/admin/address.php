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
                            <h2>Address List</h2>
                            <span class="add-new-content"><a onclick="addressObject.showAddressCreateModal()">Add New Address</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Contact Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="address-list">
                                <?php
                                foreach ($AllAddress AS $address) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="addressObject.showAddressEditModal('.$address['ID'].')">'.$address['Name'].'</a></td>
                                    <td>'.$address['AddressCategoryName'].'</td>
                                    <td>'.$address['ContactNumber'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="addressObject.showAddressEditModal('.$address['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="addressObject.deleteAddress('.$address['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Address Modal Start -->
<div class="modal modal-fix" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Address</h4>
            </div>
            <form id="addNewAddress" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AddressName" name="AddressName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Category </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="AddressCategoryID" name="AddressCategoryID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Address Detail</span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="Address" name="Address" rows="6" class="form-control" type="text" maxlength="500" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Contact Number </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ContactNumber" name="ContactNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="AddressIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="AddressIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="address_modal" class="btn btn-info" type="button" onclick="addressObject.submitAddressModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Address Modal End -->
