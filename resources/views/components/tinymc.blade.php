@props(['id'])


<script>
    tinymce.init({
        selector: "#{{$id}}",
        height: 400,
        language: 'ar',
        directionality: 'rtl',
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
    });
</script>