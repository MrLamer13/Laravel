document.addEventListener('DOMContentLoaded', function () {
    let elements = document.querySelectorAll('.delete');
    elements.forEach(function (e, i) {
        e.addEventListener('click', function () {
            const id = this.getAttribute('rel');
            const path = this.getAttribute('rev');
            if (confirm(`Подтверждаете ли вы удаление записи с ID = ${id}?`)) {
                sendData(`${path}${id}`).then(() => {
                    location.reload();
                })
            } else {
                alert('Удаление отменено.');
            }
        })
    })
});

async function sendData(url) {
    let response = await fetch(url, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });

    let result = await response.json();
    return result.ok;
}
