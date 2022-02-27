// データのセット
finders.forEach(finder => {
    gender.data[finder.gender]++;
    handicap.data[finder.handicap]++;
    employment_pattern.data[finder.employment_pattern]++;
    if (!!finder.skills) {
        if (/java\b/.test(finder.skills.toLowerCase())) {
            skill.data[0]++;
        }
        if (/php\b/.test(finder.skills.toLowerCase())) {
            skill.data[1]++;
        }
        if (/javascript\b/.test(finder.skills.toLowerCase())) {
            skill.data[2]++;
        }
        if (/html\b/.test(finder.skills.toLowerCase())) {
            skill.data[3]++;
        }
        if (/python\b/.test(finder.skills.toLowerCase())) {
            skill.data[4]++;
        }
    }
    if (finder.age < 25) {
        age.data[0]++;
    } else if (finder.age < 30) {
        age.data[1]++;
    } else if (finder.age < 35) {
        age.data[2]++;
    } else if (finder.age < 40) {
        age.data[3]++;
    } else if (finder.age < 45) {
        age.data[4]++;
    } else if (finder.age < 50) {
        age.data[5]++;
    } else if (finder.age < 55) {
        age.data[6]++;
    } else {
        age.data[7]++;
    }
    if (/エンジニア/.test(finder.occupation) ||
        /プログラマ/.test(finder.occupation) ||
        /コーダ/.test(finder.occupation) ||
        /デザイナ/.test(finder.occupation)
    ) {
        genres.data[0]++;
    } else {
        genres.data[1]++;
    }
});

// 「不明」を各データの末尾へ移動
gender.data.push(gender.data.shift());
gender.labels.push(gender.labels.shift());
handicap.data.push(handicap.data.shift());
handicap.labels.push(handicap.labels.shift());
employment_pattern.data.push(employment_pattern.data.shift());
employment_pattern.labels.push(employment_pattern.labels.shift());

// ツールチップを常に表示するための処理
Chart.pluginService.register({
    beforeRender: function (chart) {
        if (chart.config.options.showAllTooltips) {
            // create an array of tooltips
            // we can't use the chart tooltip because there is only one tooltip per chart
            chart.pluginTooltips = [];
            chart.config.data.datasets.forEach(function (dataset, i) {
                chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                    chart.pluginTooltips.push(new Chart.Tooltip({
                        _chart: chart.chart,
                        _chartInstance: chart,
                        _data: chart.data,
                        _options: chart.options.tooltips,
                        _active: [sector]
                    }, chart));
                });
            });

            // turn off normal tooltips
            chart.options.tooltips.enabled = false;
        }
    },
    afterDraw: function (chart, easing) {
        if (chart.config.options.showAllTooltips) {
            // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
            if (!chart.allTooltipsOnce) {
                if (easing !== 1)
                    return;
                chart.allTooltipsOnce = true;
            }

            // turn on tooltips
            chart.options.tooltips.enabled = true;
            Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                if (tooltip._data.datasets[tooltip._active[0]._datasetIndex].data[tooltip._active[0]._index] == 0) {
                    // 値が0ならツールチップ非表示
                    return;
                }
                tooltip.initialize();
                tooltip.update();
                // we don't actually need this since we are not animating tooltips
                tooltip.pivot();
                tooltip.transition(easing).draw();
            });
            chart.options.tooltips.enabled = false;
        }
    }
})

// 性別グラフ
new Chart(document.getElementById("genderChart"), {
    type: 'pie',
    data: {
        datasets: [{
            data: gender.data,
        }],
        labels: gender.labels,
    },
    options: {
        showAllTooltips: true,
        tooltips: {
            backgroundColor: 'rgba(0,0,0,0)',
        },
    }
});

// 障害グラフ
new Chart(document.getElementById("handicapChart"), {
    type: 'pie',
    data: {
        datasets: [{
            data: handicap.data,
        }],
        labels: handicap.labels,
    },
    options: {
        showAllTooltips: true,
        tooltips: {
            backgroundColor: 'rgba(0,0,0,0)',
        },
    }
});

// 雇用形態グラフ
new Chart(document.getElementById("employment_patternChart"), {
    type: 'horizontalBar',
    data: {
        datasets: [{
            data: employment_pattern.data,
        }],
        labels: employment_pattern.labels,
    },
    options: {
        legend: {
            display: false,
        },
        scales: {
            xAxes: [{
                ticks: {
                    suggestedMin: 0,
                }
            }]
        }
    }
});

// スキルグラフ
new Chart(document.getElementById("skillChart"), {
    type: 'horizontalBar',
    data: {
        datasets: [{
            data: skill.data,
        }],
        labels: skill.labels,
    },
    options: {
        legend: {
            display: false,
        },
        scales: {
            xAxes: [{
                ticks: {
                    suggestedMin: 0,
                }
            }]
        }
    }
});

// 年齢グラフ
new Chart(document.getElementById("ageChart"), {
    type: 'bar',
    data: {
        datasets: [{
            data: age.data,
        }],
        labels: age.labels,
    },
    options: {
        legend: {
            display: false,
        },
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 0,
                }
            }]
        }
    }
});

// 分野グラフ
new Chart(document.getElementById("genresChart"), {
    type: 'pie',
    data: {
        datasets: [{
            data: genres.data,
        }],
        labels: genres.labels,
    },
    options: {
        showAllTooltips: true,
        tooltips: {
            backgroundColor: 'rgba(0,0,0,0)',
        },
    }
});
