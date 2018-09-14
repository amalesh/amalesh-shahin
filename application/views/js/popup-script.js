var mimsPopup = {
    showErrorPopup: true,
    showSidePopUp: function (title, text, success) {
        var icon_image = success ? 'icon_success.png' : 'icon_error.png';
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: title,
            // (string | mandatory) the text inside the notification
            text: text,
            // (string | optional) the image to display on the left
            image: '../../application/views/img/'+icon_image,
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '5000',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
    },
    showModalView: function (modalID, title, bodyText, hide_btn_1, hide_btn_2){
        $('#loaderModal').modal('hide');
        $('#loaderModalWithText').modal('hide');
        if (hide_btn_1 === true) {
            $("#"+modalID+" button.btn1").hide();
        } else {
            $("#"+modalID+" button.btn1").show();
        }

        if (hide_btn_2 === true) {
            $("#"+modalID+" button.btn2").hide();
        } else {
            $("#"+modalID+" button.btn2").show();
        }

        if (title != undefined && title != '') $('#'+modalID+" h4.modal-title").html(title);
        if (bodyText != undefined && bodyText != '') $('#'+modalID+" div.error_msg").html(bodyText);
        $('#' + modalID).modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
    },
    showLoaderModalWithText: function(loader_text) {
        $("#loaderModalWithText span.loder_text").html(loader_text);
        $('#loaderModalWithText').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
    },
    showLoaderModal: function(loader_text) {
        if (loader_text) {
            this.showLoaderModalWithText(loader_text);
        } else if ($("#loaderModalWithText").css("display") != "block" && $("#loaderModal").css("display") != "block") {
            $('#loaderModal').modal({
                keyboard: false,
                backdrop: 'static',
                show: true
            });
        }
    }
}