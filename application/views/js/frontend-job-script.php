<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var jobObject = {
        totalJob: 0,
        perPageInformationNumber: '',
        getSearchResult: function(pageNo) {
            var formURL = "<?php echo site_url('Job/getJobInformationForFrontend?PageNo=')?>"+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'jobObject.getFeatureProducts', function(jobData){
                if (jobData) {
                    $('div.job-list').html('');
                    for (var i = 0; i < jobData.length; i++) {
                        $('div.job-list').append('<div class="job">' +
                            '<div class="job-info">' +
                            '<a href="<?php echo site_url('Job/showJobDetail?JobID=');?>'+jobData[i].ID+'"><h1 class="job-title"> <i class="fas fa-chevron-right"></i> '+jobData[i].Title+'</h1></a>' +
                            '<h4 class="date">Posted on '+jobData[i].PublishDate+'</h4>' +
                            '<p>'+jobData[i].Description+'</p>' +
                            '</div>' +
                            '<div class="see-more">' +
                            '<a href="<?php echo site_url('Job/showJobDetail?JobID=')?>'+jobData[i].ID+'">Read more</a>' +
                            '</div>' +
                            '</div>');
                    }
                }
            });
        },
        populatePagination: function (pageNo, populateList) {
            console.log('Method Name: jobObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = jobObject.perPageInformationNumber;
            var total_page = Math.ceil(jobObject.totalJob / per_page_information_number);
            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#job-circular-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#job-circular-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="jobObject.populatePagination('+previous_page_no+', true)">' +
                    '                                        <span>&laquo;</span>' +
                    '                                        <span class="sr-only">Previous</span>' +
                    '                                    </a>' +
                    '                                </li>' +
                    '                                ');
            }
            
            for(var i = start_page_no; ; i++) {
                if (page_counter == total_pagination - 1 || page_counter == total_page) {
                    break;
                }
                pagination_li_text = '';
                if (i == pageNo) {
                    pagination_li_text = '<li class="page-item active"><a class="page-link" href="#">'+i+'</a></li>';
                } else {
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="jobObject.populatePagination('+i+', true)">'+i+'</a></li>';
                }
                $('ul#job-circular-pagination').append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#job-circular-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="jobObject.populatePagination('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }

            if (populateList === true) jobObject.getSearchResult(pageNo);
        }
    }
</script>