var isEditMode = false;

addTagBtn = document.getElementById('addtag-btn');
saveBtn = document.getElementById('save');
$('#addTagForm').hide();

addTagBtn.addEventListener('click', function () {
    $('#list').hide();
    $('#addTagForm').show();
    isEditMode = false;
});

saveBtn.addEventListener('click', function () {
    $('#addTagForm').hide();
    $('#list').show();

    if (isEditMode) {
        let tagId = $(this).data('tag-id');
        let updatedTag = $('#title').val();
        updateTag(tagId, updatedTag);
        getTags();
    } else {
        addTag();
        getTags();

    }
});

$(document).on('click', '#edit-tag', function (e) {
    e.preventDefault();
    let tagId = $(this).data('tag-id');
    $('#addTagForm').hide();
    $('#list').hide();
    $('#addTagForm').show();

    isEditMode = true;
    saveBtn.dataset.tagId  =tagId ;
});


////////////////////////////////      Add Tag
function addTag() {
    var tag = $("#title").val();

    $.ajax({
        type: "POST",
        url: "index.php?page=tagform",
        data: { tag: tag, action: 'add' },
        success: function (data) {
            if(data=== "Tag added successfully"){
                alert(data);
                getTags();
            } else if(data=== "Failed to add Tag"){
                alert(data);
            } else if(data === "Please enter a valid Tag title"){
                alert(data);
            }else if(data === "Error in POST request"){
                alert (data);
            }
        },

    });
}

////////////////////// Update Tag
function updateTag(tagId, tag) {
    $.ajax({
        type: "POST",
        url: "index.php?page=tagform",
        data: { tagId: tagId, tag: tag, action: 'update' },
        success: function (data) {
            console.log(data)
            if (data === "Tag updated successfully") {
                alert(data);
                getTags();
            } else if(data=== "Failed to update Tag . Please check your data and try again."){
                alert(data);
            }
        },
        error: function () {
            alert("An error occurred during the Ajax request. Please try again.");
        }
    });
}

////////////////////////////////// Delete Tag
//delete
$(document).on('click', '.delete_tag', function () {
    let TagId = $(this).data('tag-id');
    console.log(TagId)

    $.ajax({
        type: "POST",
        url: "index.php?page=tags",
        data: { TagId: TagId, action: 'delete' },
        success: function (data) {
            console.log(data)
            if (data === "success") {
                alert("Tag has been deleted successfully!");
                getTags();
            } else {
                alert("Failed to delete Tag . Please try again.");
            }
        },
        error: function () {
            alert("An error occurred during the Ajax request. Please try again.");
        }
    });
});


