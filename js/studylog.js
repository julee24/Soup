// const buttons = document.querySelectorAll('.date[data-modal-trigger]');

// for(let button of buttons) {
// 	modalEvent(button);
// }

// function modalEvent(button) {
// 	button.addEventListener('click', () => {
// 		const date = button.getAttribute('data-modal-trigger');
// 		// console.log('trigger', trigger)
// 		const modal = document.querySelector(`[data-modal=${date}]`);
// 		// console.log('modal', modal)
// 		const contentWrapper = modal.querySelector('.content-wrapper');
// 		const close = modal.querySelector('.close');

// 		close.addEventListener('click', () => modal.classList.remove('open'));
// 		modal.addEventListener('click', () => modal.classList.remove('open'));
// 		contentWrapper.addEventListener('click', (e) => e.stopPropagation());

// 		modal.classList.toggle('open');
// 	});
// }
