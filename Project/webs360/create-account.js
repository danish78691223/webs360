document.getElementById('createAccountForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way
    
    const fullName = document.getElementById('fullName').value;
    const mobileNumber = document.getElementById('mobileNumber').value;
    const email = document.getElementById('email').value;
    
    // Mock API call to send OTP
    sendOtp(fullName, mobileNumber, email).then(response => {
        if (response.success) {
            document.getElementById('message').textContent = 'OTP sent to ' + email;
        } else {
            document.getElementById('message').textContent = 'Failed to send OTP. Please try again.';
        }
    });
});

// Function to simulate OTP sending process (replace with actual API call)
function sendOtp(fullName, mobileNumber, email) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve({ success: true }); // Simulate successful OTP send
        }, 1000);
    });
}




const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");

      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }

// js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");

        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
        }else{
            localStorage.setItem("mode" , "dark-mode");
        }
      });

// js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});

body.addEventListener("click" , e =>{
    let clickedElm = e.target;

    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});


document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelector('.slides');
  const slideImages = slides.querySelectorAll('img');
  const totalSlides = slideImages.length;
  let index = 0;

  function changeSlide() {
      index = (index + 1) % totalSlides;
      slides.style.transform = `translateX(-${index * 100}%)`;
  }

  setInterval(changeSlide, 5000); // Change slide every 5 seconds
});



