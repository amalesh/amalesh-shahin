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
                            <h2>Job List</h2>
                            <span class="add-new-content"><a onclick="jobObject.showJobCreateModal()">Add New Job</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Organization</th>
                                    <th>Position</th>
                                    <th>Publish Date</th>
                                    <th>Application Deadline</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="job-list">
                                <?php
                                foreach ($AllJobs AS $job) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="jobObject.showJobEditModal('.$job['ID'].')">'.$job['Title'].'</a></td>
                                    <td>'.$job['Organization'].'</td>
                                    <td>'.$job['Position'].'</td>
                                    <td>'.$job['PublishDate'].'</td>
                                    <td>'.$job['ApplicationDeadline'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="jobObject.showJobEditModal('.$job['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="jobObject.deleteJob('.$job['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Job Modal Start -->
<div class="modal modal-fix" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Job</h4>
            </div>
            <form id="addNewJob" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobTitle" name="Title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Organization </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobOrganization" name="Organization" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Description </span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="JobDescription" name="Description" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Position </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobPosition" name="Position" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Application Deadline </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobApplicationDeadline" name="ApplicationDeadline" required class="date-field">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Publish Date </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobPublishDate" name="PublishDate" required class="date-field">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobCircularImagePath" name="JobCircularImagePath" type="file" onchange="jobObject.setJobImagePathThumbnail(this, 'JobCircularImagePathThumbnail')" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <img id="JobCircularImagePathThumbnail" src='' alt="Thumbnail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Salary </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobSalary" name="Salary" required class="date-field">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Educational Requirement </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="JobEducationalRequirement" name="EducationalRequirement" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Experience Requirement </span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="JobExperienceRequirement" name="ExperienceRequirement" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Number of Vacancy </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobNumberOfVacancy" name="NumberOfVacancy">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Age Limit </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobAgeLimit" name="AgeLimit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Location </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobLocation" name="Location">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Job Source </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobSource" name="JobSource">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Job Type </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobType" name="JobType">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Employment Type </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobEmploymentType" name="EmploymentType">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Job Nature </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobNature" name="JobNature">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Applying Procedure </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobApplyingProcedure" name="ApplyingProcedure">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="JobIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="JobIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="job_modal" class="btn btn-info" type="button" onclick="jobObject.submitJobModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Job Modal End -->
