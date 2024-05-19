const modalOrderOnline = document.getElementById('modalOrderOnline')
if (modalOrderOnline) {
  modalOrderOnline.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    const card_body = button.closest('.card-body')
    
    let roomType =card_body.querySelector('.roomType').textContent
    roomType=roomType.trim();
    roomType=roomType.split(" ")[1]
    
   

    const modalTitle = modalOrderOnline.querySelector('.modal-title')
    const roomTypeInput = modalOrderOnline.querySelector('.modal-body #roomType')
    modalTitle.textContent = `Đặt phòng ${roomType}`
    roomTypeInput.value = roomType

    try {
        let roomId=card_body.querySelector('.roomId').textContent
  
    roomId=roomId.trim();
    roomId=roomId.split(" ")[1];
    const roomIdInput = modalOrderOnline.querySelector('.modal-body #roomId')
      roomIdInput.value = roomId
    } catch (error) {
        
    }
      
    
    
    
    
  })
}