// Dark Mode Toggle Functionality
document.getElementById('toggle-dark-mode').addEventListener('click', function () {
    document.body.classList.toggle('dark-mode');

    // Save the user's preference in localStorage
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.setItem('darkMode', 'disabled');
    }
});

// On page load, apply the dark mode if previously enabled
window.addEventListener('load', function () {
    if (localStorage.getItem('darkMode') === 'enabled') {
        document.body.classList.add('dark-mode');
    }
});

// Handle the form submission for adding an employee
document.getElementById('add-employee-btn').addEventListener('click', function () {
    // Create and show the modal
    const modalHTML = `
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addEmployeeForm">
                            <div class="mb-3">
                                <label for="employeeName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="employeeName" required>
                            </div>
                            <div class="mb-3">
                                <label for="employeeRole" class="form-label">Role</label>
                                <input type="text" class="form-control" id="employeeRole" required>
                            </div>
                            <div class="mb-3">
                                <label for="employeeJoiningDate" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="employeeJoiningDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="employeePerformance" class="form-label">Performance</label>
                                <input type="text" class="form-control" id="employeePerformance" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Employee</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>`;

    // Append the modal to the body
    document.body.insertAdjacentHTML('beforeend', modalHTML);

    // Initialize the modal
    const addEmployeeModal = new bootstrap.Modal(document.getElementById('addEmployeeModal'), {});

    // Show the modal
    addEmployeeModal.show();

    // Handle the form submission
    document.getElementById('addEmployeeForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // Collect form data
        const name = document.getElementById('employeeName').value;
        const role = document.getElementById('employeeRole').value;
        const joiningDate = document.getElementById('employeeJoiningDate').value;
        const performance = document.getElementById('employeePerformance').value;

        // Add the new employee to the table
        const tableBody = document.getElementById('employee-table-body');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${name}</td>
            <td>${role}</td>
            <td>${joiningDate}</td>
            <td>${performance}</td>
        `;
        tableBody.appendChild(newRow);

        // Clear the form
        document.getElementById('addEmployeeForm').reset();

        // Hide the modal
        addEmployeeModal.hide();

        // Remove the modal from the DOM after it's hidden
        addEmployeeModal._element.addEventListener('hidden.bs.modal', function () {
            addEmployeeModal._element.remove();
        });
    });
});
