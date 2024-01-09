var isEditMode = false;

addCategoryBtn = document.getElementById('addcategory-btn');
saveBtn = document.getElementById('save');
$('#addCategoryForm').hide();

addCategoryBtn.addEventListener('click', function () {
    $('#list').hide();
    $('#addCategoryForm').show();
    isEditMode = false;
});

saveBtn.addEventListener('click', function () {
    $('#addCategoryForm').hide();
    $('#list').show();

    if (isEditMode) {
        let categoryId = $(this).data('category-id');
        let updatedCategory = $('#title').val();
        updateCategory(categoryId, updatedCategory);
        getCategories();
    } else {
        addCategory();
        getCategories();
    }
});

$(document).on('click', '#edit-category', function (e) {
    e.preventDefault();
    let categoryId = $(this).data('category-id');
    $('#addCategoryForm').hide();
    $('#list').hide();
    $('#addCategoryForm').show();

    isEditMode = true; // Set flag to true when in edit mode
    saveBtn.dataset.categoryId = categoryId; // Store category ID in save button's data attribute
});


////////////////////////////////      Add Category
function addCategory() {
    var category = $("#title").val();

    $.ajax({
        type: "POST",
        url: "index.php?page=categoryform",
        data: { category: category, action: 'add' },
        success: function (data) {
            if(data=== "Category added successfully"){
                alert(data);
                getCategories();
            } else if(data=== "Failed to add Category"){
                alert(data);
            } else if(data === "Please enter a valid Category title"){
                alert(data);
            }else if(data === "Error in POST request"){
                alert (data);
            }
        },

    });
}



/////////////////////////////
// $(document).on('click', '#edit-category', function (e) {
//     e.preventDefault();
//     let categoryId = $(this).data('category-id');
//     // let category = $(this).data('category');
//     // console.log(category)
//
//     $('#addCategoryForm').hide();
//     $('#list').hide();
//     $('#addCategoryForm').show();
//
//     saveBtn= document.getElementById('save');
//     saveBtn.addEventListener('click', function () {
//         let updatedCategory = $('#title').val();
//
//         $('#addCategoryForm').hide();
//         $('#list').show();
//         updateCategory(categoryId, updatedCategory);
//     });
// });

////////////////////// Update Category
function updateCategory(categoryId, category) {
    $.ajax({
        type: "POST",
        url: "index.php?page=categoryform",
        data: { categoryId: categoryId, category: category, action: 'update' },
        success: function (data) {
            console.log(data)
            if (data === "Category updated successfully") {
                alert(data);
                getCategories();
            } else if(data=== "Failed to update category. Please check your data and try again."){
                alert(data);
            }
        },
        error: function () {
            alert("An error occurred during the Ajax request. Please try again.");
        }
    });
}

////////////////////////////////// Delete Category
//delete
$(document).on('click', '.delete_category', function () {
    let categoryId = $(this).data('category-id');
    // console.log(categoryId)
    $.ajax({
        type: "POST",
        url: "index.php?page=categories",
        data: { categoryId: categoryId, action: 'delete' },
        success: function (data) {
            console.log(data)
            if (data === "success") {
                alert("Category has been deleted successfully!");
                getCategories();
            } else {
                alert("Failed to delete category. Please try again.");
            }
        },
        error: function () {
            alert("An error occurred during the Ajax request. Please try again.");
        }
    });
});


