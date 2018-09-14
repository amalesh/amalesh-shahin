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
                            <h2>News List</h2>
                            <span class="add-new-content"><a onclick="newsObject.showNewsCreateModal()">Add New News</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Publish Date</th>
                                    <th>Unpublished Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="news-list">
                                <?php
                                foreach ($AllNewss AS $news) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="newsObject.showNewsEditModal('.$news['ID'].')">'.$news['Title'].'</a></td>
                                    <td>'.$news['PublishDateTime'].'</td>
                                    <td>'.$news['UnpublishedDateTime'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="newsObject.showNewsEditModal('.$news['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="newsObject.deleteNews('.$news['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New News Modal Start -->
<div class="modal modal-fix" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New News</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewNews" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="NewsTitle" name="Title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Description </span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="NewsDescription" name="Description" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Publish Date </span>
                        </label>
                        <div class="col-md-6">
                            <input id="NewsPublishDate" name="PublishDate" required class="date-field">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Unpublished Date </span>
                        </label>
                        <div class="col-md-6">
                            <input id="NewsUnpublishedDate" name="UnpublishedDate" required class="date-field">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="NewsImagePath" name="NewsImagePath" type="file" onchange="newsObject.setNewsImagePathThumbnail(this, 'NewsImagePathThumbnail')" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <img id="NewsImagePathThumbnail" src='' alt="Thumbnail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="NewsIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="NewsIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="news_modal" class="btn btn-info" type="button" onclick="newsObject.submitNewsModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New News Modal End -->
