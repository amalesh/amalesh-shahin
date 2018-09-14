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
                            <h2>Brand List</h2>
                            <span class="add-new-content"><a onclick="brandObject.showBrandCreateModal()">Add New Brand</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Brand Name</th>
                                    <th>Generic</th>
                                    <th>Price</th>
                                    <th>Manufacturer</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="brand-list">
                                <?php
                                foreach ($AllBrand AS $brand) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="brandObject.showBrandEditModal('.$brand['ID'].')">'.$brand['Name'].'</a></td>
                                    <td>'.$brand['GenericName'].'</td>
                                    <td>'.$brand['PriceInBDT'].' Tk</td>
                                    <td>'.$brand['ManufacturerName'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="brandObject.showBrandEditModal('.$brand['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="brandObject.deleteBrand('.$brand['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Brand Modal Start -->
<div class="modal modal-fix" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Brand</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewBrand" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="BrandName" name="BrandName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Generic </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="GenericID" name="GenericID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Manufacturer </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerID" name="ManufacturerID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Dosage Form </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="DosageFormID" name="DosageFormID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Strength </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="StrengthID" name="StrengthID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Pack Size </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="PackSizeID" name="PackSizeID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Price In BDT </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="PriceInBDT" name="PriceInBDT" max="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="BrandImagePath" name="ImagePath" type="file" onchange="brandObject.setBrandImagePathThumbnail(this, 'BrandImagePathThumbnail')" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <img id="BrandImagePathThumbnail" src='' alt="Thumbnail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Highlighted</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsHighlighted" id="IsHighlightedYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsHighlighted" id="IsHighlightedNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is New Product</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsNewProduct" id="IsNewProductYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsNewProduct" id="IsNewProductNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is New Brand</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsNewBrand" id="IsNewBrandYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsNewBrand" id="IsNewBrandNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is New Presentation</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsNewPresentation" id="IsNewPresentationYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsNewPresentation" id="IsNewPresentationNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="BrandIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="BrandIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="brand_modal" class="btn btn-info" type="button" onclick="brandObject.submitBrandModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Brand Modal End -->
