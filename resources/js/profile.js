const dropArea = document.querySelector('.drop-area');
const fileInput = document.querySelector('#file-input');
const previewContainer = document.querySelector('.preview-container');
const previewImage = document.querySelector('.preview-image');
const closeButton = document.querySelector('.close-button');
const fileName = document.querySelector('.file-name');

dropArea.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropArea.classList.add('active');
});

dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('active');
});

dropArea.addEventListener('drop', (event) => {
    event.preventDefault();
    const file = event.dataTransfer.files[0];
    showPreview(file);
    showFileName(file);
});

fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    showPreview(file);
    showFileName(file);
});

// Add event listener to the close button to handle when it is clicked
closeButton.addEventListener('click', (event) => {
    event.preventDefault();
    fileInput.value = '';
    previewImage.style.backgroundImage = '';
    fileName.textContent = '';
    previewImage.classList.add('hidden');
    previewContainer.classList.add('hidden');
    previewImage.classList.remove('flex');
});

function showPreview(file)
{
    if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            previewImage.style.backgroundImage = `url(${reader.result})`;
            previewImage.classList.remove('hidden');
            dropArea.classList.remove('active');
            previewContainer.classList.remove('hidden');
            previewContainer.classList.add('flex');
        };
    }
}

function showFileName(file)
{
    fileName.textContent = file.name;
    fileName.style.display = 'block';
}
