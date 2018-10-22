$(document).ready(function(){
        $("#up-img-touch").click(function(){
        		  $("#doc-modal-1").modal({width:'600px'});
        });
});
$(function() {
    'use strict';
    // 初始化
    var $image = $('#image');
    $image.cropper({
        aspectRatio: '1',
        autoCropArea:0.8,
        preview: '.up-pre-after',
        
    });
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    // 事件代理绑定事件
    $('.docs-buttons').on('click', '[data-method]', function() {
   
        var $this = $(this);
        var data = $this.data();
        var result = $image.cropper(data.method, data.option, data.secondOption);
        switch (data.method) {
            case 'getCroppedCanvas':
            if (result) {
                // 显示 Modal
                $('#cropped-modal').modal().find('.am-modal-bd').html(result);
                $('#download').attr('href', result.toDataURL('image/jpeg'));
            }
            break;
        }
    });
    
    

    // 上传图片
    var $inputImage = $('#inputImage');
    var URL = window.URL || window.webkitURL;
    var blobURL;

    if (URL) {
        $inputImage.change(function () {
            var files = this.files;
            var file;

            if (files && files.length) {
               file = files[0];

               if (/^image\/\w+$/.test(file.type)) {
                    blobURL = URL.createObjectURL(file);
                    $image.one('built.cropper', function () {
                        // Revoke when load complete
                       URL.revokeObjectURL(blobURL);
                    }).cropper('reset').cropper('replace', blobURL);
                    $inputImage.val('');
                } else {
                    window.alert('Please choose an image file.');
                }
            }

            // Amazi UI 上传文件显示代码
            var fileNames = '';
            $.each(this.files, function() {
                fileNames += '<span class="am-badge">' + this.name + '</span> ';
            });
            $('#file-list').html(fileNames);
        });
    } else {
        $inputImage.prop('disabled', true).parent().addClass('disabled');
    }
    
    //绑定上传事件
    $('#up-btn-ok').on('click',function(){
    	var $modal = $('#my-modal-loading');
    	var $modal_alert = $('#my-alert');
    	// var img_src=$image.attr("src");
        var oldface = $('#oldface').attr('src');
        var uploadface = $('#image').attr('src');
    	if(uploadface==""){
    		set_alert_info("没有选择上传的图片");
    		$modal_alert.modal();
    		return false;
    	}
    	
    	$modal.modal();
    	
    	var url=$(this).attr("url");
    	var canvas=$("#image").cropper('getCroppedCanvas');
    	var data=canvas.toDataURL(); //转成base64
        //id
        var myid= $('#user-id').attr('user-id');
        if(oldface != uploadface){
            $.ajax( {  
                    url:url,  
                    dataType:'json',  
                    type: "POST",  
                    data: {"image":data.toString(),"oldface":oldface,"id":myid},  
                    success: function(data){
                        if(data){
                            $modal.modal('close');
                            $('#oldface').attr('src',data.face);
                            $('#image').attr('src',data.face);
                            $('.face').attr('src',data.face);
                            $('#doc-modal-1').removeClass('am-modal-active');
                            $('#doc-modal-1').addClass('am-modal-out');
                            $('#doc-modal-1').css({"display":"none"});
                            $('body').removeClass('am-dimmer-active');
                            $('body').css({"paddingRight":'17px'});
                            $('.am-dimmer').removeClass('am-active');
                            $('.am-dimmer').css({"display":"none"});
                            swal("温馨提示",'头像上传成功',"success");
                        }else{
                            swal("温馨提示","头像上传失败","error");
                        }	
                    },
                    error: function(){
                    	swal("温馨提示","头像上传失败","error");
                    }  
             });  
    	}
    });
    
});

function rotateimgright() {
$("#image").cropper('rotate', 90);
}


function rotateimgleft() {
$("#image").cropper('rotate', -90);
}

function set_alert_info(content){
	$("#alert_content").html(content);
}



 
