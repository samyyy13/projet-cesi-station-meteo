//google.charts.load('current', {'packages': ['corechart']});
//google.charts.setOnLoadCallback(drawChart);

function chart(json) {
    console.log(json);
    /*var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004', 1000, 400],
        ['2005', 1170, 460],
        ['2006', 660, 1120],
        ['2007', 1030, 540]
    ]);
    var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: {position: 'bottom'}
    };
    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    chart.draw(data, options);*/


}

function releves(query) {

    fetch(query, {
        method: "GET",
        Otions: {
            'Access-Control-Allow-Origin': '*'
        },

    })
        .then(response => response.json())
        .then(json => drawChart(json));
}

releves('http://localhost/web/projetCubes2/API/readReleve.php');