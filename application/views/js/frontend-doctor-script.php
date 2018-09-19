<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var doctorObject = {
        searchDoctor: function () {
            var doctorSearchBy = $('#doctorSearchBy').val();
            var doctorLocation = $('#doctorLocation').val();
            var doctorGender = $('#doctorGender').val();
            var formURL = "<?php echo site_url('Doctor/search')?>"+'?doctorSearchBy='+doctorSearchBy+'&doctorLocation='+doctorLocation+'&doctorGender='+doctorGender;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'doctorObject.searchDoctor', function(doctorData){
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
                            '<div class="doctor-address  col-md-4">' +
                            '<span class="icon float-left"><i class="fas fa-map-marker-alt"></i></span> ' +
                            '<strong>Chamber</strong><br><br>' +
                            '<address CLASS="clearfix">' +
                            doctor_info.ChamberAddress+hotline_info +
                            '</address>' +
                            '<div class="clearfix"></div>' +
                            '</div>' +
                            '<div class="doctor-phone  col-md-2">' +
                            '<span class="icon float-left"><i class="fas fa-mobile"></i></span> ' +
                            '<strong>Phone No.</strong><br><br>' +
                            '<div class="float-right">' +
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
        }
    }
</script>