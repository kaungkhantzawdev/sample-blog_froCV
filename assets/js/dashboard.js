$('.counter').counterUp({
    delay: 10,
    time: 2000
});

let viewDates = ['May-1','May-2','May-3','May-4','May-5','May-6','May-7','May-8','May-9','May-10'];
let numData = [7,8,4,7,8,9,6,7,8,6];
let secData = [6,7,9,8,6,8,6,8,7,6];

const ov = document.getElementById('ov').getContext('2d');
const ovChart = new Chart(ov, {
    type: 'line',
    data: {
        labels: viewDates,
        datasets: [{
            label: 'Orders & viewers',
            data: numData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            tension: 0
        },
            {
                label: 'Orders & viewers',
                data: secData,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(13,110,253, 1)',
                    'rgb(235,54,232)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                tension: 0
            }]
    },
    options: {
        scales: {
            yAxes: [{
                gridLines : {
                    display: false
                },
                ticks: {
                    display: false
                }
            }],
            xAxes: [{
                gridLines: {
                    display:false
                },
                ticks: {
                    display: true
                }
            }],
        },
        legend: {
            labels : {
                usePointStyle: true
            }
        }
    }
});


let viewRegion = ['ygn','aye','nay','mandalay'];
let region = [100,300,200,500];


const sv = document.getElementById('sv').getContext('2d');
const svChart = new Chart(sv, {
    type: 'pie',
    data: {
    labels: viewRegion,
    datasets: [{
    label: '# of Votes',
    data: region,
    backgroundColor: [
    '#0d6efd',
    '#33d68f',
    '#fd7e14',
    '#f00d5c',
    ],

    borderWidth: 1
}]
},
        options: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    fontColor: '#333',
                    usePointStyle : true
                }
            }
        }
});


