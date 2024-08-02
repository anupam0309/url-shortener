function copyURL(id) {
    const copyText = document.getElementById("shortURL-" + id);
    
    
    navigator.clipboard.writeText(copyText.value).then(() => {
        
        const button = document.querySelector(`button[data-id='${id}']`);
        button.textContent = 'Copied';

        setTimeout(() => {
            button.textContent = 'Copy';
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy text: ', err);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.copy-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            copyURL(id);
        });
    });
});
