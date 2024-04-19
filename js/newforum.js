

function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function saveText() {
    const name = document.getElementById('nameInput').value;
    const text = document.getElementById('textInputModal').value;
    const postField = document.getElementById('postField');
    const post_list = document.getElementById('post_list');

    const postlist = document.createElement('div');
    postlist.innerHTML= `<div class="topics">
    <img src="../img/post.svg" alt="Button Image">
    <div class="information">
        <h5>${name}</h2>
    </div>
</div>`;

    const post = document.createElement('div');
    post.innerHTML = `<div class="view-post">
    <h3>${name}</h3>
    <p>${text}</p>
</div>
    `;
    
    postField.appendChild(post);
    post_list.appendChild(postlist);
    closeModal();
    nameInput.value = '';
    textInputModal.value = '';
}