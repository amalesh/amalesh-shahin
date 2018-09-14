<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var drugObject = {
        searchOptionAutoComplete: [],
        searchOption: 'Brand',
        totalDrug: 0,
        getNewProducts: function(allProduct) {
            var formURL = "<?php echo site_url('Brand/getNewProducts?AllProduct=')?>"+allProduct;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                $('div.new-products-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit = <?php echo config_item("home_page_new_item_limit");?>;
                    for (var i = 0; i < home_page_new_item_limit / 2; i++) {
                        if (i == drugData.length) break;
                        $('div.new-products-ul ul.float-left').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }

                    for (var i = home_page_new_item_limit / 2; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        $('div.new-products-ul ul.float-right').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }
                }
            }
        },
        getNewPresentations: function(allPresentation) {
            var formURL = "<?php echo site_url('Brand/getFeaturePresentations?AllPresentation=')?>"+allPresentation;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeaturePresentations', function(drugData){
                $('div.new-resentation-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit = <?php echo config_item("home_page_new_item_limit");?>;
                    for (var i = 0; i < home_page_new_item_limit / 2; i++) {
                        if (i == drugData.length) break;
                        $('div.new-resentation-ul ul.float-left').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }

                    for (var i = home_page_new_item_limit / 2; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        $('div.new-resentation-ul ul.float-right').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }
                }
            }
        },
        getNewBrands: function(allBrand) {
            var formURL = "<?php echo site_url('Brand/getFeatureBrands?AllBrand=')?>"+allBrand;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureBrands', function(drugData){
                $('div.new-brand-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit = <?php echo config_item("home_page_new_item_limit");?>;
                    for (var i = 0; i < home_page_new_item_limit / 2; i++) {
                        if (i == drugData.length) break;
                        $('div.new-brand-ul ul.float-left').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }

                    for (var i = home_page_new_item_limit / 2; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        $('div.new-brand-ul ul.float-right').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }
                }
            }
        },
        getHighlightedBrands: function() {
            var formURL = "<?php echo site_url('Brand/getHighlightedBrands')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                if(drugData) {
                    $('.product-highlights').html('<h3 class="title">PRODUCT HIGHLIGHTS</h3>' +
                        '<img src="<?php echo base_url()?>BrandImages/'+drugData.ImagePath+'" alt="product" class="img-fluid" style="padding: 79px 0;">' +
                        '                            <div class="product-detail">' +
                        '                                <h4 class="title">PRODUCT</h4>' +
                        '                                <p class="info" style="color: #4C99D3;font-size: 20px;margin-bottom: 70px;"><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData.ID+'">'+drugData.Name+'</a></p>' +
                        '                                <h4 class="title">CONTENT</h4>' +
                        '                                <p class="info">('+drugData.StrengthName+')</p>' +
                        '                                <h4 class="title">INDICATIONS</h4>' +
                        '                                <p class="info">'+drugData.Indication+'</p>' +
                        '                            </div>');
                }
            }
        },
        changeSearchOption: function() {
            $('#searchDrugOption').autocomplete({
                source: drugObject.searchOptionAutoComplete
            });
        },
        getDrugList: function(pageNo) {
            var formURL = "<?php echo site_url('Brand/getAllDrugInformation')?>"+'?PageNo='+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getDrugList', function(drugData){
                var drug_td_text = '';
                for(var i = 0; i < drugData.length; i++) {
                    drug_td_text = '<tr>' +
                        '<td><a href="<?php echo site_url('Brand/showDrugDetail')?>'+'?DrugID='+drugData[i].DrugID+'">'+drugData[i].BrandName+'</a></td>' +
                        '<td><a href="<?php echo site_url('Manufacturer/getManufacturerDetail')?>'+'?ManufacturerID='+drugData[i].ManufacturerID+'">'+drugData[i].ManufacturerName+'</a></td>' +
                        '</tr>';
                    $('tbody.drug-list').append(drug_td_text);
                }
            });
            drugObject.populatePagination(pageNo);
        },
        getAllDrugInfoForAutoComplete: function(option) {
            drugObject.searchOption = option;
            var formURL = "<?php echo site_url('Brand/getAllDrugInfoForAutoComplete')?>"+'?SearchOption='+drugObject.searchOption;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getAllDrugInfoForAutoComplete', function(drugData){
                drugObject.searchOptionAutoComplete = drugData;
            });
        },
        populatePagination: function (pageNo) {
            var per_page_information_number = <?php echo config_item('per_page_information_number');?>;
            var total_page = Math.ceil(drugObject.totalDrug / per_page_information_number);
            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text = '';
            $('ul#drug-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#drug-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="drugObject.getDrugList('+previous_page_no+')>' +
                    '                                        <span>&laquo;</span>' +
                    '                                        <span class="sr-only">Previous</span>' +
                    '                                    </a>' +
                    '                                </li>' +
                    '                                ');
            }
            
            for(var i = start_page_no; ; i++) {
                pagination_li_text = '';
                if (i == pageNo) {
                    pagination_li_text = '<li class="page-item active"><a class="page-link" href="#">'+i+'</a></li>';
                } else {
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="drugObject.getDrugList('+i+')"></a></li>';
                }
                $('ul#drug-pagination').append(pagination_li_text);
                page_counter++;
                if (page_counter == total_pagination || page_counter > total_page) {
                    break;
                }
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#drug-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="drugObject.getDrugList('+next_page_no+')>' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }

        }
    }

    drugObject.totalDrug = <?php echo $TotalDrug;?>;
    drugObject.getDrugList(1);
</script>