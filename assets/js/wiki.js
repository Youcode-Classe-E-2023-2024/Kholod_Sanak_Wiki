var isEditMode = false;

addWikiBtn = document.getElementById('addwiki-btn');
saveBtn = document.getElementById('save');
$('#addWikiForm').hide();

addWikiBtn.addEventListener('click', function () {
    $('#list').hide();
    $('#addWikiForm').show();
    isEditMode = false;
});

saveBtn.addEventListener('click', function () {
    $('#addWikiForm').hide();
    $('#list').show();

    if (isEditMode) {
        let wikiId = $(this).data('wiki-id');
        var updatedWiki = $("#title").val();
        var updatedCategory =  $("#category").val();
        var updatedTags = $("#tags").val();
        var updatedDescription =  $("#description").val();
        updateWiki(wikiId, updatedWiki ,updatedCategory, updatedTags, updatedDescription );
        getWikis();
    } else {
        addWiki();
        getWikis();

    }
});


////////////////////////////////      Add Wiki
function addWiki() {
    var Wiki = $("#title").val();
    var category =  $("#category").val();
    var tags = $("#tags").val();
    var description =  $("#description").val();
    //console.log (Wiki,category,tags, description)
    $.ajax({
        type: "POST",
        url: "index.php?page=wikiform",
        data: { Wiki: Wiki,category: category, tags:tags,description:description, action: 'add' },
        success: function (data) {
            //console.log(data);
            if(data=== "Wiki added successfully"){
                alert(data);
                getWikis();
            } else if(data=== "Failed to add Wiki"){
                alert(data);
            } else if(data === "Please enter a Wiki title and description"){
                alert(data);
            }else if(data === "Error in POST request"){
                alert (data);
            }
        },

    });
}

////////////////////// Archive Wiki
$(document).on('click', '#archive-wiki', function () {
    //console.log("clicked");
    let wikiId = $(this).data('wiki-id');

    function archiveWiki(wikiId) {
        $.ajax({
        type: "POST",
        url: "index.php?page=wikis",
        data: { wikiId: wikiId, action: 'archive' },
        success: function (data) {
            console.log(data)
            if (data === "sucess") {
                alert(data);
                getWikis();
            } else if(data=== "Failed to update Wiki . Please check your data and try again."){
                alert(data);
            }
        },
        error: function () {
            alert("An error occurred during the Ajax request. Please try again.");
        }
    });
}
    archiveWiki(wikiId)

});


////////////////////////////////// Delete Wiki
//delete
$(document).on('click', '.delete-wiki', function () {
    //console.log("clicked");
    let wikiId = $(this).data('wiki-id');
    //console.log(wikiId)

    $.ajax({
        type: "POST",
        url: "index.php?page=wikis",
        data: { wikiId: wikiId, action: 'delete' },
        success: function (data) {
            console.log(data)
            if (data === "success") {
                alert("Wiki has been deleted successfully!");
                getWikis();
            } else {
                alert("Failed to delete Wiki . Please try again.");
            }
        },
        error: function () {
            alert("An error occurred during the Ajax request. Please try again.");
        }
    });
});



//////////////////////////////////  Update
$(document).on('click', '#update-wiki', function (e) {
    e.preventDefault();
    let wikiId = $(this).data('wiki-id');
    $('#addWikiForm').hide();
    $('#list').hide();
    $('#addWikiForm').show();

    isEditMode = true;
    saveBtn.dataset.wikiId  =wikiId;
});



///////////////////////////////     Update Wiki
function updateWiki(wikiId, updatedWiki ,updatedCategory, updatedTags, updatedDescription ) {
    $.ajax({
        type: "POST",
        url: "index.php?page=wikiform",
        data: { wikiId: wikiId, updatedWiki: updatedWiki, updatedCategory: updatedCategory,updatedTags: updatedTags, updatedDescription: updatedDescription , action: 'update' },
        success: function (data) {
            console.log(data)
            if (data === "Wiki updated successfully") {
                alert(data);
                getWikis();
            } else if(data=== "Failed to update Wiki . Please check your data and try again."){
                alert(data);
            }
        },
        error: function () {
            alert("An error occurred during the Ajax request. Please try again.");
        }
    });
}

