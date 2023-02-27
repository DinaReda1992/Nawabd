const openDeleteModalBtns = document.querySelectorAll('.open-delete-modal');
const deleteBlog = document.getElementById('deleteBlog');
const deleteForm = document.getElementById('deleteForm');
const blogTitleWrapper = document.getElementById('blogTitle');
const blogIdWrapper = document.getElementById('blogId');

var deleteBlogModal = deleteBlog? new bootstrap.Modal(document.getElementById('deleteBlog')) : ''
openDeleteModalBtns?.forEach((btn) => {
    btn.addEventListener('click', function(e){
        const blogId = this.dataset.id;
        const blogTitle = this.dataset.title;
        const url = this.dataset.url;
        blogTitleWrapper.innerText = blogTitle;
        blogIdWrapper.value = blogId;
        deleteForm.action = url;
        deleteBlogModal.show();
    })
})