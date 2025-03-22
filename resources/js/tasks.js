function confirmDeleteTask(tarea) {
    return confirm(`¿Estás seguro de que quieres borrar ${tarea}?`);
}

function updateTaskStatus(taskId, newStatus) {
    fetch(`/tasks/${taskId}/update-status`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ status: newStatus })
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error al actualizar el estado de la tarea');
            }
        })
        .then(data => {
            console.log('Estado actualizado correctamente:', data);
        })
        .catch(error => {
            console.error('Error al actualizar la tarea:', error);
        });
}


function toggleTask(taskId, currentStatus) {
    const taskRow = document.getElementById(`task-${taskId}`);
    const taskName = taskRow.querySelector('.task-name');
    const taskStatus = taskRow.querySelector('.task-status');
    console.log(taskId, currentStatus);
    console.log(taskRow, taskName, taskStatus)
    if (currentStatus !== 'finalizada') {
        taskName.classList.add('line-through', 'text-gray-500');
        taskStatus.textContent = 'Finalizada';
        fetch(`/tasks/${taskId}/complete`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: 'finalizada' })
        }).then(response => {
            if (!response.ok) {
                console.error('Error al actualizar la tarea');
            } else {
                location.reload(); // Recargar página al completar
            }
        }).catch(error => {
            console.error('Error en la conexión:', error);
        });
    } else {
        taskName.classList.remove('line-through', 'text-gray-500');
        taskStatus.textContent = 'No iniciada';

        fetch(`/tasks/${taskId}/incomplete`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: 'no_iniciada' })
        }).then(response => {
            if (!response.ok) {
                console.error('Error al actualizar la tarea');
            } else {
                location.reload(); // Recargar página al completar
            }
        }).catch(error => {
            console.error('Error en la conexión:', error);
        });
    }
}


// Hacer las funciónes accesible globalmente
window.toggleTask = toggleTask;
window.confirmDeleteTask = confirmDeleteTask;
window.updateTaskStatus = updateTaskStatus;
