require('./bootstrap');

const status=document.querySelector('.modal-submit');

const taskModal=document.querySelector('.task-modal-error');

const formUpdate=document.querySelector('.form-update');


status.addEventListener('click',(event)=>{
 if(formUpdate.value==''){
    event.preventDefault();
    taskModal.innerHTML='The task field is required.';
 }
})




