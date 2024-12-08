function showModal(event){
    event.preventDefault();
    document.getElementById('confirmation-modal').style.display = 'block';
    window.confirmationForm = event.target;
}

function closeModal(){
    document.getElementById('confirmation-modal').style.display = 'none';
}

function confirmClearAction(){
    if(window.confirmationForm){
        window.confirmationForm.submit();
    } 
    closeModal();
}