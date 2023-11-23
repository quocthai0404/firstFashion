const editButtons = document.querySelectorAll('.edit-user-btn');
editButtons.forEach((button) => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    const userId = button.getAttribute('data-user-id');
    showEditForm(userId);
  });
});

function showEditForm(userId) {
  const editForm = document.getElementById('edit-user-form');
  editForm.classList.remove('hidden-form');
  document.getElementById('user_id').value = userId;
  axios.get(`/get-user/${userId}`)
    .then((response) => {
      
      const user = response.data;
      document.getElementById('fullname').value = user.fullname;
      document.getElementById('email').value = user.email;
      document.getElementById('username').value = user.username;
      
      document.getElementById('user_role').value = user.user_role;
    })
    .catch((error) => {
      console.error(error);
      
    });


}



