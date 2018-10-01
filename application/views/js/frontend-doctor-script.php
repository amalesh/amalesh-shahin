<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var doctorObject = {
        doctorSearchBy: '',
        doctorLocation: '',
        doctorGender: '',
        doctorArea: '',
        totalDoctor: '',
        perPageInformationNumber: <?php echo config_item('per_page_doctor_information_number');?>,
        searchDoctor: function (pageNo) {
            doctorObject.doctorSearchBy = $('#doctorSearchBy').val();
            doctorObject.doctorLocation = $('#doctorLocation').val();
            doctorObject.doctorGender = $('#doctorGender').val();
            doctorObject.doctorArea = $('#doctorArea').val();
            var formURL = "<?php echo site_url('Doctor/search')?>"+'?doctorSearchBy='+doctorObject.doctorSearchBy+'&doctorLocation='+doctorObject.doctorLocation+'&doctorGender='+doctorObject.doctorGender+'&doctorArea='+doctorObject.doctorArea+'&PageNo='+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'doctorObject.searchDoctor', function(response){
                var doctorData = response.AllDoctors;
                if (response.TotalDoctor != doctorObject.totalDoctor) {
                    doctorObject.totalDoctor = response.TotalDoctor;
                    doctorObject.populatePagination(1);
                }
                if (doctorData) {
                    $('#doctor-information').html('');
                    for (var i = 0; i < doctorData.length; i++) {
                        var doctor_info = doctorData[i];
                        var image_path = doctor_info.ImagePath == '' || doctor_info.ImagePath == null ? '<?php echo base_url();?>application/views/img/doctor.png' : '<?php echo base_url();?>application/views/img/'+doctor_info.ImagePath;
                        var hotline_info = doctor_info.Hotline == '' || doctor_info.Hotline == null ? '' : '<br>Hotline: '+doctor_info.Hotline;
                        var doctor_li_text = '<div class="doctor-list row">' +
                            '<div class="doctor-photo col-md-2">' +
                            '<a href=""><img src="'+image_path+'" alt="doctor"></a>' +
                            '</div>' +
                            '<div class="doctor-name  col-md-3">' +
                            '<h5 class="name">'+doctor_info.Name+'</h5>' +
                            '<p class="title">'+doctor_info.Specialization+'</p>' +
                            '<p class="designation">'+doctor_info.ProfessionDegree+'</p>' +
                            '</div>' +
                            '<div class="doctor-address  col-md-3">' +
                            '<span class="icon float-left"><i class="fas fa-map-marker-alt"></i></span> ' +
                            '<strong>Chamber</strong><br><br>' +
                            '<address CLASS="clearfix">' +
                            doctor_info.ChamberAddress+hotline_info +
                            '</address>' +
                            '<div class="clearfix"></div>' +
                            '</div>' +
                            '<div class="doctor-phone  col-md-3">' +
                            '<span class="icon float-left"><i class="fas fa-mobile"></i></span> ' +
                            '<strong>Phone No.</strong><br><br>' +
                            '<div>' +
                            '<p class="number">'+doctor_info.PhoneNo+'</p>' +
                            '<p class="number">'+doctor_info.MobileNo1+'</p>' +
                            '<p class="number">'+doctor_info.MobileNo2+'</p>' +
                            '<p class="number">'+doctor_info.MobileNo3+'</p>' +
                            '</div>' +
                            '<div class="clearfix"></div>' +
                            '</div>' +
                            '</div>';
                        $('#doctor-information').append(doctor_li_text);
                    }
                }
            });
        },
        populatePagination: function (pageNo, populateList) {
            console.log('Method Name: doctorObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = doctorObject.perPageInformationNumber;
            var total_page = Math.ceil(doctorObject.totalDoctor / per_page_information_number);

            if (populateList === true) doctorObject.searchDoctor(pageNo);
            if (total_page == 1) return;

            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#doctor-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#doctor-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="doctorObject.populatePagination('+previous_page_no+', true)">' +
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
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="doctorObject.populatePagination('+i+', true)">'+i+'</a></li>';
                }
                $('ul#doctor-pagination').append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#doctor-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="doctorObject.populatePagination('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }
</script>