var FivePhaseNormalManager = {

    initopenFileBrowserEventListioner: function() {
        $("#load_banner_details").on('click', '.open_file_browse', function() {
            $("#load_banner_details").find("#" + $(this).data('target')).modal('show');
        });
    },
    initBannerFileUploadEventListioner: function() {

        $(".banner_file_upload").on('file-change', function() {
            //Get count of selected files
            var countFiles = $(this)[0].files.length;
            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var targetContainer = $(this).data('target');
            var image_holder = $("#load_banner_details").find('#' + targetContainer);
            image_holder.find('img').each(function() {
                $(this).remove();
            });
            image_holder.find('.file_browse_hint').addClass('hide')
            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof(FileReader) != "undefined") {
                    //loop for each file selected for uploaded.
                    for (var i = 0; i < countFiles; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "banner-thumb-image",
                                "style": "max-height:100%;width:100%;"
                            }).appendTo(image_holder);
                        }
                        image_holder.show();
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    image_holder.find('.file_browse_hint').removeClass('hide')
                    alert("This browser does not support FileReader.");
                }
            } else {
                image_holder.find('.file_browse_hint').removeClass('hide')
                alert("Pls select only images");
            }
        });
    },
    saveData: function(targetModal) {
        var container = $("#load_banner_details").find('#' + targetModal);
        var validationFail = false;
        container.find("input, select, textarea").each(function() {
            var inputContainer = $(this).closest('.input_section');
            console.log(inputContainer.html());
            var isRequired = $(this).data('required') ? true : false;
            if ($(this).val() == '' && isRequired) {
                inputContainer.append("<span class='required_field_missing text-danger'>Please File Mandatory Values</span>");
                validationFail = true;
            } else {
                inputContainer.find('.required_field_missing').remove();
            }
        });

        if (!validationFail) {
            container.find(".banner_file_upload").each(function() {
                if ($(this).val() != '') {
                    $(this).trigger('file-change');
                }
            });
            container.modal('hide');
        }

        return false;

    },
    closeModal: function(targetModal) {
        var container = $("#load_banner_details").find('#' + targetModal);
        container.modal('hide');
    },
    init: function() {
        this.initBannerFileUploadEventListioner();
        this.initopenFileBrowserEventListioner();
    }
};

FivePhaseNormalManager.init();