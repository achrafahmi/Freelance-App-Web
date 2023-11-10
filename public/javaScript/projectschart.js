const days = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'];
const projectCounts = [5, 8, 3, 10, 6];

// Get the canvas element
const ctx = document.getElementById('projectChart').getContext('2d');

// Create the chart
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: days,
    datasets: [{
      label: 'Projects Created',
      data: projectCounts,
      backgroundColor: 'rgba(75, 192, 192, 0.6)', // Customize the bar color
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});