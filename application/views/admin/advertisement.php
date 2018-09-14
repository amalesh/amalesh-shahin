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
                            <h2>Advertisement List</h2>
                            <span class="add-new-content"><a onclick="advertisementObject.showAdvertisementCreateModal()">Add New Advertisement</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Organization</th>
                                    <th>Title</th>
                                    <th>Publish Date</th>
                                    <th>Unpublish Date</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="advertisement-list">
                                <?php
                                foreach ($AllAdvertisement AS $advertisement) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="advertisementObject.showAdvertisementEditModal('.$advertisement['ID'].')">'.$advertisement['Organization'].'</a></td>
                                    <td>'.$advertisement['Title'].'</td>
                                    <td>'.$advertisement['PublishDate'].'</td>
                                    <td>'.$advertisement['UnpublishedDate'].'</td>
                                    <td>'.$advertisement['PositionName'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="advertisementObject.showAdvertisementEditModal('.$advertisement['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="advertisementObject.deleteAdvertisement('.$advertisement['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Advertisement Modal Start -->
<div class="modal modal-fix" id="addAdvertisementModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Advertisement</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewAdvertisement" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Organization </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementOrganization" name="Organization" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Advertisement Position </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="AdvertisementPositionID" name="AdvertisementPositionID" required onclick="advertisementObject.changeAdvertisementPosition(this.value)"></select>
                        </div>
                    </div>
                    <div class="form-group advertisement-position-detail" style="display: none">
                        <label class="control-label col-md-4"></label>
                        <div class="col-md-6">
                            <textarea id="AdvertisementPositionDetail" rows="6" class="form-control" type="text" disabled></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementImagePath" name="ImagePath" type="file" onchange="advertisementObject.setAdvertisementImagePathThumbnail(this, 'AdvertisementImagePathThumbnail')" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <img id="AdvertisementImagePathThumbnail" src='' alt="Thumbnail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Title </span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementTitle" name="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Body Text </span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="AdvertisementBodyText" name="BodyText" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Link URL </span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementLinkURL" name="LinkURL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Publish Date </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementPublishDate" name="PublishDate" required class="date-field">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Unpublish Date </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementUnpublishedDate" name="UnpublishedDate" required class="date-field">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Contact Person </span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementContactPerson" name="ContactPerson">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Email </span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementEmailID" name="EmailID">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Mobile No </span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementMobileNo" name="MobileNo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="AdvertisementIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="AdvertisementIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="advertisement_modal" class="btn btn-info" type="button" onclick="advertisementObject.submitAdvertisementModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Advertisement Modal End -->
