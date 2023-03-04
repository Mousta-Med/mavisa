var app = new Vue({
  el: "#app",
  data: {
    message: "hello world!",
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
    this.getUsers();
  },

  methods: {
    getUsers: function () {
      axios
        .get("http://localhost/mavisa/read")
        .then(function (response) {
          app.users = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    createUser: function () {
      axios
        .post("http://localhost/mavisa/create", {
          user_token: this.user_token,
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
        .then((response) => this.users.push(response.data))
        .then(app.resetForm())
        .catch(function (response) {
          console.log(response);
        });
    },

    resetForm: function () {
      this.user_token = "";
      this.user_firstname = "";
      this.user_lastname = "";
      this.user_birthdate = "";
      this.user_nationality = "";
      this.family_situation = "";
      this.user_adresse = "";
      this.visa_type = "";
      this.Date_of_departure = "";
      this.arrival_date = "";
      this.voyage_document_type = "";
      this.voyage_document_number = "";
    },
  },
});
