// script.js

document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll('.employee-checkbox');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                const EmployeeID = this.getAttribute('data-id');
                // Fetch and display graph and evaluation for the selected employee
                fetchEmployeeData(EmployeeID);
            } else {
                // Clear graph and evaluation when checkbox is unchecked
                clearGraphAndEvaluation();
            }
        });
    });

    function fetchEmployeeData(EmployeeID) {
        $.ajax({
            type: 'POST',
            url: 'get_employee_data.php',
            data: { id: EmployeeID },
            success: function(response) {
                const data = JSON.parse(response);
                displayGraph(data);
                displayEvaluation(data);
            }
        });
    }

    function displayGraph(data) {
        const graphElement = document.getElementById('graph');

        const options = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'KPI Scores',
                data: [data.wellbeing_score, data.performance_score, data.motivation_score, data.engagement_level_score]
            }],
            xaxis: {
                categories: ['Wellbeing', 'Performance', 'Motivation', 'Engagement Level']
            }
        };

        const chart = new ApexCharts(graphElement, options);
        chart.render();
    }

    function displayEvaluation(data) {
        const evaluationElement = document.getElementById('evaluation');
        evaluationElement.innerHTML = `<p>${data.name}'s Evaluation:</p>
                                      <p>Wellbeing Score: ${data.wellbeing_score}</p>
                                      <p>Performance Score: ${data.performance_score}</p>
                                      <p>Motivation Score: ${data.motivation_score}</p>
                                      <p>Engagement Level Score: ${data.engagement_level_score}</p>`;
    }

    function clearGraphAndEvaluation() {
        document.getElementById('graph').innerHTML = '';
        document.getElementById('evaluation').innerHTML = '';
    }

    // Add the addKpiScores function here...
    function addKpiScores() {
        const form = document.getElementById('kpiForm');
        const employeeId = form.elements['employeeId'].value;
        const wellbeingScore = form.elements['wellbeing'].value;
        const performanceScore = form.elements['performance'].value;
        const motivationScore = form.elements['motivation'].value;
        const engagementScore = form.elements['engagement'].value;

        $.ajax({
            type: 'POST',
            url: 'add_kpi_scores.php',
            data: {
                employeeId: employeeId,
                wellbeingScore: wellbeingScore,
                performanceScore: performanceScore,
                motivationScore: motivationScore,
                engagementScore: engagementScore
            },
            success: function(response) {
                // Fetch the updated employee data after adding KPI scores
                fetchEmployeeData(employeeId);

                // Handle the response, e.g., show a success message
                alert('KPI scores added successfully!');
            },
            error: function() {
                // Handle errors, e.g., show an error message
                alert('Error adding KPI scores!');
            }
        });
    }
});
