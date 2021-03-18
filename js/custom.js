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

function handleFileSelect(evt) {
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
            span.innerHTML = ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}
document.getElementById('file').addEventListener('change', handleFileSelect, false);