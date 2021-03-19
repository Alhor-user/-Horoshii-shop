function DeleteCategory(category, name) {
    console.log(category);
    console.log(name);
    document.getElementById('deleteategoryform').reset();
    document.getElementById('deleteCategoryCategory').setAttribute('value', category);
    document.getElementById('deleteCategoryName').setAttribute('value', name);
}

function EditCategory(category, name, priority) {
    console.log(category);
    console.log(name);
    console.log(priority);
    document.getElementById('editcategoryform').reset();
    document.getElementById('editCategoryCategory').setAttribute('value', category);
    document.getElementById('editCategoryOldCategory').setAttribute('value', category);
    document.getElementById('editCategoryName').setAttribute('value', name);
    document.getElementById('editCategoryPriority').setAttribute('value', priority);
    if(document.getElementById('prev1')!= null) {
        var image_x = document.getElementById('prev1');
        image_x.parentNode.removeChild(image_x);
    };
}

function NewCategory(category, name) {
    document.getElementById('newcategoryform').reset();
    if(document.getElementById('prev2')!= null) {
        var image_x = document.getElementById('prev2');
        image_x.parentNode.removeChild(image_x);
    };
}

function DeleteItem(id, name) {
    console.log(id);
    console.log(name);
    document.getElementById('deleteitemform').reset();
    document.getElementById('deleteItemID').setAttribute('value', id);
    document.getElementById('deleteItemName').setAttribute('value', name);
}

function EditItem(itemName, itemDescription, itemPrice, itemCount, itemCategory, itemTagNew, itemTagStock, itemID, priority) {
    //styleTag.removeAttribute('scope');
    document.getElementById('edititemform').reset();
    document.getElementById('editItemName').setAttribute('value', itemName);
    document.getElementById('editItemDescription').setAttribute('value', itemDescription);
    document.getElementById('editItemPrice').setAttribute('value', itemPrice);
    document.getElementById('editItemCount').setAttribute('value', itemCount);
    document.getElementById('editItemCategory').setAttribute('value', itemCategory);
    document.getElementById('editItemPriority').setAttribute('value', priority);

    if (itemTagNew == 1) document.getElementById('editItemTagNew').setAttribute('checked', 'checked'); else document.getElementById('editItemTagNew').removeAttribute('checked');
    if (itemTagStock == 1) document.getElementById('editItemTagStock').setAttribute('checked', 'checked'); else document.getElementById('editItemTagStock').removeAttribute('checked');
    
    document.getElementById('editItemID').setAttribute('value', itemID);
    
    if(document.getElementById('prev3')!= null) {
        var image_x = document.getElementById('prev3');
        image_x.parentNode.removeChild(image_x);
    };
}

function NewItem(itemCategory) {
    document.getElementById('newitemform').reset();
    document.getElementById('newItemCategory').setAttribute('value', itemCategory);
    if(document.getElementById('prev4')!= null) {
        var image_x = document.getElementById('prev4');
        image_x.parentNode.removeChild(image_x);
    };
}


function handleFileSelect1(evt) {
    console.log('1');
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
            span.innerHTML = ['<img id="prev1" class="thumb uk-margin-small-top" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output1').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}

function handleFileSelect2(evt) {
    console.log('1');
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
            span.innerHTML = ['<img id="prev2" class="thumb uk-margin-small-top" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output2').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}

function handleFileSelect3(evt) {
    console.log('1');
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
            span.innerHTML = ['<img id="prev3" class="thumb uk-margin-small-top" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output3').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}

function handleFileSelect4(evt) {
    console.log('1');
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
            span.innerHTML = ['<img id="prev4" class="thumb uk-margin-small-top" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output4').insertBefore(span, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}