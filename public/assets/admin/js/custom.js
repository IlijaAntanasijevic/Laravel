/*------------------------------------------------------------------
    File Name: custom.js
    Template Name: Pluto - Responsive HTML5 Template
    Created By: html.design
    Envato Profile: https://themeforest.net/user/htmldotdesign
    Website: https://html.design
    Version: 1.0
-------------------------------------------------------------------*/

/*--------------------------------------
	sidebar
--------------------------------------*/

"use strict";



/*--------------------------------------
    scrollbar js
--------------------------------------*/

var ps = new PerfectScrollbar('#sidebar');

/*--------------------------------------
    chart js
--------------------------------------*/

/*$(function () {
  new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
  new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
  new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
  new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
  new Chart(document.getElementById("area_chart").getContext("2d"), getChartJs('area'));
  new Chart(document.getElementById("donut_chart").getContext("2d"), getChartJs('donut'));
});*/

function getChartJs(type) {
  var config = null;

  if (type === 'line') {
    config = {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
          label: "My First dataset",
          data: [68, 55, 75, 86, 47, 52, 36],
          borderColor: 'rgba(33, 150, 243, 1)',
          backgroundColor: 'rgba(33, 150, 243, 0.2)',
          pointBorderColor: 'rgba(33, 150, 243, 1)',
          pointBackgroundColor: 'rgba(255, 255, 255, 1)',
          pointBorderWidth: 1
        }, {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 86, 27, 90],
          borderColor: 'rgba(30, 208, 133, 1)',
          backgroundColor: 'rgba(30, 208, 133, 0.2)',
          pointBorderColor: 'rgba(30, 208, 133, 1)',
          pointBackgroundColor: 'rgba(255, 255, 255, 1)',
          pointBorderWidth: 1
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    }
  }
  else if (type === 'bar') {
    config = {
      type: 'bar',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
          label: "My First dataset",
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: 'rgba(33, 150, 243, 1)'
        }, {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 86, 27, 90],
          backgroundColor: 'rgba(30, 208, 133, 1)'
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    }
  }
  else if (type === 'radar') {
    config = {
      type: 'radar',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
          label: "My First dataset",
          data: [48, 25, 95, 75, 64, 58, 54],
          borderColor: 'rgba(33, 150, 243, 1)',
          backgroundColor: 'rgba(33, 150, 243, 0.2)',
          pointBorderColor: 'rgba(33, 150, 243, 1)',
          pointBackgroundColor: 'rgba(255, 255, 255, 1)',
          pointBorderWidth: 1
        }, {
          label: "My Second dataset",
          data: [82, 54, 25, 65, 47, 21, 95],
          borderColor: 'rgba(30, 208, 133, 1)',
          backgroundColor: 'rgba(30, 208, 133, 0.2)',
          pointBorderColor: 'rgba(30, 208, 133, 1)',
          pointBackgroundColor: 'rgba(255, 255, 255, 1)',
          pointBorderWidth: 1
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    }
  }
  else if (type === 'pie') {
    config = {
      type: 'pie',
      data: {
        datasets: [{
          data: [80, 50, 30, 35, 45],
          backgroundColor: [
            "rgba(33, 150, 243, 1)",
            "rgba(30, 208, 133, 1)",
            "rgba(233, 30, 99, 1)",
            "rgba(103, 58, 183, 1)",
            "rgba(33, 65, 98, 1)"
          ],
        }],
        labels: [
          "blue",
          "green",
          "pink",
          "parple",
          "Default"
        ]
      },
      options: {
        responsive: true,
        legend: false
      }
    }
  }
  return config;
}


