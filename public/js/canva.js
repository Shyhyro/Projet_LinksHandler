
const ctx = document.getElementById('myChart').getContext('2d');

$liens = [];
$click = [];
$totalClick = 0;
$totalLinks = 0;

let xhr = new XMLHttpRequest();
xhr.responseType = "json";
xhr.open("GET", "/api/links/index.php");
xhr.onload = function () {

    let links = xhr.response;
    for (let link of links) {
        $liens.push(link.title);
        $click.push(link.click);
    }
    table($liens, $click);
}
xhr.send();

function table($liens, $click){
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: $liens,
            datasets: [{
                label: 'nombre d\'utilisation du lien',
                data: $click,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
}