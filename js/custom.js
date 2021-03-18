function DeleteCategory(category, name) {
    console.log(category);
    console.log(name);
    document.getElementById('deleteategoryform').reset();
    document.getElementById('deleteCategoryCategory').setAttribute('value', category);
    document.getElementById('deleteCategoryName').setAttribute('value', name);
}

function EditCategory(category, name) {
    document.getElementById('editcategoryform').reset();
    document.getElementById('editCategoryCategory').setAttribute('value', category);
    document.getElementById('editCategoryOldCategory').setAttribute('value', category);
    document.getElementById('editCategoryName').setAttribute('value', name);
}

function DeleteItem(id, name) {
    console.log(id);
    console.log(name);
    document.getElementById('deleteitemform').reset();
    document.getElementById('deleteItemID').setAttribute('value', id);
    document.getElementById('deleteItemName').setAttribute('value', name);
}

function EditItem(category, name) {
    document.getElementById('edititemform').reset();
    document.getElementById('editItemCategory').setAttribute('value', category);
    document.getElementById('editItemOldCategory').setAttribute('value', category);
    document.getElementById('editItemName').setAttribute('value', name);
}

function handleFileSelect1(evt) {
    document.getElementById('prev1').setAttribute('src', '');
    var file = evt.target.files; // FileList object
    var f = file[0];
    // Only process image files.
    if (!f.type.match('image.*')) {
        alert("Image only please....");
    }
    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img id="prev1" class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output1').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}

function handleFileSelect2(evt) {
    document.getElementById('prev2').setAttribute('src', '');
    var file = evt.target.files; // FileList object
    var f = file[0];
    // Only process image files.
    if (!f.type.match('image.*')) {
        alert("Image only please....");
    }
    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img id="prev2" class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output2').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}

function handleFileSelect3(evt) {
    document.getElementById('prev3').setAttribute('src', '');
    var file = evt.target.files; // FileList object
    var f = file[0];
    // Only process image files.
    if (!f.type.match('image.*')) {
        alert("Image only please....");
    }
    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img id="prev3" class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output3').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}

function handleFileSelect4(evt) {
    document.getElementById('prev4').setAttribute('src', '');
    var file = evt.target.files; // FileList object
    var f = file[0];
    // Only process image files.
    if (!f.type.match('image.*')) {
        alert("Image only please....");
    }
    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img id="prev4" class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output4').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}