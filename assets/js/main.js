"use strict"

const tableRowsElement = document.querySelectorAll('table tbody tr')
tableRowsElement.forEach(tableRow => {
    tableRow.addEventListener('click', (event) => {
        const offCanvas = new bootstrap.Offcanvas('#taskActions')
        const taskTable = event.target.closest('table tbody tr')

        const taskInfo = {}
        taskInfo.id = parseInt(taskTable.firstElementChild.textContent)
        taskInfo.description = taskTable.firstElementChild.nextElementSibling.textContent

        taskInfo.completed = taskTable.lastElementChild.textContent.trim() == 'True'

        sessionStorage.setItem('taskInfo', JSON.stringify(taskInfo))

        document.querySelector('#taskId').value = taskInfo.id
        document.querySelector('#taskDescription').value = taskInfo.description
        document.querySelector('#taskCompleted').checked = taskInfo.completed

        offCanvas.show()
    })
})

const deleteButton = document.querySelector('#deleteButton')
deleteButton.addEventListener('click', (event) => {
    const confirmDeleteModal = new bootstrap.Modal(document.querySelector('#confirmDeleteModal'), { keyboard: true })
    const taskInfo = JSON.parse(sessionStorage.getItem('taskInfo'))
    document.querySelector('#id').value = taskInfo.id
    document.querySelector('#task').textContent = taskInfo.description
    confirmDeleteModal.show()
})
