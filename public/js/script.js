var app = new Vue({
  el: "#app",
  data: {
    user_token: "",
    user_firstname: "",
    user_lastname: "",
    user_birthdate: "",
    user_nationality: "",
    family_situation: "",
    user_adresse: "",
    visa_type: "",
    Date_of_departure: "",
    arrival_date: "",
    voyage_document_number: "",
    voyage_document_type: "",
    time: "",
    users: [],
    reservedTimes: [],
    filteredTimes: []
  },
  mounted: function () {
    const times = ["09:15", "10:15", "11:15", "14:15", "15:15"];
    const timesSelect = document.querySelector('#resrvation_time');
    const storedUserData = localStorage.getItem("userData");
    if (storedUserData) {
      const userData = JSON.parse(storedUserData);
      this.user_firstname = userData.user_firstname;
      this.user_lastname = userData.user_lastname;
      this.user_birthdate = userData.user_birthdate;
      this.user_nationality = userData.user_nationality;
      this.family_situation = userData.family_situation;
      this.user_adresse = userData.user_adresse;
      this.visa_type = userData.visa_type;
      this.Date_of_departure = userData.Date_of_departure;
      this.arrival_date = userData.arrival_date;
      this.voyage_document_number = userData.voyage_document_number;
      this.voyage_document_type = userData.voyage_document_type;
    }
    var calendarEl = document.getElementById("calendar");
    var futureDate = new Date();
    futureDate.setMonth(new Date().getMonth() + 3);
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: "prev,next",
        center: "title",
        right: "dayGridMonth",
      },
      initialDate: new Date(),
      validRange: {
        start: new Date(), // example start date
        end: futureDate, // example end date
      },
      selectable: true,
      events: [
        {
          start: "2023-03-27",
          // end: "2023-03-27",
          overlap: false,
          display: "background",
          color: "#ff9f89",
        },
      ],
      select: function (info) {
        var selectedDate = info.start;
        localStorage.setItem("date", selectedDate);
        const storedToken = localStorage.getItem("token");
        const token = JSON.parse(storedToken);
        axios
          .post("http://localhost/mavisa/booking", {
            user_token: token.token,
            selectedDate: selectedDate,
            stat: "check",
          }).then(({ data }) => {
            this.reservedTimes = data.map((time) => {
              return time;
            })
            this.filteredTimes = times.filter((time) => {
              return !this.reservedTimes.includes(time)
            })
            if (this.filteredTimes.length !== 0) {
              this.filteredTimes.map((time) => {
                timesSelect.innerHTML += `<option value="${time}">${time}</option>`;
              })
              document.getElementById('book').removeAttribute('disabled');
              document.getElementById('book').classList.remove('d-none');
            } else {
              timesSelect.innerHTML = '<option readonly>No Time</option>'
              document.getElementById('book').setAttribute('disabled', 'disabled');
              document.getElementById('book').classList.add('d-none');
            }
          })
          .catch(function (error) {
            console.log(error);
          });
        timesSelect.innerHTML = ''
        jQuery("#exampleModal").modal("show");
      },


    });
    calendar.render();
    var copyText = document.getElementById("token");
    if (copyText) {
      var token = { token: copyText.innerHTML };
      localStorage.setItem("token", JSON.stringify(token));
    }
  },

  methods: {
    onsubmit: function () {
      if (
        this.user_firstname !== "" &&
        this.user_lastname !== "" &&
        this.user_birthdate !== "" &&
        this.user_nationality !== "" &&
        this.family_situation !== "" &&
        this.user_adresse !== "" &&
        this.visa_type !== "" &&
        this.Date_of_departure !== "" &&
        this.arrival_date !== "" &&
        this.voyage_document_number !== "" &&
        this.voyage_document_type !== ""
      ) {
        axios
          .post("http://localhost/mavisa/create", {
            user_firstname: this.user_firstname,
            user_lastname: this.user_lastname,
            user_birthdate: this.user_birthdate,
            user_nationality: this.user_nationality,
            family_situation: this.family_situation,
            user_adresse: this.user_adresse,
            visa_type: this.visa_type,
            Date_of_departure: this.Date_of_departure,
            arrival_date: this.arrival_date,
            voyage_document_number: this.voyage_document_number,
            voyage_document_type: this.voyage_document_type,
          })
          .then(() => {
            const userData = {
              user_firstname: this.user_firstname,
              user_lastname: this.user_lastname,
              user_birthdate: this.user_birthdate,
              user_nationality: this.user_nationality,
              family_situation: this.family_situation,
              user_adresse: this.user_adresse,
              visa_type: this.visa_type,
              Date_of_departure: this.Date_of_departure,
              arrival_date: this.arrival_date,
              voyage_document_number: this.voyage_document_number,
              voyage_document_type: this.voyage_document_type,
            };

            localStorage.setItem("userData", JSON.stringify(userData));
          })
          .catch(function (response) {
            console.log(response);
          });
        alert("File created successfuly");
        window.location.href = "book";
      } else {
        alert("all field are required");
      }
    },
    Valid: function () {
      const storedToken = localStorage.getItem("token");
      const token = JSON.parse(storedToken);
      const storeddate = localStorage.getItem("date");
      const date = storeddate;
      axios
        .post("http://localhost/mavisa/booking", {
          user_token: token.token,
          selectedDate: date,
          time: this.time,
          stat: "validate",
        }).then((response) => {
          alert("You have been reserved successfully");
          jQuery("#exampleModal").modal("hide");
        })
        .catch(function (error) {
          console.log(error);
          alert("You already have a reservation");
          jQuery("#exampleModal").modal("hide");
        });
    },
    checkFile: function () {
      if (this.user_token !== "") {
        axios
          .post("http://localhost/mavisa/login", {
            user_token: this.user_token,
          })
          .then((response) => {
            const userData = {
              user_firstname: response.data.user_firstname,
              user_lastname: response.data.user_lastname,
              user_birthdate: response.data.user_birthdate,
              user_nationality: response.data.user_nationality,
              family_situation: response.data.family_situation,
              user_adresse: response.data.user_adresse,
              visa_type: response.data.visa_type,
              Date_of_departure: response.data.Date_of_departure,
              arrival_date: response.data.arrival_date,
              voyage_document_number: response.data.voyage_document_number,
              voyage_document_type: response.data.voyage_document_type,
            };
            localStorage.setItem("userData", JSON.stringify(userData));
            window.location.href = "book";
          })
          .catch(function (error) {
            console.log(error);
            alert("There is no file with this token");
          });
      } else {
        alert("all field are required");
      }
    },
    updateUser: function () {
      const storedToken = localStorage.getItem("token");
      const token = JSON.parse(storedToken);
      if (
        this.user_firstname !== "" &&
        this.user_lastname !== "" &&
        this.user_birthdate !== "" &&
        this.user_nationality !== "" &&
        this.family_situation !== "" &&
        this.user_adresse !== "" &&
        this.visa_type !== "" &&
        this.Date_of_departure !== "" &&
        this.arrival_date !== "" &&
        this.voyage_document_number !== "" &&
        this.voyage_document_type !== ""
      ) {
        axios
          .post("http://localhost/mavisa/update", {
            user_token: token.token,
            user_firstname: this.user_firstname,
            user_lastname: this.user_lastname,
            user_birthdate: this.user_birthdate,
            user_nationality: this.user_nationality,
            family_situation: this.family_situation,
            user_adresse: this.user_adresse,
            visa_type: this.visa_type,
            Date_of_departure: this.Date_of_departure,
            arrival_date: this.arrival_date,
            voyage_document_number: this.voyage_document_number,
            voyage_document_type: this.voyage_document_type,
          })
          .then(() => {
            const userData = {
              user_firstname: this.user_firstname,
              user_lastname: this.user_lastname,
              user_birthdate: this.user_birthdate,
              user_nationality: this.user_nationality,
              family_situation: this.family_situation,
              user_adresse: this.user_adresse,
              visa_type: this.visa_type,
              Date_of_departure: this.Date_of_departure,
              arrival_date: this.arrival_date,
              voyage_document_number: this.voyage_document_number,
              voyage_document_type: this.voyage_document_type,
            };

            localStorage.setItem("userData", JSON.stringify(userData));
          })
          .catch(function (response) {
            console.log(response);
          });
        alert("File updated successfuly");
        // window.location.href = "file";
      } else {
        alert("all field are required");
      }
    },

    resetForm: function () {
      localStorage.removeItem("userData");
      localStorage.removeItem("token");
      localStorage.removeItem("date");
      window.location.href = "logout";
    },
    copytoclipboard: function () {
      var copyText = document.getElementById("token").innerHTML;
      navigator.clipboard.writeText(copyText);
      alert("Your token copied to clipboard");
      location.reload();
    },
  },
});
