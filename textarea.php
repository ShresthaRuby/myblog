<!-- Place inside the <head> of your HTML -->
<head>
<script type="text/javascript" src="tinymce/js/tinymce.min.js"></script>
<!--<script type="text/javascript" src="tinymce/js/plugins/table/plugin.min.js"></script>-->
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
 });
</script>
</head>
<!-- Place this in the body of the page content -->
<body>
<form method="post">
    <textarea></textarea>
</form>
</body>