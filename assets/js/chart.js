

function initializeChart(jsonData) {
    // Chart options and data
    var options = {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'Number',
            data: [jsonData.wikis, jsonData.categories, jsonData.tags]
        }],
        xaxis: {
            categories: ['Wikis', 'Categories', 'Tags']
        }
    };

    // Initialize the chart
    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
}

