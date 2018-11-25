var mimsServerAPI = {
    showErrorPopup: true,
    timeOutInterval: 1200000,
    getServerData: function (actionType, serverURL, dataType, methodName, callback) {
        console.log('Ajax URL: '+serverURL);
        var ajaxTime= new Date().getTime();
        var returnValue = false;
        $.ajax({
            cache: false,
            type: actionType,
            url: serverURL,
            dataType: dataType === '' ? 'text' : dataType,
            success: function(data, textStatus, jqXHR) {
                returnValue = data.response;
                console.log('Ajax call return success.');
                console.dir(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                // mimsCommonMethods.enableOtherMethods(methodName);
                mimsPopup.showSidePopUp('Error!!!',mimsErrorMessages.general_error_msg, false);
                console.log('Ajax call return error.');
            },
            complete: function(jqXHR, textStatus){
                $("#loaderModal").modal('hide');

                if (textStatus == 'timeout') {
                    var errorMsg = navigator.onLine ? mimsErrorMessages.general_error_msg : mimsErrorMessages.internet_connection_error_msg;
                    mimsPopup.showSidePopUp('Error!!!',errorMsg, false);
                }

                // mimsCommonMethods.enableOtherMethods(methodName);

                var totalTime = new Date().getTime() - ajaxTime;
                if (mimsGlobals.loggingEnable) console.log("Server Response Time: " + parseInt(totalTime / 1000) + " seconds");
                console.log('Ajax call completed.');
            },
            timeout: this.timeOutInterval
        }).done(function(){
            mimsServerAPI.showErrorPopup = true;
            console.log('Ajax call done.');
            console.dir(returnValue);
            callback(returnValue);
        });
    },
    postDataToServer: function (serverURL, postData, dataType, methodName, callback){
        if (mimsGlobals.loggingEnable) console.log(serverURL);
        var ajaxTime = new Date().getTime();
        var returnValue = false;
        $.ajax({
            cache: false,
            type: 'POST',
            url: serverURL,
            data : postData,
            dataType: dataType === '' ? 'text' : dataType,
            beforeSend: function(){

            },
            complete: function(jqXHR, textStatus){
                if ($("#loaderModal").css("display") == "block") $("#loaderModal").modal('hide');
                if (textStatus == 'timeout') {
                    var errorMsg = navigator.onLine ? mimsErrorMessages.general_error_msg : mimsErrorMessages.internet_connection_error_msg;
                    mimsPopup.showSidePopUp('Error!!!',errorMsg, false);
                }

                var totalTime = new Date().getTime() - ajaxTime;
                if (mimsGlobals.loggingEnable) console.log("Server Response Time: " + parseInt(totalTime / 1000) + " seconds");
                console.log('Ajax call completed.');
            },
            success: function(data, textStatus, jqXHR) {
                returnValue = data.response;
                console.log('Ajax call return success.');
                console.dir(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                // mimsCommonMethods.enableOtherMethods(methodName);
                mimsPopup.showSidePopUp('Error!!!',mimsErrorMessages.general_error_msg, false);
                console.log('Ajax call return error.');
            },
            timeout: this.timeOutInterval
        }).done(function(){
            var totalTime = new Date().getTime() - ajaxTime;
            if (mimsGlobals.loggingEnable) console.log("Server Response Time: " + parseInt(totalTime / 1000) + " seconds");
            mimsServerAPI.showErrorPopup = true;
            console.log('Ajax call done.');
            console.dir(returnValue);
            callback(returnValue);
        });
    },
    getServerReportData: function (actionType, serverURL, dataType, methodName, callback) {
        if (mimsGlobals.loggingEnable) console.log(serverURL);
        var ajaxTime= new Date().getTime();
        var returnValue = false;
        $.ajax({
            cache: false,
            type: actionType,
            url: serverURL,
            dataType: dataType === '' ? 'text' : dataType,
            success: function(data, textStatus, jqXHR) {
                returnValue = data.response;
            },
            error: function(jqXHR, textStatus, errorThrown){
                mimsPopup.showSidePopUp('Error!!!',mimsErrorMessages.general_error_msg, false);
            },
            complete: function(jqXHR, textStatus){
                if (textStatus == 'timeout') {
                    var errorMsg = navigator.onLine ? mimsErrorMessages.general_error_msg : mimsErrorMessages.internet_connection_error_msg;
                    mimsPopup.showSidePopUp('Error!!!',errorMsg, false);
                } else if (textStatus == 'abort') {
                    if (this.showErrorPopup) mimsPopup.showSidePopUp('Error!!!',mimsErrorMessages.general_error_msg, false);
                }

                // mimsCommonMethods.enableOtherMethods(methodName);
            },
            timeout: this.timeOutInterval
        }).done(function(){
            var totalTime = new Date().getTime()-ajaxTime;
            if (mimsGlobals.loggingEnable) console.log("Server Response Time: " + parseInt(totalTime / 1000) + " seconds");
            this.showErrorPopup = true;
            callback(returnValue);
        });
    }
}