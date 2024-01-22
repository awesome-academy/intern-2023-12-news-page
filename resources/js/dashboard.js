import $ from 'jquery';
import { Chart } from 'chart.js/auto';
import moment from 'moment';

const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
    counter.innerText = '0';

    const updateCounter = () => {
        const target = +counter.getAttribute('data-target');

        const current = +counter.innerText;

        const increment = target / 100;

        if (current < target) {
            counter.innerText = `${Math.ceil(current + increment)}`;
            setTimeout(updateCounter, 20);
        } else {
            counter.innerText = target;
        }
    }

    updateCounter();
});

$(document).ready(function () {
    $('#time').change(function () {
        $('#selectDateQuery').submit();
    });

    const ctx = $("#pie-canvas");
    let $dataChart = JSON.parse(ctx.attr('data-views'));
    const $labelChart = ctx.attr('data-info');
    const data = {
        labels: $dataChart.map(item => moment(item.created_at).format('DD/MM/YYYY')),
        datasets: [{
            label: $labelChart,
            data: $dataChart.map(item => item.total),
            backgroundColor: 'rgb(54, 162, 235)',
            hoverOffset: 4,
            pointRadius: 6
        }]
    };

    new Chart(ctx, {
        type: 'line',
        data: data,
    });
});
