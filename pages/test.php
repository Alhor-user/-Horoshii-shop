<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/custom.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <label>Загрузить один файл:</label>
            <input type="file" id="file" name="file" />
        </div>
        <div class="row">
            <span id="output"></span>
        </div>
    </div>
</body>
</html>

<script>
document.getElementById('file').addEventListener('change', handleFileSelect, false);
</script>