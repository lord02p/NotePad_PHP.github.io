var input = document.getElementById('input');
input.addEventListener('change', () => {
    window.find(input.value);
})
var add_note = document.getElementById('add_note_btn');
add_note.addEventListener('click', () => {
    document.querySelector('.data-insert-section').style.display = 'block';
})
document.querySelector('.red').addEventListener('click', () => {
    document.querySelector('.data-insert-section').style.display = 'none';
})