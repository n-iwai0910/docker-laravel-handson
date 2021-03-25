import $ from 'jquery';
import 'slick-carousel';
import slick from 'slick-carousel';
import 'slick-carousel/slick/slick.css'; // 追加
import 'slick-carousel/slick/slick-theme.css'; // 追加

$('#image').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image2').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview2").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image3').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview3").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image4').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview4").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image5').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview5").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image6').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview6").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image7').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview7").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image8').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview8").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image9').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview9").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
$('#image10').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview10").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});

$(function() {
    $('.thumb-item').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.thumb-item-nav'
    });
    $('.thumb-item-nav').slick({
        accessibility: true,
        autoplay: false,
        autoplaySpeed: 4000,
        speed: 400,
        arrows: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.thumb-item',
        focusOnSelect: true,
    });
});

var dropZone = document.getElementById('drop-zone');

dropZone.addEventListener('dragover', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#e1e7f0';
}, false);

dropZone.addEventListener('dragleave', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#ffffff';
}, false);

fileInput.addEventListener('change', function () {
    previewFile(this.files[0]);
});

dropZone.addEventListener('drop', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#ffffff'; //背景色を白に戻す
    var files = e.dataTransfer.files; //ドロップしたファイルを取得
    if (files.length > 1) return alert('アップロードできるファイルは1つだけです。');
    fileInput.files = files; //inputのvalueをドラッグしたファイルに置き換える。
    previewFile(files[0]);
}, false);
