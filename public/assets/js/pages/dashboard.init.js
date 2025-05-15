/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Dashboard Init Js File
*/

// get colors array from the string
function getChartColorsArray(chartId) {
    if (document.getElementById(chartId) !== null) {
        var colors = document.getElementById(chartId).getAttribute("data-colors");
        if (colors) {
            colors = JSON.parse(colors);
            return colors.map(function (value) {
                var newValue = value.replace(" ", "");
                if (newValue.indexOf(",") === -1) {
                    var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                    if (color) return color;
                    else return newValue;;
                } else {
                    var val = value.split(',');
                    if (val.length == 2) {
                        var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                        rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                        return rgbaColor;
                    } else {
                        return newValue;
                    }
                }
            });
        }
    }
}

// Event listeners for 'Yes' and 'No' buttons in the scholarship modal
document.getElementById('scholarshipYes').addEventListener('click', function () {
    markModalsAsCompleted();
    $('#scholorshipModal').modal('hide'); // Hide the modal after selection
});

document.getElementById('scholarshipNo').addEventListener('click', function () {
    markModalsAsCompleted();
    $('#scholorshipModal').modal('hide'); // Hide the modal after selection
});

// Mark modal as completed
function markModalsAsCompleted() {
    localStorage.setItem('modalStatus', 'completed');
    localStorage.setItem('lastVisit', new Date().getTime()); // Track last visit time
}

// Check localStorage for modal completion status and handle display logic
function checkModalStatus() {
    const modalStatus = localStorage.getItem('modalStatus');
    const lastVisit = localStorage.getItem('lastVisit');
    const now = new Date().getTime();

    // If the user has not completed the modals or revisits after 2 days
    if (!modalStatus || modalStatus !== 'completed') {
        showModalWithInterval();
    } else if (lastVisit && (now - lastVisit) >= 2 * 24 * 60 * 60 * 1000) {
        // Reset modal status if the user revisits after 2 days
        localStorage.setItem('modalStatus', 'incomplete');
        showModalWithInterval();
    }
}

// Show modals and set repeated interval for showing them
function showModalWithInterval() {
    // Show the scholarship modal after 2 seconds (example)
    setTimeout(() => {
        $('#subscribeModal').modal('show');
    }, 10000);

    // Repeat showing modal every 2 minutes if not completed
    const intervalId = setInterval(() => {
        const modalStatus = localStorage.getItem('modalStatus');
        if (!modalStatus || modalStatus !== 'completed') {
            $('#subscribeModal').modal('show');
        } else {
            // Clear the interval if the modal is marked as completed
            clearInterval(intervalId);
        }
    }, 2 * 60 * 1000); // 2-minute interval
}

// Trigger modal show logic on page load
document.addEventListener('DOMContentLoaded', () => {
    checkModalStatus();
});

// stacked column chart
var linechartBasicColors = getChartColorsArray("stacked-column-chart");
if (linechartBasicColors) {
    var options = {
        chart: {
            height: 360,
            type: 'bar',
            stacked: true,
            toolbar: {
                show: false
            },
            zoom: {
                enabled: true
            }
        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '15%',
                endingShape: 'rounded',
                borderRadius: 5,
            },
        },

        dataLabels: {
            enabled: false
        },
        series: [{
            name: 'Series A',
            data: [44, 55, 41, 67, 22, 43, 36, 52, 24, 18, 36, 48]
        }, {
            name: 'Series B',
            data: [13, 23, 20, 8, 13, 27, 18, 22, 10, 16, 24, 22]
        }, {
            name: 'Series C',
            data: [11, 17, 15, 15, 21, 14, 11, 18, 17, 12, 20, 18]
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        colors: linechartBasicColors,
        legend: {
            position: 'bottom',
        },
        fill: {
            opacity: 1
        },
    }

    var chart = new ApexCharts(
        document.querySelector("#stacked-column-chart"),
        options
    );

    chart.render();
}

// Radial chart
var radialbarColors = getChartColorsArray("radialBar-chart");
if (radialbarColors) {
    var options = {
        chart: {
            height: 200,
            type: 'radialBar',
            offsetY: -10
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: '13px',
                        color: undefined,
                        offsetY: 60
                    },
                    value: {
                        offsetY: 22,
                        fontSize: '16px',
                        color: undefined,
                        formatter: function (val) {
                            return val + "%";
                        }
                    }
                }
            }
        },
        colors: radialbarColors,
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                shadeIntensity: 0.15,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91]
            },
        },
        stroke: {
            dashArray: 4,
        },
        series: [67],
        labels: ['Series A'],

    }

    var chart = new ApexCharts(
        document.querySelector("#radialBar-chart"),
        options
    );

    chart.render();
}

$(document).ready(function() {
    // Load spinner on page load
    window.onload = function() {
        var loader = document.getElementById('fullPageLoader');
        loader.style.opacity = '0';

        setTimeout(function() {
            loader.style.display = 'none';
        }, 500);
    };

    // Country select
    $('#country-select').select2({
        maximumSelectionLength: 3,
        placeholder: "Select Country",
        allowClear: true,
        width: '100%',
        templateSelection: function(selected) {
            if (selected.length > 1) {
                var remaining = selected.length - 1;
                return selected[0].text + ' + ' + remaining + ' more';
            }
            return selected.text;
        },
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }
            var flagUrl = $(state.element).data('flag');
            var $state = $('<span><img src="' + flagUrl +
                '" style="width: 20px; height: 15px; margin-right: 5px;">' + state.text +
                '</span>');
            return $state;
        },
        dropdownParent: $('#country-select').parent()
    });

    // Initialize Select2 for department select
    // $('#department-select').select2({
    //     maximumSelectionLength: 3,
    //     placeholder: "Select Department",
    //     allowClear: true,
    //     templateSelection: function(selected) {
    //         if (selected.length > 1) {
    //             var remaining = selected.length - 1;
    //             return selected[0].text + ' + ' + remaining + ' more';
    //         }
    //         return selected.text;
    //     },
    //     dropdownParent: $('#department-select').parent()
    // });

    // Load spinner on page load
    // window.onload = function() {
    //     var loader = document.getElementById('fullPageLoader');
    //     loader.style.opacity = '0';

    //     setTimeout(function() {
    //         loader.style.display = 'none';
    //     }, 500);
    // };

    // Next button in the country modal
    $('#nextButton').on('click', function() {
        var selectedCountries = $('#countryselect').val();
        if (selectedCountries && selectedCountries.length > 0) {
            $('#state-country-select').val(selectedCountries).trigger('change');
            $.ajax({
                url: '/getStatesByCountry',
                type: 'GET',
                data: {
                    countries: selectedCountries
                },
                dataType: 'json',
                success: function(states) {
                    var stateSelect = $('#stateselect');
                    stateSelect.empty();

                    $.each(states, function(index, state) {
                        stateSelect.append(new Option(state.state_name, state.id));
                    });
                    stateSelect.trigger('change');

                    $('#stateModal').modal('show');
                }
            });
        }
    });

    // Change event for country select
    $('#state-country-select').on('change', function() {
        var selectedCountries = $(this).val();

        if (selectedCountries && selectedCountries.length > 0) {
            $.ajax({
                url: '/getStatesByCountry',
                type: 'GET',
                data: {
                    countries: selectedCountries
                },
                dataType: 'json',
                success: function(states) {
                    var stateSelect = $('#stateselect');
                    stateSelect.empty();

                    $.each(states, function(index, state) {
                        stateSelect.append(new Option(state.state_name, state.id));
                    });
                    stateSelect.trigger('change');
                }
            });
        }
    });

    // Next state button
    $('#nextStateButton').on('click', function() {
        var selectedCountry = $('#countryselect').val();
        var selectedState = $('#stateselect').val();

        if (selectedCountry && selectedState) {
            $.ajax({
                url: '/getProgramsByCountryState',
                type: 'GET',
                data: {
                    country_id: selectedCountry,
                    state_id: selectedState
                },
                dataType: 'json',
                success: function(programs) {
                    var programSelect = $('#programselect');
                    programSelect.empty();

                    $.each(programs, function(index, program) {
                        programSelect.append(new Option(program.program_name,
                            program.id));
                    });
                }
            });
        }
    });

    // Next program button
    $('#nextProgramButton').on('click', function() {
        var selectedPrograms = $('#programselect').val();
        var selectedProgramNames = $('#programselect option:selected').map(function() {
            return $(this).text();
        }).get();

        if (selectedPrograms.length > 0) {
            $('#selectedPrograms').empty();
            $.each(selectedPrograms, function(index, programId) {
                $('#selectedPrograms').append(new Option(selectedProgramNames[index], programId,
                    true, true));
            });
        }
    });

    // Program select change event to load departments
    $('#program-select, #programselect').on('change', function() {
        var programId = $(this).val();
        var target = $(this).attr('id') === 'programselect' ? '#departmentselect' :
            '#department-select';

        $(target).empty();

        if (programId) {
            $.ajax({
                url: '/get-departments-by-program/' + programId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        $(target).append('<option value="">Select Departments</option>');
                        $.each(data, function(key, value) {
                            $(target).append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    }
                }
            });
        }
    });

    $('#countryselect').select2({
        placeholder: "Select Countries",
        allowClear: true,
        width: '100%',
        templateSelection: function(data) {
            if (data.id) {
                var flagUrl = $(data.element).data('flag');
                return $('<span><img src="' + flagUrl +
                    '" style="width: 20px; height: 15px; margin-right: 5px;"> ' + data.text +
                    '</span>');
            }
            return data.text;
        },
        templateResult: function(data) {
            if (!data.id) {
                return data.text;
            }
            var flagUrl = $(data.element).data('flag');
            if (flagUrl) {
                var $state = $('<span><img src="' + flagUrl +
                    '" style="width: 20px; height: 15px; margin-right: 5px;"> ' + data.text +
                    '</span>');
                return $state;
            }
            return data.text;
        },
        dropdownParent: $('#subscribeModal')
    });

    // Scholarship buttons
    document.getElementById('scholarshipYes').addEventListener('click', function() {
        window.location.href = "{{ route('universityList') }}?scholarship=1";
    });

    document.getElementById('scholarshipNo').addEventListener('click', function() {
        window.location.href = "{{ route('universityList') }}?scholarship=0";
        $('#departmentselect').empty();

        if (programId) {
            $.ajax({
                url: '/get-departments-by-program/' + programId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        $('#departmentselect').append(
                            '<option value="">Select Departments</option>');
                        $.each(data, function(key, value) {
                            $('#departmentselect').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        }
    });

    function validateCountries() {
        const selectedCountries = $('#countryselect').val();
        if (!selectedCountries || selectedCountries.length === 0) {
            $('#countries-error').text('Please select at least one country.').css('color', 'red');
            return false;
        } else {
            $('#countries-error').text('');
            return true;
        }
    }

    function validateStates() {
        const selectedStates = $('#stateselect').val();
        if (!selectedStates || selectedStates.length === 0) {
            $('#states-error').text('Please select at least one state.').css('color', 'red');
            return false;
        } else {
            $('#states-error').text('');
            return true;
        }
    }

    function validatePrograms() {
        const selectedPrograms = $('#programselect').val();
        if (!selectedPrograms || selectedPrograms.length === 0) {
            $('#programs-error').text('Please select at least one program.').css('color', 'red');
            return false;
        } else {
            $('#programs-error').text('');
            return true;
        }
    }

    function validateDepartments() {
        const selectedDepartment = $('#departmentselect').val();
        if (!selectedDepartment || selectedDepartment.length === 0) {
            $('#departments-error').text('Please select at least one department.').css('color', 'red');
            return false;
        } else {
            $('#departments-error').text('');
            return true;
        }
    }

    // Handle navigation between modals
    $('#nextButton').on('click', function() {
        if (validateCountries()) {
            $('#subscribeModal').modal('hide');
            $('#stateModal').modal('show');
        }
    });

    $('#previousButton').on('click', function() {
        $('#stateModal').modal('hide');
        $('#subscribeModal').modal('show');
    });

    $('#nextStateButton').on('click', function() {
        if (validateStates()) {
            $('#stateModal').modal('hide');
            $('#ProgramModal').modal('show');
        }
    });

    $('#previousProgramButton').on('click', function() {
        $('#ProgramModal').modal('hide');
        $('#stateModal').modal('show');
    });

    $('#nextProgramButton').on('click', function() {
        if (validatePrograms()) {
            $('#ProgramModal').modal('hide');
            $('#departmentModal').modal('show');
        }
    });

    $('#previousDepartmentButton').on('click', function() {
        $('#departmentModal').modal('hide');
        $('#ProgramModal').modal('show');
    });

    $('#nextDepartmentButton').on('click', function() {
        if (validateDepartments()) {
            $('#departmentModal').modal('hide');
            $('#scholorshipModal').modal('show');
        }
    });
    $('#previousScholarshipButton').on('click', function() {
        $('#scholorshipModal').modal('hide');
        $('#departmentModal').modal('show');
    });

    $('#countryselect').on('change', function() {
        if (validateCountries()) {
            $('#countries-error').text('');
        }
    });

    // Validation for states
    $('#stateselect').on('change', function() {
        if (validateStates()) {
            $('#states-error').text('');
        }
    });

    // Validation for programs
    $('#programselect').on('change', function() {
        if (validatePrograms()) {
            $('#programs-error').text('');
        }
    });
    $('#departmentselect').on('change', function() {
        if (validateDepartments()) {
            $('#programs-error').text('');
        }
    });
});
$(document).ready(function() {

    $('#program-select').on('change', function() {
        if ($(this).val()) {
            $('#program-error').text('');
        }
    });

    $('#country-select').on('change', function() {
        if ($(this).val()) {
            $('#country-error').text('');
        }
    });

    $('#department-select').on('change', function() {
        if ($(this).val()) {
            $('#department-error').text('');
        }
    });
});

