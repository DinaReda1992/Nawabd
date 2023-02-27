const openDeleteModalBtn = document.querySelectorAll('.open-delete-modal');
const deleteCategory = document.getElementById('deleteCategory');
const deleteModalForm = document.getElementById('deleteForm');
const CategoryNameWrapper = document.getElementById('catName');
const CategoryIdWrapper = document.getElementById('catId');

var deleteCategoryModal = deleteModalForm? new bootstrap.Modal(document.getElementById('deleteCategory')) : ''
openDeleteModalBtn?.forEach((btn) => {
    btn.addEventListener('click', function(e){
        const catId = this.dataset.id;
        const catName = this.dataset.category_name;
        const url = this.dataset.url;
        CategoryNameWrapper.innerText = catName;
        CategoryIdWrapper.value = catId;
        deleteModalForm.action = url;
        deleteCategoryModal.show();
    })
})