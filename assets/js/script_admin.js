
 var sideBar = document.getElementById("wrapper");
 var toggleButton = document.getElementById("menu-toggle");

 toggleButton.onclick = function () {
     sideBar.classList.toggle("toggled");
 };

// displaying and hiding section starts here 


        // get  sidebar buttons
        let dashboard = $('#dashboard-displayer');
        let doctors = $('#doctors-displayer');
        let schedule = $('#schedule-displayer');
        let appointment = $('#appointments-displayer');
        let patients = $('#patients-displayer');

        // get sections 
        let dashboardSection = $('#dashboard');
        let doctorsSection = $('#doctors');
        let scheduleSection = $('#schedule');
        let appointmentSection = $('#appointments');
        let patientsSection = $('#patients');

        function displayThis(
            section1,
            section2,
            section3,
            section4,
            section5
        ){
            section1.removeClass('d-none');
            section2.addClass('d-none');
            section3.addClass('d-none');
            section4.addClass('d-none');
            section5.addClass('d-none');
        }

        console.log(dashboardSection);

        dashboard.click(function(){
            displayThis(dashboardSection,doctorsSection,scheduleSection,appointmentSection,patientsSection);
        });
        doctors.click(function(){
            displayThis(doctorsSection,dashboardSection,scheduleSection,appointmentSection,patientsSection);
        });
        schedule.click(function(){
            displayThis(scheduleSection,dashboardSection,doctorsSection,appointmentSection,patientsSection);
        });
        appointment.click(function(){
            displayThis(appointmentSection,dashboardSection,doctorsSection,scheduleSection,patientsSection);
        });
        patients.click(function(){
            displayThis(patientsSection,dashboardSection,doctorsSection,scheduleSection,appointmentSection);
        });



let update = $('#update-btn');
let addDoctor = $('#add-doctor-btn');

let updateTitle = $('#edit-title');
let addTitle = $('#add-title');

let updateBtn = $('#doctor-update-btn');
let saveBtn = $('#doctor-save-btn');

update.click(function(){
    addTitle.addClass('d-none');
    saveBtn.addClass('d-none');
    updateTitle.removeClass('d-none');
    updateBtn.removeClass('d-none');
})
addDoctor.click(function(){
    addTitle.removeClass('d-none');
    saveBtn.removeClass('d-none');
    updateTitle.addClass('d-none');
    updateBtn.addClass('d-none');
});




// function displayDate(){
//     const date = new Date();

//     let day = date.getDate();
//     let month = date.getMonth() + 1;
//     let year = date.getFullYear();

//     // This arrangement can be altered based on how we want the date's format to appear.
//     let currentDate = `${day}-${month}-${year}`;
//     document.getElementById('current-date').innerHTML = currentDate;

// }