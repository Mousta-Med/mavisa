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
    users: [],
  },
  mounted: function () {
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
    // this.getUsers();
    document.addEventListener("DOMContentLoaded", function () {
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
          var selectedDate = info.start.toLocaleString();
          const storedToken = localStorage.getItem("token");
          const token = JSON.parse(storedToken);
          axios
            .post("http://localhost/mavisa/booking", {
              user_token: token.token,
              selectedDate: selectedDate,
            })
            .catch(function (error) {
              console.log(error);
            });
          jQuery("#exampleModal").modal("show");
        },
      });

      calendar.render();
    });
    if (copyText) {
      var copyText = document.getElementById("token").innerHTML;
      var token = { token: copyText };
      localStorage.setItem("token", JSON.stringify(token));
    }
  },

  methods: {
    // getUsers: function () {
    //   axios
    //     .get("http://localhost/mavisa/read")
    //     .then(function (response) {
    //       app.users = response.data;
    //     })
    //     .catch(function (error) {
    //       console.log(error);
    //     });
    // },
    // getingletUsers: function () {
    //   axios
    //     .get("http://localhost/mavisa/single_read")
    //     .then(function (response) {
    //       app.users = response.data;
    //     })
    //     .catch(function (error) {
    //       console.log(error);
    //     });
    // },
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
      window.location.href = "logout";
    },
    copytoclipboard: function () {
      var copyText = document.getElementById("token").innerHTML;
      navigator.clipboard.writeText(copyText);
      alert("Your token copied to clipboard");
    },
  },
});
