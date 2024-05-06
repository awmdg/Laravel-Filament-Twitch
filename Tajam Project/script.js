function changeBackgroundImage(url) {
  document.getElementById("banner").style.backgroundImage =
    "url('" + url + "')";
}

const teamMembers = [
  { name: "SEMF UCUK", position: "CEO & FOUNDER" },
  { name: "DIK ADALIN", position: "ENGINEERING" },
  { name: "PET ROMAK", position: "MARKETING" },
  { name: "SEMF UCUK", position: "CEO & FOUNDER" },
];

function populateTeamMembers() {
  const teamMembersContainer = document.getElementById(
    "team-members-container"
  );

  teamMembers.forEach((member) => {
    const teamMemberHtml = `
        <div class="items col">
          <div id="team-member" class="row">
            <div id="team-img"></div>
            <div id="team-text">
              <h2 class="name light1">${member.name}</h2>
              <p class="position light2">${member.position}</p>
            </div>
          </div>
        </div>
      `;
    teamMembersContainer.insertAdjacentHTML("beforeend", teamMemberHtml);
  });
}

// document.addEventListener("DOMContentLoaded", function () {
//   function handleScroll() {
//     var navbar = document.getElementById("navbar");
//     if (window.scrollY > 0) {
//       navbar.classList.add("scrolled");
//     } else {
//       navbar.classList.remove("scrolled");
//     }
//   }

//   // Populate team members on DOMContentLoaded
//   populateTeamMembers();

//   // Add event listener for scroll
//   window.addEventListener("scroll", handleScroll);
// });

window.addEventListener("scroll", function () {
  var navbar = document.querySelector(".navbar");
  if (window.scrollY > 0) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute("href")).scrollIntoView({
      behavior: "smooth",
    });
  });
});
